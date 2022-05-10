<?php

namespace App\Http\Livewire\Datatable;

use Livewire\Component;
use Livewire\WithPagination;

class TypeContainer extends Component
{
    use WithPagination;

    public function render()
    {
        $data_from = ($this->page - 1) * 10 == 0 ? 1 : ($this->page - 1) * 10;
        $data_to   = $this->page * 10;
        $data_all  = \App\Models\TypeContainer::count("id");

        if ($data_to > $data_all) {
            $data_to = $data_all;
        }

        $items = \App\Models\TypeContainer::simplePaginate(10);
        return view('livewire.datatable.type-container', [
            "items"     => $items,
            "data_from" => $data_from,
            "data_to"   => $data_to,
            "data_all"  => $data_all,
        ]);
    }
}
