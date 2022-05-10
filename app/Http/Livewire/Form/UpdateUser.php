<?php

namespace App\Http\Livewire\Form;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateUser extends Component
{
    use WithFileUploads;

    public $user;
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
        'name'     => 'required|max:255',
        'pic_name' => 'required|max:255',
        'email'    => 'required|max:255|email',
        'npwp'     => 'required',
        'nib'      => 'required',
    ];

    public function mount()
    {
        $this->name     = $this->user->name;
        $this->pic_name = $this->user->pic_name;
        $this->email    = $this->user->email;
        $this->npwp     = $this->user->npwp;
        $this->nib      = $this->user->nib;
    }

    public function submit()
    {
        $this->validate();

        DB::beginTransaction();
        try {
            $this->user->name     = $this->name;
            $this->user->pic_name = $this->pic_name;
            $this->user->email    = $this->email;
            $this->user->npwp     = $this->npwp;
            $this->user->nib      = $this->nib;

            if(!empty($this->password)) {
                $this->user->password = Hash::make($this->password);
            }

            if(!empty($this->file_legality)) {
                $this->user->file_legality = $this->file_legality->store("legality", "public");
            }

            if(!empty($this->file_npwp)) {
                $this->user->file_npwp = $this->file_npwp->store("npwp", "public");
            }

            $this->user->save();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            session()->flash("fms_error", "Failed to Update. Please Try Again");
            return;
        }

        DB::commit();
        session()->flash("fms_info", "User has been Updated");
    }

    public function render()
    {
        return view('livewire.form.update-user');
    }
}
