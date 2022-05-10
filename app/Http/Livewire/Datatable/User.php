<?php

namespace App\Http\Livewire\Datatable;

use Livewire\Component;
use Livewire\WithPagination;

class User extends Component
{
    use WithPagination;
    public $text_filter;

    public function render()
    {
        $data_from = ($this->page - 1) * 10 == 0 ? 1 : ($this->page - 1) * 10;
        $data_to   = $this->page * 10;
        $data_all  = \App\Models\User::search($this->text_filter)->count("id");

        if($data_to > $data_all) {
            $data_to = $data_all;
        }

        $items = \App\Models\User::search($this->text_filter)->simplePaginate(10);
        return view('livewire.datatable.user', [
            "items"     => $items,
            "data_from" => $data_from,
            "data_to"   => $data_to,
            "data_all"  => $data_all,
        ]);
    }
}
