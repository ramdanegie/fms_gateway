<?php

namespace App\Http\Livewire\Form;

use App\Models\NotifiParty;
use Livewire\Component;

class CreateNotifiParty extends Component
{
    public $user_id;
    public $notifi_party;
    public $country;
    public $city;
    public $address;
    public $pic_name;
    public $pic_phone;
    public $remark;
    public $email;

    protected $rules = [
        'notifi_party' => 'required|min:4',
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
        if (NotifiParty::where("notifi_party", $this->notifi_party)->count() > 0) {
            session()->flash("fms_error", "notifi_party : {$this->notifi_party} is already exist");
            return;
        }

        $model               = new NotifiParty();
        $model->notifi_party = $this->notifi_party;
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
        return view('livewire.form.create-notifi-party');
    }
}
