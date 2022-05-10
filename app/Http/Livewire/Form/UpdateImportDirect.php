<?php

namespace App\Http\Livewire\Form;

use App\Helper\Convert;
use App\Models\ImportDirect;
use Carbon\Carbon;
use Livewire\Component;

class UpdateImportDirect extends Component
{
    public $importDirect;
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
        $this->destination     = $this->importDirect->destination;
        $this->vessel          = $this->importDirect->vessel;
        $this->voyage          = $this->importDirect->voyage;
        $this->stf_cls         = Convert::dateFormat($this->importDirect->stf_cls, "d/m/Y");
        $this->etd_origin      = Convert::dateFormat($this->importDirect->etd_origin, "d/m/Y");
        $this->eta_destination = Convert::dateFormat($this->importDirect->eta_destination, "d/m/Y");
    }

    public function submit() 
    {
        $this->validate();

        $this->importDirect->destination     = $this->destination;
        $this->importDirect->vessel          = $this->vessel;
        $this->importDirect->voyage          = $this->voyage;
        $this->importDirect->stf_cls         = Carbon::createFromFormat("d/m/Y", $this->stf_cls)->format("Y-m-d");
        $this->importDirect->etd_origin      = Carbon::createFromFormat("d/m/Y", $this->etd_origin)->format("Y-m-d");
        $this->importDirect->eta_destination = Carbon::createFromFormat("d/m/Y", $this->eta_destination)->format("Y-m-d");

        try {
            $this->importDirect->save();
        } catch (\Throwable $th) {
            session()->flash("fms_error", "Failed to Update. Please Try Again");
            return;
        }

        session()->flash("fms_info", "Data has been Updated");
    }

    public function render()
    {
        return view('livewire.form.update-import-direct');
    }
}
