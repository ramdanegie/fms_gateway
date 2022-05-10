<?php

namespace App\Http\Livewire\Form\Fcl;

use App\Client\Tms;
use App\Client\TmsDesktop;
use App\Exceptions\FmsException;
use App\Models\Sequence;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Confirm extends Component
{
    public $quote_type;
    public $redir;
    public $redir_payload;

    public $fullContainerLoad;
    public $form_page;

    public function mount()
    {
        $this->redir = "edit-quote";
        $this->redir_payload = [$this->quote_type];
    }

    public function confirmFcl()
    {
     
        $error = null;
        DB::beginTransaction();

        try {
            $this->fullContainerLoad->quote_no = Sequence::getSequence(Sequence::TYPE_QUOTE);
            $this->fullContainerLoad->is_temp = 0;
            $this->fullContainerLoad->save();

  
           TmsDesktop::createQuotation($error, [
              "booking_code"         => $this->fullContainerLoad->quote_no,
                "type_of_booking"     => $this->fullContainerLoad->trade_type,
                 "mode"                => strtoupper($this->fullContainerLoad->quote_type),
                 "movement_type"       => $this->fullContainerLoad->shipment_type,
                 "incoterm"            => $this->fullContainerLoad->incoterm,
                 "origin_country"      => $this->fullContainerLoad->origin ? $this->fullContainerLoad->origin->name : "-",
                 "origin_city"         => $this->fullContainerLoad->origin ? $this->fullContainerLoad->origin->city : "-",
                 "destination_country" => $this->fullContainerLoad->destination ? $this->fullContainerLoad->destination->name : "-",
                 "destination_city"    => $this->fullContainerLoad->destination ? $this->fullContainerLoad->destination->city : "-",
                 "insurance"           => $this->fullContainerLoad->insurance_amount,
                "insurance"           => $this->fullContainerLoad->insurance_amount,
                 "clearance"           => !empty($this->fullContainerLoad->is_custom_clearance) ? 1 : 0,
                 "pickup_datetime"     => empty($this->fullContainerLoad->date_pickup) ? now()->format("Y-m-d H:i:s") : $this->fullContainerLoad->date_pickup,
                 "shipper_id"          => 5,
                 "consignee_id"        => "JAPAN",
                 "notify_id"           => "SAME AS CONSIGNEE",
                 "number_of_bl"        => "3 (THREE) ORIGINAL",
                 "status"              => "prepared",
                 "total"               => 3,
                 "cargo_type"          => "-",
                 "trans_city"          => "-",
                 "trucking"            => 1,
                 "freight"             => "PREPAID",
                 "expect_etd"          => empty($this->fullContainerLoad->date_max_delivery) ? now()->addDays(12)->format("Y-m-d H:i:s") : $this->fullContainerLoad->date_max_delivery,
                 "eta"                 => now()->addDays(12)->format("Y-m-d H:i:s"),
                 "pic_document"        => "-",
                 "warehouse"           => "-",
                 "si_number"           => "-",
                 "remark"              => "-",
                 "valid_at"            => now()->addDays(12)->format("Y-m-d H:i:s"),
                 "shipper_name"        => "-",
                 "shipper_address"     => "-",
                 "consignee"           => "-",
                 "notify"              => "-",
                 "package_type"        => "-",
                 "quantity"            => "2",
                 "dimension"           => "-",
                 "volume"              => "12",
                 "weight"              => "200",
                 "netto"               => "-",
                 "container_type"      => "-",
                 "shipping_mark"       => "-",
                 "marking"             => "-",
                 "description_print"   => "-",
                 "description_of_goods" => "-",
                 "created_at"            => now()->addDays(12)->format("Y-m-d H:i:s"),
             ]);

            if(!empty($error)) {
                throw new FmsException($error);
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            //throw $th;

            if($th instanceof FmsException) {
                session()->flash("fms_error", $th->getMessage());                
            } else {
                session()->flash("fms_error", "Failed to Submit yout Quotation. Please Try Again");
            }

            return;
        }

        DB::commit();
        session()->flash("fms_info", "Your Quotation has been Submit Successfully");
        return redirect()->route($this->redir, $this->redir_payload);
    }

    public function render()
    {
        $isComfirmable = true;
        if (empty($this->fullContainerLoad->cargos)) {
            $isComfirmable = false;
        }

        return view('livewire.form.fcl.confirm', [
            "isComfirmable" => $isComfirmable
        ]);
    }
}
