<?php

namespace App\Http\Livewire\Form;

use App\Models\Depot;
use Livewire\Component;

class CreateDepot extends Component
{
    public $name;
    public $city;
    public $address;
    protected $rules = [
        'name'    => 'required|min:4',
        'city'    => 'required',
        'address' => 'required',
    ];

    public function submit() 
    {
        $this->validate();
        if(Depot::where("name", $this->name)->count() > 0) {
            session()->flash("fms_error", "Depot with name {$this->name} already exists");
            return;
        }

        $model          = new Depot();
        $model->user_id = auth()->user()->id;
        $model->name    = $this->name;
        $model->city    = $this->city;
        $model->address = $this->address;

        try {
            $model->save();
        } catch (\Throwable $th) {
            session()->flash("fms_error", "Failed to Save. Please Try Again");
            return;
        }

        session()->flash("fms_info", "Data Saved Succesful");
        $this->reset();
    }

    public function render()
    {
        return view('livewire.form.create-depot');
    }
}
