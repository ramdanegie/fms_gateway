<?php

namespace App\Http\Livewire\Form;

use App\Models\MasterPort;
use Livewire\Component;

class UpdatePort extends Component
{
    public $masterPort;
    public $name;
    public $type;
    public $city;
    public $address;
    public $country;
    public $country_code;
    public $lat;
    public $lng;
    public $user_id;

    protected $rules = [
        'name' => 'required|min:2',
    ];

    public function mount()
    {
        $this->name         = $this->masterPort->name;
        $this->type         = $this->masterPort->type;
        $this->city         = $this->masterPort->city;
        $this->address      = $this->masterPort->address;
        $this->country      = $this->masterPort->country;
        $this->country_code = $this->masterPort->country_code;
        $this->lat          = $this->masterPort->lat;
        $this->lng          = $this->masterPort->lng;
        $this->user_id      = $this->masterPort->user_id;
    }

    public function submit()
    {
        $this->validate();
        if(MasterPort::where("name", $this->name)->where("id", "!=", $this->masterPort->id)->count() > 0) {
            session()->flash("fms_error", "Port with name : {$this->name} exist");
            return;
        }

        $this->masterPort->name         = $this->name;
        $this->masterPort->type         = $this->type;
        $this->masterPort->city         = $this->city;
        $this->masterPort->address      = $this->address;
        $this->masterPort->country      = $this->country;
        $this->masterPort->country_code = $this->country_code;
        $this->masterPort->lat          = $this->lat;
        $this->masterPort->lng          = $this->lng;
        $this->masterPort->user_id      = $this->user_id;

        try {
            $this->masterPort->save();
        } catch (\Throwable $th) {
            info($th->getMessage());
            session()->flash("fms_error", "Failed to Update. Please Try Again");
            return;
        }

        session()->flash("fms_info", "Data has been Updated");
    }

    public function render()
    {
        return view('livewire.form.update-port');
    }
}
