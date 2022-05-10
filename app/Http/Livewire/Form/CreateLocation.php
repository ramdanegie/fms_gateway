<?php

namespace App\Http\Livewire\Form;

use App\Models\Location;
use Livewire\Component;

class CreateLocation extends Component
{
    public $name;
    public $city;
    public $address;
    public $lat;
    public $lng;
    public $country;
    public $country_code;

    protected $listeners = [
        'getLatitudeForInput',
        'getLongitudeForInput',
    ];

    protected $rules = [
        'name'    => 'required|min:4',
        'city'    => 'required',
        'address' => 'required',
        'country' => 'required',
        'country_code' => 'required',
        'lng'     => 'required',
        'lat'     => 'required',
    ];

    public function getLatitudeForInput($value)
    {
        if(!is_null($value))
            $this->lat = $value;
    }

    public function getLongitudeForInput($value)
    {
        if(!is_null($value))
            $this->lng = $value;
    }

    public function submit()
    {
        $this->validate();
        if (Location::where("name", $this->name)->count() > 0) {
            session()->flash("fms_error", "Location with name : {$this->name} exist");
            return;
        }

        $model          = new Location();
        $model->name    = $this->name;
        $model->city    = $this->city;
        $model->address = $this->address;
        $model->country = $this->country;
        $model->country_code = $this->country_code;
        $model->lat     = $this->lat;
        $model->lng     = $this->lng;
        $model->user_id = request()->user()->id;

        try {
            $model->save();
        } catch (\Throwable $th) {
            session()->flash("fms_error", $th->getMessage());
            return;
        }

        session()->flash("fms_info", "Data Saved Successful");
        $this->reset();
    }

    public function render()
    {
        return view('livewire.form.create-location');
    }
}
