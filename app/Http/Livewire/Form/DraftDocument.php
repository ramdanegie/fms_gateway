<?php

namespace App\Http\Livewire\Form;

use App\Exceptions\FmsException;
use App\Helper\Convert;
use App\Models\Cargo;
use App\Models\Consignee;
use App\Models\Depot;
use App\Models\DraftDocumentHistory;
use App\Models\FclCargo;
use App\Models\FclContainer;
use App\Models\FclDraftDocument;
use App\Models\FclShippingInstruction;
use App\Models\Location;
use App\Models\MasterPort;
use App\Models\NotifiParty;
use App\Models\Shipper;
use App\Models\SizeContainer;
use App\Models\Truck;
use App\Models\TypeContainer;
use App\Notifications\AdminHasUploadDraftDocument;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;
use Livewire\WithFileUploads;

class DraftDocument extends Component
{
    use WithFileUploads;

    public $fcl;
    public $shipping;
    public $admin_mode;
    public $draft_type;
    public $is_update;

    // form entity
    public $bl_number;
    public $airway_bill_no;
    public $airway_bill_number;
    public $chk_clearance;
    public $chk_certificate;
    public $chk_onboard;
    public $trade_type;
    public $incoterm;
    public $date_est_shipment;
    public $origin_id;
    public $origin_printed_as;
    public $destination_id;
    public $destiport_id;
    public $destination_printed_as;
    public $port_id;
    public $depot_id;
    public $port_printed_as;
    public $originport_id;
    public $goods_description;
    public $date_depo_pickup;
    public $date_depo_delivery;
    public $date_max_delivery;
    public $vessel;
    public $voyage;
    public $addres_delivery;
    public $first_carrier;
    public $handling_information;
    public $flight_date;
    public $doc_at;
    public $doc_place;

    // asuransi
    public $insurance_cur;
    public $insurance_amount;
    public $cargo_cur;
    public $cargo_amount;
    public $freight_cur;
    public $freight_amount;

    public $file_invoice;
    public $file_packaging_list;
    public $file_cert_origin;
    public $file_bill_lading;
    public $file_others;

    public $chk_pickup;
    public $pickup_id;
    public $pickup_city;
    public $pickup_country;
    public $pickup_address;
    public $date_pickup;

    public $chk_delivery;
    public $delivery_id;
    public $delivery_city;
    public $delivery_country;
    public $delivery_address;
    public $date_unloading;

    public $freight;
    public $freight_bl_type;
    public $freight_remark;

    public $shipper_id;
    public $consignee_id;
    public $notifi_id;

    // containers 
    public $size;
    public $container_type;
    public $qty;
    public $containers;
    public $seals;
    public $frm_container = [0];
    public $frm_cidx = 1;

    // cargo
    public $old_cargo_id;
    public $cargo_id;
    public $cargo_description;
    public $cargo_type;
    public $cargo_hs_code;
    public $cargo_length;
    public $cargo_height;
    public $cargo_depth;
    public $cargo_weight;
    public $cargo_volume;
    public $cargo_total_weight;
    public $cargo_total_unit;
    public $cargo_package_type;
    public $marks_numbers;
    public $file_msds;
    public $file_cargo_image;
    public $is_volume;
    public $is_weight;
    public $frm_cargo = [0];
    public $frm_cargo_i = 1;

    public $documents;

    // list
    public $size_containers;
    public $type_containers;
    public $cargos;
    public $shippers;
    public $consignees;
    public $third_parties;
    public $list_trade_type;
    public $destinations;
    public $origins;
    public $ports;
    public $trucks;
    public $list_depo;

    protected $listeners = [
        'changeOrigin'      => 'changeOrigin',
        'changeDestination' => 'changeDestination'
    ];

    public function changeOrigin($origin_id, $type = "D")
    {
        if (empty($origin_id)) {
            return;
        }

        $loc = null;
        if ($type == "D") {
            $loc = Location::find($origin_id);
        }

        if ($type == "P") {
            $loc = MasterPort::find($origin_id);
        }

        if (!empty($loc)) {
            $this->origin_address = $loc->address;
            $this->origin_country = $loc->country;
            $this->origin_city    = $loc->city;
            $this->origin_id      = null;
            $this->originport_id  = null;

            if ($type == "D") {
                $this->origin_id = $origin_id;
            } else {
                $this->originport_id = $origin_id;
            }
        }
    }

    public function changeDestination($origin_id, $type = "D")
    {
        if (empty($origin_id)) {
            return;
        }

        $loc = null;
        if ($type == "D") {
            $loc = Location::find($origin_id);
        }

        if ($type == "P") {
            $loc = MasterPort::find($origin_id);
        }

        if (!empty($loc)) {
            $this->destination_address = $loc->address;
            $this->destination_country = $loc->country;
            $this->destination_city    = $loc->city;
            $this->destination_id      = null;
            $this->destiport_id        = null;

            if ($type == "D") {
                $this->destination_id = $origin_id;
            } else {
                $this->destiport_id = $origin_id;
            }
        }
    }

    public function addFormContainer($i)
    {
        array_push($this->frm_container, $i);
        $this->frm_cidx += $i;
    }

    public function removeFormContainer($i)
    {
        if (count($this->frm_container) == 1) {
            return;
        }

        unset($this->frm_container[$i]);
    }

    public function addFormCargo($i)
    {
        array_push($this->frm_cargo, $i);
        $this->frm_cargo_i += $i;
    }

    public function removeFormCargo($i)
    {
        if (count($this->frm_cargo) == 1) {
            return;
        }

        unset($this->frm_cargo[$i]);
    }

    public function changeTradeType()
    {
        $this->list_incoterm = [];
        if ($this->trade_type == "IM") {
            $this->list_incoterm = config("form-fcl.list_im_incoterm");
        }

        if ($this->trade_type == "EX") {
            $this->list_incoterm = config("form-fcl.list_ex_incoterm");
        }
    }

    public function changePickup($pickup_id)
    {
        if (empty($pickup_id)) {
            return;
        }

        $loc = Location::find($pickup_id);
        if (!empty($loc)) {
            $this->pickup_address = $loc->address;
            $this->pickup_country = $loc->country;
            $this->pickup_city    = $loc->city;
            $this->pickup_id      = $pickup_id;
        }
    }

    public function changeDelivery($delivery_id)
    {
        if (empty($delivery_id)) {
            return;
        }

        $loc = Location::find($delivery_id);
        if (!empty($loc)) {
            $this->delivery_address = $loc->address;
            $this->delivery_country = $loc->country;
            $this->delivery_city    = $loc->city;
            $this->delivery_id    = $delivery_id;
        }
    }

    public function changeCargo($cargo_id, $i)
    {
        if (empty($cargo_id)) {
            return;
        }

        $cargo = Cargo::find($cargo_id);
        if (!empty($cargo)) {
            $this->cargo_description[$i] = $cargo->description;
            $this->cargo_type[$i]        = $cargo->type;
            $this->cargo_length[$i]      = $cargo->length;
            $this->cargo_height[$i]      = $cargo->height;
            $this->cargo_depth[$i]       = $cargo->depth;
            $this->cargo_weight[$i]      = $cargo->weight;
            $this->cargo_hs_code[$i]     = $cargo->hs_code;
        }
    }

    public function mount()
    {
        $this->is_update = 0;
        $shipping = FclDraftDocument::where("fcl_id", $this->fcl->id)->first();
        if (empty($shipping)) {
            $shipping = new FclDraftDocument();
        }

        $this->shipping        = $shipping;
        $this->cargos          = Cargo::mine()->get();
        $this->size_containers = SizeContainer::orderBy("value", "asc")->get();
        $this->type_containers = TypeContainer::orderBy("title", "asc")->get();
        $this->shippers        = Shipper::mine()->get();
        $this->consignees      = Consignee::mine()->get();
        $this->third_parties   = NotifiParty::mine()->get();
        $this->list_trade_type = config("form-fcl.list_trade_type");
        $this->destinations    = Location::mine()->get();
        $this->origins         = $this->destinations;
        $this->ports           = MasterPort::seaport()->get();
        $this->trucks          = Truck::mine()->get();
        $this->list_depo       = Depot::mine()->get();

        $this->origin_printed_as      = $this->shipping->origin_printed_as;
        $this->destination_printed_as = $this->shipping->destination_printed_as;
        $this->port_printed_as        = $this->shipping->port_printed_as;
        $this->bl_number              = $this->shipping->bl_number;
        $this->airway_bill_no         = $this->shipping->airway_bill_no;
        $this->airway_bill_number     = $this->shipping->airway_bill_number;
        $this->port_id                = $this->shipping->port_id;
        $this->shipper_id             = $this->shipping->shipper_id;
        $this->consignee_id           = $this->shipping->consignee_id;
        $this->notifi_id              = $this->shipping->notifi_id;
        $this->freight                = $this->shipping->freight;
        $this->freight_bl_type        = $this->shipping->freight_bl_type;
        $this->freight_remark         = $this->shipping->freight_remark;
        $this->goods_description      = $this->shipping->goods_description;
        $this->draft_type             = $this->shipping->draft_type;
        $this->chk_onboard            = $this->shipping->is_onboard;
        $this->first_carrier          = $this->shipping->first_carrier;
        $this->handling_information   = $this->shipping->handling_information;
        $this->doc_at                 = $this->shipping->doc_at;
        $this->doc_place              = $this->shipping->doc_place;
        $this->flight_date            = Convert::dateFormat($this->shipping->flight_date, "d/m/y");
        
        $this->chk_clearance      = $this->fcl->is_custom_clearance;
        $this->chk_certificate    = $this->fcl->is_request_cert_origin;
        $this->chk_pickup         = $this->fcl->is_pickup;
        $this->chk_delivery       = $this->fcl->is_delivery;
        $this->trade_type         = $this->fcl->trade_type;
        $this->incoterm           = $this->fcl->incoterm;
        $this->date_unloading     = Convert::dateFormat($this->fcl->date_unloading, "d/m/y H:i");
        $this->date_pickup        = Convert::dateFormat($this->fcl->date_pickup, "d/m/y H:i");
        $this->date_est_shipment  = Convert::dateFormat($this->fcl->date_est_shipment, "d/m/y");
        $this->date_max_delivery  = Convert::dateFormat($this->fcl->date_max_delivery, "d/m/y");
        $this->insurance_cur      = $this->fcl->insurance_cur;
        $this->insurance_amount   = $this->fcl->insurance_amount;
        $this->cargo_cur          = $this->fcl->cargo_cur;
        $this->cargo_amount       = $this->fcl->cargo_amount;
        $this->freight_cur        = $this->fcl->freight_cur;
        $this->freight_amount     = $this->fcl->freight_amount;
        $this->truck_id           = $this->fcl->truck_id;
        $this->qty_unit           = $this->fcl->qty_unit;
        $this->depot_id           = $this->fcl->depot_id;
        $this->vessel             = $this->fcl->vessel;
        $this->voyage             = $this->fcl->voyage;
        $this->addres_delivery    = $this->fcl->addres_delivery;
        $this->date_depo_pickup   = Convert::dateFormat($this->fcl->date_depo_pickup, "d/m/y H:i");
        $this->date_depo_delivery = Convert::dateFormat($this->fcl->date_depo_delivery, "d/m/y H:i");

        if (!empty($this->depot_id)) {
            $this->changeDepo($this->depot_id);
        }

        $this->origin_id      = $this->fcl->origin_id;
        $this->origin_city    = @$this->fcl->origin->city;
        $this->origin_country = @$this->fcl->origin->country;
        $this->origin_address = @$this->fcl->origin->address;

        $this->destination_id      = $this->fcl->destination_id;
        $this->destination_city    = @$this->fcl->destination->city;
        $this->destination_country = @$this->fcl->destination->country;
        $this->destination_address = @$this->fcl->destination->address;

        if (empty($this->origin_printed_as)) {
            $this->origin_printed_as = @$this->fcl->origin->name;
        }

        if (empty($this->destination_printed_as)) {
            $this->destination_printed_as = @$this->fcl->destination->name;
        }

        $this->pickup_id   = $this->fcl->pickup_id;
        $this->delivery_id = $this->fcl->delivery_id;

        $this->originport_id = $this->fcl->originport_id;
        $this->destiport_id  = $this->fcl->destiport_id;

        foreach ($this->fcl->containers as $key => $container) {
            if ($key > 0) {
                $this->addFormContainer($key);
            }

            $this->size[$key]           = $container->size;
            $this->container_type[$key] = $container->type;
            $this->qty[$key]            = $container->qty;

            if (!empty($container->containers)) {
                $cont_items = json_decode($container->containers);
                foreach ($cont_items as $i => $cont_item) {
                    $this->seals[$key][$i] = $cont_item->seal;
                    $this->containers[$key][$i] = $cont_item->container;
                }
            }
        }

        foreach ($this->fcl->cargos as $key => $fclCargo) {
            if ($key > 0) {
                $this->addFormCargo($key);
            }

            $this->cargo_description[$key]  = $fclCargo->cargo_description;
            $this->cargo_type[$key]         = $fclCargo->cargo_type;
            $this->cargo_hs_code[$key]      = $fclCargo->cargo_hs_code;
            $this->cargo_length[$key]       = $fclCargo->cargo_length;
            $this->cargo_height[$key]       = $fclCargo->cargo_height;
            $this->cargo_depth[$key]        = $fclCargo->cargo_depth;
            $this->cargo_weight[$key]       = $fclCargo->cargo_weight;
            $this->cargo_volume[$key]       = $fclCargo->cargo_volume;
            $this->cargo_total_weight[$key] = $fclCargo->cargo_total_weight;
            $this->cargo_total_unit[$key]   = $fclCargo->cargo_total_unit;
            $this->is_volume[$key]          = $fclCargo->is_volume;
            $this->cargo_id[$key]           = $fclCargo->cargo_id;
            $this->old_cargo_id[$key]       = $fclCargo->cargo_id;
            $this->marks_numbers[$key]      = $fclCargo->marks_numbers;
            $this->cargo_package_type[$key] = $fclCargo->cargo_package_type;
        }

        $this->changeTradeType();
        if ($this->chk_pickup == 1) {
            $this->changePickup($this->pickup_id);
        }

        if ($this->chk_delivery == 1) {
            $this->changeDelivery($this->delivery_id);
        }
    }

    public function changeDepo($depot_id)
    {
        if (empty($depot_id)) {
            return;
        }

        $loc = Depot::find($depot_id);
        if (!empty($loc)) {
            $this->depo_address = $loc->address;
            $this->depo_city    = $loc->city;
        }
    }

    public function submit()
    {
        $validate = [
            "trade_type" => "required",
        ];

        if ($this->chk_pickup) {
            $validate['date_pickup'] = "required";
        }

        if ($this->chk_delivery) {
            $validate['date_unloading'] = "required";
        }

        if ($this->fcl->quote_type == "fcl") {
            array_merge($validate, [
                "size.*"           => "required",
                "container_type.*" => "required",
                "qty.*"            => "required",
            ]);
        }

        $this->validate($validate);

        try {
            DB::beginTransaction();
            $this->fcl->insurance_cur    = $this->insurance_cur;
            $this->fcl->insurance_amount = empty($this->insurance_amount) ? 0 : preg_replace("/[^0-9]/", "", $this->insurance_amount);
            $this->fcl->delivery_id      = $this->delivery_id;
            $this->fcl->truck_id         = $this->truck_id;
            $this->fcl->qty_unit         = $this->qty_unit;
            $this->fcl->vessel           = $this->vessel;
            $this->fcl->voyage           = $this->voyage;
            $this->fcl->addres_delivery  = $this->addres_delivery;
            $this->fcl->save();

            $this->shipping->bl_number              = $this->bl_number;
            $this->shipping->airway_bill_no         = $this->airway_bill_no;
            $this->shipping->airway_bill_number     = $this->airway_bill_number;
            $this->shipping->doc_at                 = $this->doc_at;
            $this->shipping->doc_place              = $this->doc_place;
            $this->shipping->flight_date            = Convert::parseFromFormat("d/m/y", $this->flight_date);;
            $this->shipping->first_carrier          = $this->first_carrier;
            $this->shipping->handling_information   = $this->handling_information;
            $this->shipping->origin_printed_as      = $this->origin_printed_as;
            $this->shipping->destination_printed_as = $this->destination_printed_as;
            $this->shipping->port_printed_as        = $this->port_printed_as;
            $this->shipping->port_id                = $this->port_id;
            $this->shipping->shipper_id             = $this->shipper_id;
            $this->shipping->consignee_id           = $this->consignee_id;
            $this->shipping->notifi_id              = $this->notifi_id;
            $this->shipping->freight                = $this->freight;
            $this->shipping->freight_bl_type        = $this->freight_bl_type;
            $this->shipping->freight_remark         = $this->freight_remark;
            $this->shipping->goods_description      = $this->goods_description;
            $this->shipping->fcl_id                 = $this->fcl->id;
            $this->shipping->is_onboard             = $this->chk_onboard;
            $this->shipping->saveOrFail();

            $files = [];
            if (!empty($this->file_invoice)) {
                $files["file_invoice"] = $this->file_invoice->store("fclfiles", "public");
            }

            if (!empty($this->file_deliveryorder)) {
                $files["file_deliveryorder"] = $this->file_deliveryorder->store("fclfiles", "public");
            }

            if (!empty($this->file_deliverynote)) {
                $files["file_deliverynote"] = $this->file_deliverynote->store("fclfiles", "public");
            }

            if (!empty($this->file_packaging_list)) {
                $files["file_packaging_list"] = $this->file_packaging_list->store("fclfiles", "public");
            }

            if (!empty($this->file_cert_origin)) {
                $files["file_cert_origin"] = $this->file_cert_origin->store("fclfiles", "public");
            }

            if (!empty($this->file_bill_lading)) {
                $files["file_bill_lading"] = $this->file_bill_lading->store("fclfiles", "public");
            }

            if (!empty($this->file_others)) {
                $files["file_others"] = $this->file_others->store("fclfiles", "public");
            }

            if (!empty($files)) {
                $this->fcl->file_documents = json_encode($files);
                $this->fcl->save();
            }

            // create history
            $history = new DraftDocumentHistory();
            $history->fcl_id = $this->shipping->fcl_id;
            $history->user_id = request()->user()->id;
            $history->is_admin = request()->user()->isAdmin() ? 1 : 0;
            $history->is_update = $this->is_update;
            $history->detail = json_encode($this->shipping);
            $history->save();

            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            session()->flash("fms_error", $th->getMessage());
            if (request()->user()->isAdmin()) {
                return redirect()->route("internal.draft-doc.create", [$this->draft_type, $this->fcl->id]);
            }

            return redirect()->route("draft-doc.create", [$this->draft_type, $this->fcl->id]);
        }

        session()->flash("fms_info", "Draft Document Submited");
        if (request()->user()->isAdmin()) {
            try {
                Notification::sendNow($this->fcl->user, new AdminHasUploadDraftDocument($this->fcl));
            } catch (\Throwable $th) {
            }

            return redirect()->route("internal.draft-doc.create", [$this->draft_type, $this->fcl->id]);
        }

        return redirect()->route("draft-doc.create", [$this->draft_type, $this->fcl->id]);
    }

    public function render()
    {
        $_select_lock = ["shipment_type"];
        if ($this->trade_type == "DOM") {
            $_select_lock = [];
        }

        if ($this->trade_type != "DOM") {
            if (in_array($this->incoterm, ["DDP"])) {
                $this->shipment_type = "PTD";
            } elseif (in_array($this->incoterm, ["EXW"])) {
                $this->shipment_type = "DTP";
            } else {
                $this->shipment_type = "PTP";
            }
        }

        return view('livewire.form.draft-document', [
            'quote_type'   => $this->fcl->quote_type,
            "_select_lock" => $_select_lock,
        ]);
    }
}
