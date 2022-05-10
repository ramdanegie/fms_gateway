<?php

namespace App\Http\Livewire\Form;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ProfileUpdatePassword extends Component
{
    public $user;
    public $old_password;
    public $new_password;
    public $confirm_password;
    protected $rules = [
        'old_password'     => 'required|min:6',
        'new_password'     => 'required|min:6',
        'confirm_password' => 'required',
    ];

    public function submit()
    {
        $this->validate();
        if($this->new_password != $this->confirm_password) {
            session()->flash("fms_error", "Password and Confirmation Password doesnt match");
            return;
        }

        if(!Hash::check($this->old_password, $this->user->password)) {
            session()->flash("fms_error", "Wrong Password");
            return;
        }

        try {
            $this->user->password = Hash::make($this->new_password);
            $this->user->save();
        } catch (\Throwable $th) {
            session()->flash("fms_error", "Update Password Failed");
            return;
        }

        session()->flash("fms_info", "Password Successfully Updated");
        $this->reset();
    }

    public function render()
    {
        return view('livewire.form.profile-update-password');
    }
}
