<?php

namespace App\Http\Livewire\Form;

use App\Models\Truck;
use Livewire\Component;

class CreateTruck extends Component
{
    public $name;
    public $type;
    protected $rules = [
        'name' => 'required|min:2',
    ];

    public function submit() 
    {
        $this->validate();
        if(Truck::where("name", $this->name)->count() > 0) {
            session()->flash("fms_error", "Truck with name : {$this->name} exist");
            return;
        }

        $model          = new Truck();
        $model->name    = $this->name;
        $model->type    = $this->type;
        $model->user_id = auth()->user()->id;

        try {
            $model->save();
        } catch (\Throwable $th) {
            session()->flash("fms_error", "Failed to Save. Please Try Again");
            return;
        }

        session()->flash("fms_info", "Data Saved Successful");
        $this->reset();
    }

    public function render()
    {
        return view('livewire.form.create-truck');
    }
}
