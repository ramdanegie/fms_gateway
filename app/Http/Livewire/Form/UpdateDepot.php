<?php

namespace App\Http\Livewire\Form;

use App\Models\Depot;
use Livewire\Component;

class UpdateDepot extends Component
{
    public $depot;
    public $name;
    public $city;
    public $address;
    protected $rules = [
        'name'    => 'required|min:4',
        'city'    => 'required',
        'address' => 'required',
    ];

    public function mount()
    {
        $this->name    = $this->depot->name;
        $this->city    = $this->depot->city;
        $this->address = $this->depot->address;
    }

    public function submit() 
    {
        $this->validate();
        if(Depot::where("name", $this->name)->where("id", "!=", $this->depot->id)->count() > 0) {
            session()->flash("fms_error", "Depo with name : {$this->name} exist");
            return;
        }

        $this->depot->name    = $this->name;
        $this->depot->city    = $this->city;
        $this->depot->address = $this->address;

        try {
            $this->depot->save();
        } catch (\Throwable $th) {
            info($th->getMessage());
            session()->flash("fms_error", "Failed to Update. Please Try Again");
            return;
        }

        session()->flash("fms_info", "Data has been Updated");
    }

    public function render()
    {
        return view('livewire.form.update-depot');
    }
}
