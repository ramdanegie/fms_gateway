<?php

namespace App\Http\Livewire\Form;

use App\Models\Location;
use Livewire\Component;

class UpdateLocation extends Component
{
    public $location;
    public $name;
    public $city;
    public $address;
    public $country;
    public $country_code;
    protected $rules = [
        'name'    => 'required|min:4',
        'city'    => 'required',
        'address' => 'required',
    ];

    public function mount()
    {
        $this->name = $this->location->name;
        $this->city = $this->location->city;
        $this->address = $this->location->address;
    }

    public function submit() 
    {
        $this->validate();
        if(Location::where("name", $this->name)->where("id", "!=", $this->location->id)->count() > 0) {
            session()->flash("fms_error", "Location with name :{$this->name} exist");
            return;
        }

        if(request()->user()->id != $this->location->user_id) {
            session()->flash("fms_error", "Data Location doesnt match");
            return;
        }

        $this->location->name    = $this->name;
        $this->location->city    = $this->city;
        $this->location->address = $this->address;
        $this->location->country = $this->country;
        $this->location->country_code = $this->country_code;

        try {
            $this->location->save();
        } catch (\Throwable $th) {
            session()->flash("fms_error", "Failed to Update. Please Try Again");
            return;
        }

        session()->flash("fms_info", "Data has been Updated");
    }

    public function render()
    {
        return view('livewire.form.update-location');
    }
}
