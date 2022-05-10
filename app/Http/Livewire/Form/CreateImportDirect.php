<?php

namespace App\Http\Livewire\Form;

use App\Models\ImportDirect;
use Carbon\Carbon;
use Livewire\Component;

class CreateImportDirect extends Component
{
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

    public function submit() 
    {
        $this->validate();

        $model                  = new ImportDirect();
        $model->destination     = $this->destination;
        $model->vessel          = $this->vessel;
        $model->voyage          = $this->voyage;
        $model->stf_cls         = Carbon::createFromFormat("d/m/Y", $this->stf_cls)->format("Y-m-d");
        $model->etd_origin      = Carbon::createFromFormat("d/m/Y", $this->etd_origin)->format("Y-m-d");
        $model->eta_destination = Carbon::createFromFormat("d/m/Y", $this->eta_destination)->format("Y-m-d");

        try {
            $model->save();
        } catch (\Throwable $th) {
            info($th->getMessage());
            session()->flash("fms_error", "Failed to Save. Please Try Again");
            return;
        }

        session()->flash("fms_info", "Data Saved Successful");
        $this->reset();
    }

    public function render()
    {
        return view('livewire.form.create-import-direct');
    }
}
