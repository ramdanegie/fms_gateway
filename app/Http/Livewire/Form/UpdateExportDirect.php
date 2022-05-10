<?php

namespace App\Http\Livewire\Form;

use App\Helper\Convert;
use Carbon\Carbon;
use Livewire\Component;

class UpdateExportDirect extends Component
{
    public $exportDirect;
    public $destination;
    public $vessel;
    public $voyage;
    public $stf_cls;
    public $etd_origin;
    public $eta_destination;
    protected $rules = [
        'destination'     => 'required',
        'vessel'          => 'required',
        'voyage'          => 'required',
        'stf_cls'         => 'required',
        'etd_origin'      => 'required',
        'eta_destination' => 'required',
    ];

    public function mount()
    {
        $this->destination     = $this->exportDirect->destination;
        $this->vessel          = $this->exportDirect->vessel;
        $this->voyage          = $this->exportDirect->voyage;
        $this->stf_cls         = Convert::dateFormat($this->exportDirect->stf_cls, "d/m/Y");
        $this->etd_origin      = Convert::dateFormat($this->exportDirect->etd_origin, "d/m/Y");
        $this->eta_destination = Convert::dateFormat($this->exportDirect->eta_destination, "d/m/Y");
    }

    public function submit() 
    {
        $this->validate();

        $this->exportDirect->destination     = $this->destination;
        $this->exportDirect->vessel          = $this->vessel;
        $this->exportDirect->voyage          = $this->voyage;
        $this->exportDirect->stf_cls         = Carbon::createFromFormat("d/m/Y", $this->stf_cls)->format("Y-m-d");
        $this->exportDirect->etd_origin      = Carbon::createFromFormat("d/m/Y", $this->etd_origin)->format("Y-m-d");
        $this->exportDirect->eta_destination = Carbon::createFromFormat("d/m/Y", $this->eta_destination)->format("Y-m-d");

        try {
            $this->exportDirect->save();
        } catch (\Throwable $th) {
            session()->flash("fms_error", "Failed to Update. Please Try Again");
            return;
        }

        session()->flash("fms_info", "Data has been Updated");
    }

    public function render()
    {
        return view('livewire.form.update-export-direct');
    }
}
