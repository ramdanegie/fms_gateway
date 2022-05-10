<?php

namespace App\Http\Livewire\Form;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateUser extends Component
{
    use WithFileUploads;

    public $name;
    public $pic_name;
    public $file_legality;
    public $file_npwp;
    public $email;
    public $password;
    public $confirm_password;
    public $npwp;
    public $nib;
    protected $rules = [
        'name'             => 'required|max:255',
        'pic_name'         => 'required|max:255',
        'file_legality'    => 'required|image|max:5120',
        'file_npwp'        => 'required|image|max:5120',
        'email'            => 'required|max:255|email|unique:users',
        'password'         => 'required|min:6',
        'confirm_password' => 'required',
        'npwp'             => 'required',
        'nib'              => 'required',
    ];

    public function submit()
    {
        $this->validate();

        if($this->confirm_password !== $this->password)
        {
            session()->flash("fms_error", "Password and Confirmation Password doesnt match");
            return;
        }

        DB::beginTransaction();
        try {
            $user                = new User();
            $user->name          = $this->name;
            $user->pic_name      = $this->pic_name;
            $user->file_legality = $this->file_legality->store("legality", "public");
            $user->file_npwp     = $this->file_npwp->store("npwp", "public");
            $user->email         = $this->email;
            $user->npwp          = $this->npwp;
            $user->nib           = $this->nib;
            $user->password      = Hash::make($this->password);
            $user->save();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            session()->flash("fms_error", "Failed to Save. Please Try Again");
            return;
        }

        DB::commit();
        session()->flash("fms_info", "User has been Registered");
        $this->reset();
    }

    public function render()
    {
        return view('livewire.form.create-user');
    }
}
