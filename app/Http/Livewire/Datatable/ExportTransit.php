<?php

namespace App\Http\Livewire\Datatable;

use Livewire\Component;
use Livewire\WithPagination;

class ExportTransit extends Component
{
    use WithPagination;

    public function render()
    {
        $data_from = ($this->page - 1) * 10 == 0 ? 1 : ($this->page - 1) * 10;
        $data_to   = $this->page * 10;
        $data_all  = \App\Models\ExportTransit::count("id");

        if($data_to > $data_all) {
            $data_to = $data_all;
        }

        $items = \App\Models\ExportTransit::orderBy("created_at", "desc")->simplePaginate(10);
        return view('livewire.datatable.export-transit', [
            "items"     => $items,
            "data_from" => $data_from,
            "data_to"   => $data_to,
            "data_all"  => $data_all,
        ]);
    }
}