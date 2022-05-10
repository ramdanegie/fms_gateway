<?php

namespace App\Http\Livewire\Form;

use App\Models\Shipper;
use Livewire\Component;

class CreateShipper extends Component
{
    public $user_id;
    public $shipper_name;
    public $country;
    public $city;
    public $address;
    public $pic_name;
    public $pic_phone;
    public $remark;
    public $email;

    protected $rules = [
        'shipper_name' => 'required|min:4',
        'country'      => 'required',
        'city'         => 'required',
        'address'      => 'required',
        'pic_name'     => 'required',
        'pic_phone'    => 'required',
        'remark'       => 'required',
        'email'        => 'required',
    ];

    public function submit()
    {
        $this->validate();
        if (Shipper::where("shipper_name", $this->shipper_name)->count() > 0) {
            session()->flash("fms_error", "Shipper with name : {$this->shipper_name} is already exist");
            return;
        }

        $model               = new Shipper();
        $model->shipper_name = $this->shipper_name;
        $model->country      = $this->country;
        $model->city         = $this->city;
        $model->address      = $this->address;
        $model->pic_name     = $this->pic_name;
        $model->pic_phone    = $this->pic_phone;
        $model->remark       = $this->remark;
        $model->email        = $this->email;
        $model->user_id      = request()->user()->id;

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
        return view('livewire.form.create-shipper');
    }
}
