<?php

namespace App\Http\Livewire\Form;

use App\Models\ExportTransit;
use Carbon\Carbon;
use Livewire\Component;

class CreateExportTransit extends Component
{
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

    public function submit() 
    {
        $this->validate();

        $model                  = new ExportTransit();
        $model->destination     = $this->destination;
        $model->vessel          = $this->vessel;
        $model->voyage          = $this->voyage;
        $model->stf_cls         = Carbon::createFromFormat("d/m/Y", $this->stf_cls)->format("Y-m-d");
        $model->etd_origin      = Carbon::createFromFormat("d/m/Y", $this->etd_origin)->format("Y-m-d");
        $model->ves_connecting  = $this->ves_connecting;
        $model->voy_connecting  = $this->voy_connecting;
        $model->eta_destination = Carbon::createFromFormat("d/m/Y", $this->eta_destination)->format("Y-m-d");
        $model->city_connecting = $this->city_connecting;
        $model->etd_destination = Carbon::createFromFormat("d/m/Y", $this->etd_destination)->format("Y-m-d");

        try {
            $model->save();
        } catch (\Throwable $th) {
            info($th->getMessage());
            session()->flash("fms_error", "Failed to Save. Please Try Again");
            return;
        }

        session()->flash("fms_info", "Data Saved Succesful");
        $this->reset();
    }

    public function render()
    {
        return view('livewire.form.create-export-transit');
    }
}
