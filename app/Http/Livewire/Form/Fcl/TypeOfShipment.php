<?php

namespace App\Http\Livewire\Form\Fcl;

use App\Helper\Convert;
use App\Models\Cargo;
use App\Models\Depot;
use App\Models\Location;
use App\Models\MasterPort;
use Livewire\Component;

class TypeOfShipment extends Component {

    public $quote_type;
    public $redir;
    public $fullContainerLoad;
    public $edit_mode;
    public $form_page;
    public $list_trade_type;
    public $origins;
    public $picupLocation;
    public $cargos;
    public $ports;
    public $dest_ports;
    public $destinations;
    public $list_incoterm;
    public $list_depo;
    public $trade_type;
    public $npe_number;
    public $incoterm;
    public $shipment_type;
    public $date_pickup;
    public $date_est_shipment;
    public $date_unloading;
    public $file_documents;
    public $insurance_cur;
    public $insurance_amount;
    public $delivery_id;
    public $pickup_id;
    public $origin_id;
    public $destination_id;
    public $depot_id;
    public $date_depo_pickup;
    public $date_depo_delivery;
    public $originport_id;
    public $destiport_id;
    public $date_max_delivery;
    public $vessel;
    public $voyage;
    public $is_custom_clearance;
    public $is_request_cert_origin;
    public $is_pickup;
    public $is_delivery;
    public $is_lolo_charge;
    public $depo_city;
    public $depo_address;
    public $pickup_city;
    public $pickup_country;
    public $pickup_address;
    public $delivery_city;
    public $delivery_country;
    public $delivery_address;
    public $origin_city;
    public $origin_country;
    public $origin_address;
    public $destination_city;
    public $destination_country;
    public $destination_address;
    public $fleet_category;
    public $fleet_type;
    protected $listeners = [
        'changeOrigin' => 'changeOrigin',
        'changeDestination' => 'changeDestination',
        'changePickup' => 'changePickup',
        'changeDelivery' => 'changeDelivery',
    ];

    public function mount() {
        $this->cargos = Cargo::mine()->get();
        $this->list_depo = Depot::mine()->get();
        $this->trade_type = "EX";

        if ($this->quote_type == "ccl") {
            $this->list_trade_type = config("form-clc.list_trade_type");
        } else {
            $this->list_trade_type = config("form-fcl.list_trade_type");
        }

        if ($this->quote_type == "air-freight") {
            $this->list_incoterm = config("form-air.list_ex_incoterm");
        } else {
            $this->list_incoterm = config("form-fcl.list_ex_incoterm");
        }

        if ($this->quote_type == "ltl") {
            $this->shipment_type = "DTD";
        }

        if (!empty($this->fullContainerLoad->trade_type)) {
            $this->trade_type = $this->fullContainerLoad->trade_type;
            $this->incoterm = $this->fullContainerLoad->incoterm;
            $this->shipment_type = $this->fullContainerLoad->shipment_type;
            $this->date_pickup = Convert::dateFormat($this->fullContainerLoad->date_pickup, "d/m/y H:i");
            $this->date_est_shipment = Convert::dateFormat($this->fullContainerLoad->date_est_shipment, "d/m/y");
            $this->date_unloading = Convert::dateFormat($this->fullContainerLoad->date_unloading, "d/m/y H:i");
            $this->file_documents = $this->fullContainerLoad->file_documents;
            $this->insurance_cur = $this->fullContainerLoad->insurance_cur;
            $this->insurance_amount = $this->fullContainerLoad->insurance_amount;
            $this->origin_id = $this->fullContainerLoad->origin_id;
            $this->destination_id = $this->fullContainerLoad->destination_id;
            $this->originport_id = $this->fullContainerLoad->originport_id;
            $this->destiport_id = $this->fullContainerLoad->destiport_id;
            $this->is_custom_clearance = $this->fullContainerLoad->is_custom_clearance;
            $this->is_request_cert_origin = $this->fullContainerLoad->is_request_cert_origin;
            $this->is_pickup = $this->fullContainerLoad->is_pickup;
            $this->fleet_category = $this->fullContainerLoad->fleet_category;
            $this->fleet_type = $this->fullContainerLoad->fleet_type;
            $this->is_delivery = $this->fullContainerLoad->is_delivery;
            $this->is_lolo_charge = $this->fullContainerLoad->is_lolo_charge;
            $this->pickup_id = $this->fullContainerLoad->pickup_id;
            $this->delivery_id = $this->fullContainerLoad->delivery_id;
            $this->depot_id = $this->fullContainerLoad->depot_id;
            $this->date_depo_pickup = Convert::dateFormat($this->fullContainerLoad->date_depo_pickup, "d/m/y H:i");
            $this->date_depo_delivery = Convert::dateFormat($this->fullContainerLoad->date_depo_delivery, "d/m/y H:i");

            if (!empty($this->depot_id)) {
                $this->changeDepo($this->depot_id);
            }

            $this->date_max_delivery = Convert::dateFormat($this->fullContainerLoad->date_max_delivery, "d/m/y H:i");
            $this->vessel = $this->fullContainerLoad->vessel;
            $this->voyage = $this->fullContainerLoad->voyage;
            $this->npe_number = $this->fullContainerLoad->npe_number;

            $this->origin_city = @$this->fullContainerLoad->origin->city;
            $this->origin_country = @$this->fullContainerLoad->origin->country;
            $this->origin_address = @$this->fullContainerLoad->origin->address;

            $this->destination_city = @$this->fullContainerLoad->destination->city;
            $this->destination_country = @$this->fullContainerLoad->destination->country;
            $this->destination_address = @$this->fullContainerLoad->destination->address;
        }

        $this->changeTradeType();
        if ($this->is_pickup == 1) {
            $this->changePickup($this->pickup_id);
        }

        if ($this->is_delivery == 1) {
            $this->changeDelivery($this->delivery_id);
        }
    }

    public function changeDepo($depot_id) {
        if (empty($depot_id)) {
            return;
        }

        $loc = Depot::find($depot_id);
        if (!empty($loc)) {
            $this->depo_address = $loc->address;
            $this->depo_city = $loc->city;
        }
    }

    public function changeTradeType() {
        $this->list_incoterm = [];
        $this->ports = MasterPort::seaport()->get();
        $this->dest_ports = MasterPort::seaport()->whereRaw("lower(country) != 'indonesia'")->get();
        $this->destinations = Location::mine()->whereRaw("lower(country) != 'indonesia'")->get();
        $this->origins = Location::mine()->whereRaw("lower(country) = 'indonesia'")->get();
        $this->picupLocation = Location::mine()->get();

        if ($this->trade_type == "IM") {
            $this->destinations = Location::mine()->whereRaw("lower(country) = 'indonesia'")->get();
            $this->origins = Location::mine()->whereRaw("lower(country) != 'indonesia'")->get();
            $this->list_incoterm = config("form-fcl.list_im_incoterm");

            $this->dest_ports = MasterPort::seaport()->get();
            if ($this->quote_type == "lcl") {
                $this->dest_ports = MasterPort::seaport()->whereRaw("lower(country) = 'indonesia'")->get();
            }
        }

        if ($this->trade_type == "EX") {
            $this->destinations = Location::mine()->whereRaw("lower(country) != 'indonesia'")->get();
            $this->origins = Location::mine()->whereRaw("lower(country) = 'indonesia'")->get();
            $this->list_incoterm = config("form-fcl.list_ex_incoterm");

            $this->ports = MasterPort::seaport()->get();
            if ($this->quote_type == "fcl") {
                $this->ports = MasterPort::seaport()->whereRaw("lower(country) = 'indonesia'")->get();
            }
        }

        if (in_array($this->quote_type, ["ftl", "ltl"])) {
            $this->ports = MasterPort::seaport()->whereRaw("lower(country) = 'indonesia'")->get();
            $this->dest_ports = MasterPort::seaport()->whereRaw("lower(country) = 'indonesia'")->get();
            $this->destinations = Location::mine()->whereRaw("lower(country) = 'indonesia'")->get();
            $this->origins = Location::mine()->whereRaw("lower(country) = 'indonesia'")->get();
        }

        if ($this->quote_type == "air-freight") {
            if ($this->trade_type == "IM") {
                $this->destinations = Location::mine()->whereRaw("lower(country) = 'indonesia'")->get();
                $this->origins = Location::mine()->whereRaw("lower(country) != 'indonesia'")->get();
                $this->list_incoterm = config("form-air.list_im_incoterm");
            }

            if ($this->trade_type == "EX") {
                $this->destinations = Location::mine()->whereRaw("lower(country) != 'indonesia'")->get();
                $this->origins = Location::mine()->whereRaw("lower(country) = 'indonesia'")->get();
                $this->list_incoterm = config("form-air.list_ex_incoterm");
            }
        }
    }

    public function changeOrigin($origin_id, $type = "D") {
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
            $this->origin_city = $loc->city;
            $this->origin_id = null;
            $this->originport_id = null;

            if ($type == "D") {
                $this->origin_id = $origin_id;
            } else {
                $this->originport_id = $origin_id;
            }
        }
    }

    public function changeDestination($origin_id, $type = "D") {
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
            $this->destination_city = $loc->city;
            $this->destination_id = null;
            $this->destiport_id = null;

            if ($type == "D") {
                $this->destination_id = $origin_id;
            } else {
                $this->destiport_id = $origin_id;
            }
        }
    }

    public function submit() {
        $validate = [
            "trade_type" => "required"
        ];

        if ($this->is_pickup) {
            $validate['date_pickup'] = "required";
        }

        if ($this->is_delivery) {
            $validate['date_unloading'] = "required";
        }

        $this->validate($validate);

        $this->fullContainerLoad->trade_type = $this->trade_type;
        $this->fullContainerLoad->incoterm = $this->incoterm;
        $this->fullContainerLoad->shipment_type = $this->shipment_type;
        $this->fullContainerLoad->date_pickup = Convert::parseFromFormat("d/m/y H:i", $this->date_pickup);
        $this->fullContainerLoad->date_est_shipment = Convert::parseFromFormat("d/m/y", $this->date_est_shipment);
        $this->fullContainerLoad->date_unloading = Convert::parseFromFormat("d/m/y H:i", $this->date_unloading);
        $this->fullContainerLoad->file_documents = $this->file_documents;
        $this->fullContainerLoad->insurance_cur = $this->insurance_cur;
        $this->fullContainerLoad->insurance_amount = $this->insurance_amount;
        $this->fullContainerLoad->is_custom_clearance = $this->is_custom_clearance;
        $this->fullContainerLoad->is_request_cert_origin = $this->is_request_cert_origin;
        $this->fullContainerLoad->is_pickup = $this->is_pickup;
        $this->fullContainerLoad->is_delivery = $this->is_delivery;
        $this->fullContainerLoad->is_lolo_charge = $this->is_lolo_charge;
        $this->fullContainerLoad->pickup_id = $this->pickup_id;
        $this->fullContainerLoad->delivery_id = $this->delivery_id;

        $this->fullContainerLoad->origin_id = $this->origin_id;
        $this->fullContainerLoad->destination_id = $this->destination_id;
        $this->fullContainerLoad->originport_id = $this->originport_id;
        $this->fullContainerLoad->destiport_id = $this->destiport_id;
        $this->fullContainerLoad->depot_id = $this->depot_id;
        $this->fullContainerLoad->date_depo_pickup = Convert::parseFromFormat("d/m/y H:i", $this->date_depo_pickup);
        $this->fullContainerLoad->date_depo_delivery = Convert::parseFromFormat("d/m/y H:i", $this->date_depo_delivery);
        $this->fullContainerLoad->date_max_delivery = Convert::parseFromFormat("d/m/y H:i", $this->date_max_delivery);
        $this->fullContainerLoad->vessel = $this->vessel;
        $this->fullContainerLoad->voyage = $this->voyage;
        $this->fullContainerLoad->npe_number = $this->npe_number;
        $this->fullContainerLoad->fleet_category = $this->fleet_category;
        $this->fullContainerLoad->fleet_type = $this->fleet_type;

        try {
            $this->fullContainerLoad->save();
        } catch (\Throwable $th) {
            //throw $th;
            info($th->getMessage());
            session()->flash("fms_error", "Failed to Saved. Please Try Again");
            return;
        }

        return redirect()->route($this->redir, ["quote_type" => $this->quote_type, "page" => "page-2", "fcl_id" => $this->fullContainerLoad->id, "edit_mode" => $this->edit_mode]);
    }

    public function changePickup($pickup_id) {
        if (empty($pickup_id)) {
            return;
        }

        $loc = Location::find($pickup_id);
        if (!empty($loc)) {
            $this->pickup_address = $loc->address;
            $this->pickup_country = $loc->country;
            $this->pickup_city = $loc->city;
            $this->pickup_id = $pickup_id;
        }
    }

    public function changeDelivery($delivery_id) {
        if (empty($delivery_id)) {
            return;
        }

        $loc = Location::find($delivery_id);
        if (!empty($loc)) {
            $this->delivery_address = $loc->address;
            $this->delivery_country = $loc->country;
            $this->delivery_city = $loc->city;
            $this->delivery_id = $delivery_id;
        }
    }

    public function render() {
        $_select_lock = ["shipment_type"];
        if ($this->trade_type == "DOM" || in_array($this->quote_type, ["ltl", "ccl"])) {
            $_select_lock = [];
        }

        if (!in_array($this->quote_type, ["ltl", "ccl"])) {
            if ($this->quote_type != "air-freight") {
                // non air freight shipment type 
                if ($this->trade_type != "DOM") {
                    if (in_array($this->incoterm, ["DDP"])) {
                        $this->shipment_type = "PTD";
                    } elseif (in_array($this->incoterm, ["EXW"])) {
                        $this->shipment_type = "DTP";
                    } else {
                        $this->shipment_type = "PTP";
                    }
                }
            } else {
                // air freight shipment type 
                if (in_array($this->incoterm, ["DDP", "EXW"]) && $this->trade_type != "FO") {
                    $this->shipment_type = "DTD";
                } else {
                    if ($this->trade_type == "EX") {
                        $this->shipment_type = "DTP";
                    }

                    if ($this->trade_type == "IM") {
                        $this->shipment_type = "PTD";
                    }

                    if ($this->trade_type == "FO") {
                        $this->shipment_type = "PTP";
                    }
                }
            }
        }

        if ($this->trade_type == "EX") {
            $this->is_delivery = null;
            $this->date_unloading = null;
        }

        if ($this->trade_type == "IM") {
            $this->is_pickup = null;
            $this->date_pickup = null;
        }

        return view('livewire.form.fcl.type-of-shipment', [
            "_select_lock" => $_select_lock
        ]);
    }

}
