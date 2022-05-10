<?php

namespace App\Http\Livewire\Datatable;

use App\Helper\Convert;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class ScheduleDirect extends Component
{
    use WithPagination;
    public $filter_status;
    public $filter_etd;
    public $filter_dest;

    public function setFilterStatus($status)
    {
        if(empty($status)) {
            $status = "EX";
        }

        $this->filter_status = $status;
    }

    public function mount()
    {
        $this->filter_status = "EX";
    }

    public function render()
    {
        $source = null;
        if($this->filter_status == "EX") {
            $source = \App\Models\ExportDirect::whereRaw("1=1");
            if(!empty($this->filter_dest)) {
                $source->where("destination", "like", "%{$this->filter_dest}%");
            }

            if(!empty($this->filter_etd)) {
                $source->where("etd_origin", Carbon::createFromFormat("d/m/Y", $this->filter_etd)->format("Y-m-d"));
            }
        }

        if($this->filter_status == "IM") {
            $source = \App\Models\ImportDirect::whereRaw("1=1");
            if(!empty($this->filter_dest)) {
                $source->where("destination", "like", "%{$this->filter_dest}%");
            }

            if(!empty($this->filter_etd)) {
                $source->where("etd_origin", Carbon::createFromFormat("d/m/Y", $this->filter_etd)->format("Y-m-d"));
            }
        }

        if($source == null) {
            return abort(404);
        }

        $data_from = ($this->page - 1) * 10 == 0 ? 1 : ($this->page - 1) * 10;
        $data_to   = $this->page * 10;
        $data_all  = $source->count("id");

        if ($data_to > $data_all) {
            $data_to = $data_all;
        }

        $items = $source->simplePaginate(10);
        return view('livewire.datatable.schedule-direct', [
            "items"     => $items,
            "data_from" => $data_from,
            "data_to"   => $data_to,
            "data_all"  => $data_all,
        ]);
    }
}
