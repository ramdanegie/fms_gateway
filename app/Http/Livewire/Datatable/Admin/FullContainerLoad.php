<?php

namespace App\Http\Livewire\Datatable\Admin;

use App\Helper\Common;
use App\Helper\Convert;
use App\Models\Sequence;
use App\Notifications\AdminHasApproveQuotation;
use App\Notifications\AdminHasUploadProforma;
use App\Notifications\ShipmentFinish;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class FullContainerLoad extends Component
{
    use WithPagination, WithFileUploads;
    public $issued_status;
    public $upload_selected;

    public $file_performa_invoice;
    public $pi_value;
    public $pi_currency;
    public $pi_valid_until;

    public $text_filter;
    public $f_quote_type;

    public function selectUpload($fcl_id)
    {
        if (empty($fcl_id)) {
            return;
        }

        $fcl = \App\Models\FullContainerLoad::find($fcl_id);
        if (empty($fcl)) {
            session()->flash("fms_error", "FCL not found");
            return;
        }

        $this->upload_selected = $fcl->toArray();
    }

    public function uploadFilePerforma()
    {
        $this->validate([
            "file_performa_invoice" => "required",
            "pi_value"              => "required",
            "pi_currency"           => "required",
            "pi_valid_until"        => "required",
        ]);

        if(empty($this->upload_selected)) {
            return redirect()->route("internal.fcl_list")->with("fms_error", "No FCL selected");
        }

        if(empty($this->upload_selected['id'])) {
            return redirect()->route("internal.fcl_list")->with("fms_error", "Invalid FCL item");
        }

        $fcl = \App\Models\FullContainerLoad::find($this->upload_selected['id']);
        if (empty($fcl)) {
            return redirect()->route("internal.fcl_list")->with("fms_error", "FCL Not found");
        }

        try {
            DB::beginTransaction();
            $fcl->file_performa_invoice = $this->file_performa_invoice->store("fclfiles", "public");
            $fcl->pi_upload_at          = now();
            $fcl->pi_value              = $this->pi_value;
            $fcl->pi_currency           = $this->pi_currency;
            $fcl->pi_valid_until        = Convert::parseFromFormat("d/m/y H:i", $this->pi_valid_until);
            $fcl->save();
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route("internal.fcl_list")->with("fms_error", $th->getMessage());
        }

        try {
            Notification::sendNow($fcl->user, new AdminHasUploadProforma($fcl));
        } catch (\Throwable $th) {}

        DB::commit();
        return redirect()->route("internal.fcl_list")->with("fms_info", "Proforma Invoice/Quotation uploaded");
    }

    public function completeShipment($fcl_id)
    {
        if (empty($fcl_id)) {
            return;
        }

        $fcl = \App\Models\FullContainerLoad::find($fcl_id);
        if (empty($fcl)) {
            session()->flash("fms_error", "FCL not found");
            return;
        }

        try {
            $fcl->issued_status = \App\Models\FullContainerLoad::COMPLETE;
            $fcl->shipment_no   = Sequence::getSequence(Sequence::TYPE_SHIPMENT);
            $fcl->issued_at     = now();
            $fcl->save();

            Notification::sendNow($fcl->user, new ShipmentFinish($fcl));
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash("fms_error", $th->getMessage());
            return;
        }

        session()->flash("fms_info", "FCL acepted");
    }

    public function agreeQuote($fcl_id)
    {
        if (empty($fcl_id)) {
            return;
        }

        $fcl = \App\Models\FullContainerLoad::find($fcl_id);
        if (empty($fcl)) {
            session()->flash("fms_error", "FCL not found");
            return;
        }

        if(empty($fcl->shippingInstruction)) {
            session()->flash("fms_error", "Approve failed. FCL has no shipping instruction");
            return;
        }

        try {
            $shipping = $fcl->shippingInstruction;
            $shipping->is_admin_approve = 1;
            $shipping->save();

            $fcl->issued_status = \App\Models\FullContainerLoad::PROGRESS;
            $fcl->issued_at     = now();
            $fcl->save();
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash("fms_error", $th->getMessage());
            return;
        }

        try {
            Notification::sendNow($fcl->user, new AdminHasApproveQuotation($fcl));
        } catch (\Throwable $th) {}

        session()->flash("fms_info", "FCL acepted");
    }

    public function cancelQuote($fcl_id)
    {
        if (empty($fcl_id)) {
            return;
        }

        $fcl = \App\Models\FullContainerLoad::find($fcl_id);
        if (empty($fcl)) {
            session()->flash("fms_error", "FCL not found");
            return;
        }

        try {
            $fcl->issued_status = \App\Models\FullContainerLoad::CANCEL;
            $fcl->issued_at = now();
            $fcl->save();
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash("fms_error", $th->getMessage());
            return;
        }

        session()->flash("fms_info", "FCL Canceled");
    }

    public function render()
    {
        $fcl = \App\Models\FullContainerLoad::where("is_temp", 0);
        if (empty($this->issued_status)) {
            $fcl->whereNull("issued_status");
        } else {
            $fcl->where("issued_status", $this->issued_status);
        }

        if(!empty($this->f_quote_type)) {
            $fcl->where("quote_type", $this->f_quote_type);
        }

        if(!empty($this->text_filter)) {
            $fcl->search($this->text_filter);
        }

        $data_from = ($this->page - 1) * 10 == 0 ? 1 : ($this->page - 1) * 10;
        $data_to   = $this->page * 10;
        $data_all  = $fcl->count("id");

        if ($data_to > $data_all) {
            $data_to = $data_all;
        }

        $items = $fcl->orderBy("created_at", "desc")->simplePaginate(10);
        return view('livewire.datatable.admin.full-container-load', [
            "items"     => $items,
            "data_from" => $data_from,
            "data_to"   => $data_to,
            "data_all"  => $data_all,
        ]);
    }
}
