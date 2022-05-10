<?php

namespace App\Http\Livewire\Form;

use App\Helper\Convert;
use Carbon\Carbon;
use Livewire\Component;

class UpdateExportTransit extends Component
{
    public $exportTransit;
    public $destination;
    public $vessel;
    public $voyage;
    public $stf_cls;
    public $etd_origin;
    public $ves_connecting;
    public $voy_connecting;
    public $eta_destination;
    public $city_connecting;
    public $etd_destination;
    protected $rules = [
        'destination'     => 'required',
        'vessel'          => 'required',
        'voyage'          => 'required',
        'stf_cls'         => 'required',
        'etd_origin'      => 'required',
        'ves_connecting'  => 'required',
        'voy_connecting'  => 'required',
        'eta_destination' => 'required',
        'city_connecting' => 'required',
        'etd_destination' => 'required',
    ];

    public function mount()
    {
        $this->destination     = $this->exportTransit->destination;
        $this->vessel          = $this->exportTransit->vessel;
        $this->voyage          = $this->exportTransit->voyage;
        $this->stf_cls         = Convert::dateFormat($this->exportTransit->stf_cls, "d/m/Y");
        $this->etd_origin      = Convert::dateFormat($this->exportTransit->etd_origin, "d/m/Y");
        $this->ves_connecting  = $this->exportTransit->ves_connecting;
        $this->voy_connecting  = $this->exportTransit->voy_connecting;
        $this->eta_destination = Convert::dateFormat($this->exportTransit->eta_destination, "d/m/Y");
        $this->city_connecting = $this->exportTransit->city_connecting;
        $this->etd_destination = Convert::dateFormat($this->exportTransit->etd_destination, "d/m/Y");
    }

    public function submit() 
    {
        $this->validate();

        $this->exportTransit->destination     = $this->destination;
        $this->exportTransit->vessel          = $this->vessel;
        $this->exportTransit->voyage          = $this->voyage;
        $this->exportTransit->stf_cls         = Carbon::createFromFormat("d/m/Y", $this->stf_cls)->format("Y-m-d");
        $this->exportTransit->etd_origin      = Carbon::createFromFormat("d/m/Y", $this->etd_origin)->format("Y-m-d");
        $this->exportTransit->ves_connecting  = $this->ves_connecting;
        $this->exportTransit->voy_connecting  = $this->voy_connecting;
        $this->exportTransit->eta_destination = Carbon::createFromFormat("d/m/Y", $this->eta_destination)->format("Y-m-d");
        $this->exportTransit->city_connecting = $this->city_connecting;
        $this->exportTransit->etd_destination = Carbon::createFromFormat("d/m/Y", $this->etd_destination)->format("Y-m-d");

        try {
            $this->exportTransit->save();
        } catch (\Throwable $th) {
            info($th->getMessage());
            session()->flash("fms_error", "Failed to Update. Please Try Again");
            return;
        }

        session()->flash("fms_info", "Data has been Updated");
    }

    public function render()
    {
        return view('livewire.form.update-export-transit');
    }
}
