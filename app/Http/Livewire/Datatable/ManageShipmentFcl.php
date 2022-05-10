<?php

namespace App\Http\Livewire\Datatable;

use Livewire\Component;
use Livewire\WithPagination;

class ManageShipmentFcl extends Component
{
    use WithPagination;
    public $quote_type;
    public $filter_status;
    public $text_filter;
    public $f_quote_type;

    public function setFilterStatus($status)
    {
        if(empty($status) || $status == "pending") {
            $status = null;
        }

        $this->filter_status = $status;
    }

    public function render()
    {
        $model = \App\Models\FullContainerLoad::mine()->where("is_temp", 0);
        if(empty($this->filter_status)) {
            $model->whereNull("issued_status");
        } else {
            $model->where("issued_status", $this->filter_status);
        }

        if(!empty($this->f_quote_type)) {
            $model->where("quote_type", $this->f_quote_type);
        }

        if(!empty($this->text_filter)) {
            $model->search($this->text_filter);
        }

        $data_from = ($this->page - 1) * 10 == 0 ? 1 : ($this->page - 1) * 10;
        $data_to   = $this->page * 10;
        $data_all  = $model->count("id");

        if ($data_to > $data_all) {
            $data_to = $data_all;
        }

        $items = $model->orderBy("created_at", "desc")->simplePaginate(10);
        return view('livewire.datatable.manage-shipment-fcl', [
            "items"     => $items,
            "data_from" => $data_from,
            "data_to"   => $data_to,
            "data_all"  => $data_all,
        ]);
    }
}
