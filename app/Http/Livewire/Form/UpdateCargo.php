<?php

namespace App\Http\Livewire\Form;

use App\Models\Cargo;
use Livewire\Component;

class UpdateCargo extends Component
{
    public $cargo;
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
        'type'        => 'required',
        'length'      => 'required',
        'height'      => 'required',
        'depth'       => 'required',
        'weight'      => 'required',
    ];

    public function mount()
    {
        $this->cargo_types = config("cargo_types");
        $this->description = $this->cargo->description;
        $this->type        = $this->cargo->type;
        $this->length      = $this->cargo->length;
        $this->height      = $this->cargo->height;
        $this->depth       = $this->cargo->depth;
        $this->weight      = $this->cargo->weight;
        $this->hs_code     = $this->cargo->hs_code;
    }

    public function submit() 
    {
        $this->validate();
        if(Cargo::where("description", $this->description)->where("id", "!=", $this->cargo->id)->count() > 0) {
            session()->flash("fms_error", "Cargo with description : {$this->description} exist");
            return;
        }

        if(request()->user()->id != $this->cargo->user_id) {
            session()->flash("fms_error", "Data cargo doesnt match");
            return;
        }

        $this->cargo->description = $this->description;
        $this->cargo->type        = $this->type;
        $this->cargo->length      = $this->length;
        $this->cargo->height      = $this->height;
        $this->cargo->depth       = $this->depth;
        $this->cargo->weight      = $this->weight;
        $this->cargo->hs_code     = $this->hs_code;

        try {
            $this->cargo->save();
        } catch (\Throwable $th) {
            session()->flash("fms_error", "Failed to Update. Please Try Again");
            return;
        }

        session()->flash("fms_info", "Data has been Updated");
    }

    public function render()
    {
        return view('livewire.form.update-cargo');
    }
}
