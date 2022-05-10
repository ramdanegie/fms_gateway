<?php

namespace App\Http\Livewire\Datatable;

use Livewire\Component;
use Livewire\WithPagination;

class Tracking extends Component
{
    use WithPagination;

    public function render()
    {
        $model = \App\Models\Tracking::whereRaw("1=1");
        $data_from = ($this->page - 1) * 10 == 0 ? 1 : ($this->page - 1) * 10;
        $data_to   = $this->page * 10;
        $data_all  = $model->count("id");

        if($data_to > $data_all) {
            $data_to = $data_all;
        }

        $items = $model->simplePaginate(10);
        return view('livewire.datatable.tracking', [
            "items"     => $items,
            "data_from" => $data_from,
            "data_to"   => $data_to,
            "data_all"  => $data_all,
        ]);
    }
}
