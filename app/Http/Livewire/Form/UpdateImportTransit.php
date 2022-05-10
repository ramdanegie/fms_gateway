<?php

namespace App\Http\Livewire\Form;

use App\Helper\Convert;
use Carbon\Carbon;
use Livewire\Component;

class UpdateImportTransit extends Component
{
    public $importTransit;
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
        $this->destination     = $this->importTransit->destination;
        $this->vessel          = $this->importTransit->vessel;
        $this->voyage          = $this->importTransit->voyage;
        $this->stf_cls         = Convert::dateFormat($this->importTransit->stf_cls, "d/m/Y");
        $this->etd_origin      = Convert::dateFormat($this->importTransit->etd_origin, "d/m/Y");
        $this->ves_connecting  = $this->importTransit->ves_connecting;
        $this->voy_connecting  = $this->importTransit->voy_connecting;
        $this->eta_destination = Convert::dateFormat($this->importTransit->eta_destination, "d/m/Y");
        $this->city_connecting = $this->importTransit->city_connecting;
        $this->etd_destination = Convert::dateFormat($this->importTransit->etd_destination, "d/m/Y");
    }

    public function submit() 
    {
        $this->validate();

        $this->importTransit->destination     = $this->destination;
        $this->importTransit->vessel          = $this->vessel;
        $this->importTransit->voyage          = $this->voyage;
        $this->importTransit->stf_cls         = Carbon::createFromFormat("d/m/Y", $this->stf_cls)->format("Y-m-d");
        $this->importTransit->etd_origin      = Carbon::createFromFormat("d/m/Y", $this->etd_origin)->format("Y-m-d");
        $this->importTransit->ves_connecting  = $this->ves_connecting;
        $this->importTransit->voy_connecting  = $this->voy_connecting;
        $this->importTransit->eta_destination = Carbon::createFromFormat("d/m/Y", $this->eta_destination)->format("Y-m-d");
        $this->importTransit->city_connecting = $this->city_connecting;
        $this->importTransit->etd_destination = Carbon::createFromFormat("d/m/Y", $this->etd_destination)->format("Y-m-d");

        try {
            $this->importTransit->save();
        } catch (\Throwable $th) {
            info($th->getMessage());
            session()->flash("fms_error", "Failed to Update. Please Try Again");
            return;
        }

        session()->flash("fms_info", "Data has been Updated");
    }

    public function render()
    {
        return view('livewire.form.update-import-transit');
    }
}
