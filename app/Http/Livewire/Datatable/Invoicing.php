<?php

namespace App\Http\Livewire\Datatable;

use App\Models\FclDraftDocument;
use App\Models\FclInvoicing;
use App\Models\FullContainerLoad;
use App\Models\InvoicingHistory;
use App\Notifications\AdminHasUploadInvoice;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Invoicing extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $page_title;
    public $is_admin;
    public $redir;

    // form param
    public $fcl_id;
    public $remark;
    public $file_attachments;
    public $invrule_type;

    public function mount()
    {
        $this->redir = "invoice.list";
        $this->is_admin = request()->user()->isAdmin();
        $this->page_title = "Payment Receipt";
        if ($this->is_admin) {
            $this->redir = "internal.invoicing.list";
            $this->page_title = "Invoicing";
        }
    }

    public function setFclID($fcl_id = null)
    {
        if (empty($fcl_id)) {
            return;
        }

        $this->fcl_id = $fcl_id;
    }

    public function uploadFile()
    {
        if (empty($this->fcl_id)) {
            return redirect()->route($this->redir)->with("fms_error", "Quotation not seletected");
        }

        if (empty($this->file_attachments)) {
            return redirect()->route($this->redir)->with("fms_error", "File attachment is required");
        }

        $allowedExt = ["pdf", "png", "jpg", "jpeg"];
        if (!in_array($this->file_attachments->getClientOriginalExtension(), $allowedExt)) {
            return redirect()->route($this->redir)->with("fms_error", "Invalid Ext, allowed: " . implode(", ", $allowedExt));
        }

        try {
            DB::beginTransaction();
            $is_update = 0;
            $model = \App\Models\FclInvoicing::where("fcl_id", $this->fcl_id)->first();
            if (!empty($model)) {
                $model->delete();
                $is_update = 1;
            }

            $model                   = new FclInvoicing();
            $model->fcl_id           = $this->fcl_id;
            $model->invrule_type     = $this->invrule_type;
            $model->remark           = $this->remark;
            $model->file_attachments = $this->file_attachments->store("draft-files", "public");
            $model->save();

            $history = new InvoicingHistory();
            $history->fcl_id = $this->fcl_id;
            $history->user_id = request()->user()->id;
            $history->is_admin = request()->user()->isAdmin() ? 1 : 0;
            $history->is_update = $is_update;
            $history->detail = json_encode($model);
            $history->save();
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route($this->redir)->with("fms_error", $th->getMessage());
        }

        try {
            $fcl = FullContainerLoad::findOrFail($this->fcl_id);
            Notification::sendNow($fcl->user, new AdminHasUploadInvoice($fcl));
        } catch (\Throwable $th) {}

        DB::commit();
        return redirect()->route($this->redir)->with("fms_info", "Your Data has been Uploaded");
    }

    public function render()
    {
        $model = \App\Models\FullContainerLoad::where([
            ["is_temp", 0]
        ]);

        $data_from = ($this->page - 1) * 10 == 0 ? 1 : ($this->page - 1) * 10;
        $data_to   = $this->page * 10;
        $data_all  = $model->count("id");

        if ($data_to > $data_all) {
            $data_to = $data_all;
        }

        $items = $model->orderBy("created_at", "desc")->simplePaginate(10);
        return view('livewire.datatable.invoicing', [
            "items"     => $items,
            "data_from" => $data_from,
            "data_to"   => $data_to,
            "data_all"  => $data_all,
        ]);
    }
}
