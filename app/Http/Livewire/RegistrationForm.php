<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rules;

class RegistrationForm extends Component
{
    use WithFileUploads;

    public $name;
    public $pic_name;
    public $company_legality;
    public $file_npwp;
    public $email;
    public $password;
    public $confirm_password;
    protected $rules = [
        'name'             => 'required|max:255',
        'pic_name'         => 'required|max:255',
        'company_legality' => 'required|mimes:pdf,jpg,png,jpeg|max:5120',
        'file_npwp'        => 'required|mimes:pdf,jpg,png,jpeg|max:5120',
        'email'            => 'required|max:255|email|unique:users',
        'password'         => 'required|min:6',
        'confirm_password' => 'required',
    ];

    public function submit()
    {
        $this->validate();

        DB::beginTransaction();
        try {
            $user                = new User();
            $user->name          = $this->name;
            $user->pic_name      = $this->pic_name;
            $user->file_legality = $this->company_legality->store("legality", "public");
            $user->file_npwp     = $this->file_npwp->store("npwp", "public");
            $user->email         = $this->email;
            $user->password      = Hash::make($this->password);
            $user->save();
        } catch (\Throwable $th) {
            //throw $th;
            info($th->getMessage());
            DB::rollBack();
            session()->flash("fms_error", "Pendaftaran gagal");
            return;
        }

        DB::commit();
        session()->flash("fms_info", "Pendaftaran berhasil");
        $this->reset();
    }

    public function render()
    {
        return view('livewire.registration-form');
    }
}
