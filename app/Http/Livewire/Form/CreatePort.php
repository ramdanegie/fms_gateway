<?php

namespace App\Http\Livewire\Form;

use App\Models\MasterPort;
use Livewire\Component;

class CreatePort extends Component
{
    public $name;
    public $city;
    public $address;
    public $lat;
    public $lng;
    public $country;
    public $country_code;
    public $type;

    protected $listeners = [
        'getLatitudeForInput',
        'getLongitudeForInput',
    ];

    protected $rules = [
        'name'    => 'required|min:2',
        'type'    => 'required',
        'country' => 'required',
        'country_code' => 'required',
        'city'    => 'required',
        'address' => 'required',
        'lat'     => 'required',
        'lng'     => 'required',
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
        if(MasterPort::where("name", $this->name)->count() > 0) {
            session()->flash("fms_error", "Port with name : {$this->name} exist");
            return;
        }

        $model          = new MasterPort();
        $model->name    = $this->name;
        $model->city    = $this->city;
        $model->address = $this->address;
        $model->country = $this->country;
        $model->country_code = $this->country_code;
        $model->lat     = $this->lat;
        $model->lng     = $this->lng;
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
        return view('livewire.form.create-port');
    }
}
