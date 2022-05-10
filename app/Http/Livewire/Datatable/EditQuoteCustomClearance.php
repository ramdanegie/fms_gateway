<?php

namespace App\Http\Livewire\Datatable;

use Livewire\Component;
use Livewire\WithPagination;

class EditQuoteCustomClearance extends Component
{
    use WithPagination;
    public $filter_status;

    public function render()
    {
        $data_from = ($this->page - 1) * 10 == 0 ? 1 : ($this->page - 1) * 10;
        $data_to   = $this->page * 10;
        $data_all  = \App\Models\CustomClearance::mine()->where("is_temp", 0)->count("id");

        if ($data_to > $data_all) {
            $data_to = $data_all;
        }

        $items = \App\Models\CustomClearance::mine()->where("is_temp", 0)->orderBy("created_at", "desc")->simplePaginate(10);
        return view('livewire.datatable.edit-quote-custom-clearance', [
            "items"     => $items,
            "data_from" => $data_from,
            "data_to"   => $data_to,
            "data_all"  => $data_all,
        ]);
    }
}
