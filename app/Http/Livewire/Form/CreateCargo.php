<?php

namespace App\Http\Livewire\Form;

use App\Models\Cargo;
use Livewire\Component;

class CreateCargo extends Component
{
    public $description;
    public $type;
    public $length;
    public $height;
    public $depth;
    public $weight;
    public $hs_code;

    public $cargo_types;

    protected $rules = [
        'description' => 'required|min:4',
        'hs_code'     => 'required|min:8',
        'type'        => 'required',
        'length'      => 'required',
        'height'      => 'required',
        'depth'       => 'required',
        'weight'      => 'required',
    ];

    public function mount()
    {
        $this->cargo_types = config("cargo_types");
    }

    public function submit() 
    {
        $this->validate();
        if(Cargo::where("description", $this->description)->count() > 0) {
            session()->flash("fms_error", "Cargo with description {$this->description} already exists");
            return;
        }

        $model              = new Cargo();
        $model->description = $this->description;
        $model->type        = $this->type;
        $model->length      = $this->length;
        $model->height      = $this->height;
        $model->depth       = $this->depth;
        $model->weight      = $this->weight;
        $model->hs_code     = $this->hs_code;
        $model->user_id     = request()->user()->id;

        try {
            $model->save();
        } catch (\Throwable $th) {
            session()->flash("fms_error", "Failed to Save. Please Try Again");
            return;
        }

        session()->flash("fms_info", "Data Saved Succesful");
        $this->reset();
        $this->cargo_types = config("cargo_types");
    }

    public function render()
    {
        return view('livewire.form.create-cargo');
    }
}
