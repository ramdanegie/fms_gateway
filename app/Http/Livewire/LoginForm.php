<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class LoginForm extends Component
{
    public $email;
    public $password;
    protected $rules = [
        'password' => 'required',
        'email' => 'required|email',
    ];

    public function submit()
    {
        $this->validate();

        $user = User::whereEmail($this->email)->first();
        if(empty($user)) {
            session()->flash('fms_error', 'Pengguna tidak ditemukan');
            return back();
        }

        if(!Hash::check($this->password, $user->password)) {
            session()->flash('fms_error', 'Email atau kata sandi salah');
            return back();
        }

        Auth::loginUsingId($user->id, true);
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function render()
    {
        return view('livewire.login-form');
    }
}
