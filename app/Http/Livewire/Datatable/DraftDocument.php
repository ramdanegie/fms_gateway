<?php

namespace App\Http\Livewire\Datatable;

use App\Models\DraftDocumentHistory;
use App\Models\FclDraftDocument;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class DraftDocument extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $draft_type;
    public $page_title;
    public $is_admin;
    public $redir;

    // form param
    public $fcl_id;
    public $remark;
    public $file_attachments;

    public function mount()
    {
        $this->redir = "draft-doc";
        $this->is_admin = request()->user()->isAdmin();
        if ($this->is_admin) {
            $this->redir = "internal.draft-doc.list-shipment";
        }
    }

    public function setFclID($fcl_id = null)
    {
        if (empty($fcl_id)) {
            return;
        }

        $this->fcl_id = $fcl_id;
    }

    public function render()
    {
        $model = \App\Models\FullContainerLoad::where([
            ["is_temp", 0]
        ]);

        if ($this->draft_type == "AB") {
            $model->whereIn("quote_type", ["air-freight"]);
        }

        if ($this->draft_type == "BL") {
            $model->whereIn("quote_type", [
                "fcl",
                "lcl",
                "breakbulk",
                "ftl",
                "ltl",
            ]);
        }

        $data_from = ($this->page - 1) * 10 == 0 ? 1 : ($this->page - 1) * 10;
        $data_to   = $this->page * 10;
        $data_all  = $model->count("id");

        if ($data_to > $data_all) {
            $data_to = $data_all;
        }

        $items = $model->orderBy("created_at", "desc")->simplePaginate(10);
        return view('livewire.datatable.draft-document', [
            "items"     => $items,
            "data_from" => $data_from,
            "data_to"   => $data_to,
            "data_all"  => $data_all,
        ]);
    }
}
