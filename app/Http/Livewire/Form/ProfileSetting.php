<?php

namespace App\Http\Livewire\Form;

use Livewire\Component;
use Livewire\WithFileUploads;

class ProfileSetting extends Component
{
    use WithFileUploads;

    public $user;
    public $name;
    public $last_name;
    public $email;
    public $phone;
    public $npwp;
    public $nib;
    public $file_npwp;
    public $file_legality;
    public $o_file_npwp;
    public $o_file_legality;
    public $address;
    protected $rules = [
        'name'      => 'required|max:255',
        'last_name' => 'required|max:255',
        'email'     => 'required|max:255',
        'phone'     => 'required',
        'npwp'      => 'required',
        'nib'       => 'required',
        'address'   => 'required',
    ];

    public function mount()
    {
        $this->name            = $this->user->name;
        $this->last_name       = $this->user->last_name;
        $this->email           = $this->user->email;
        $this->phone           = $this->user->phone;
        $this->npwp            = $this->user->npwp;
        $this->nib             = $this->user->nib;
        $this->address         = $this->user->address;

        if(!empty($this->user->file_npwp)) {
            $this->o_file_npwp = asset("files/{$this->user->file_npwp}");
        }

        if(!empty($this->user->file_legality)) {
            $this->o_file_legality = asset("files/{$this->user->file_legality}");
        }
    }

    public function submit()
    {
        $this->validate();

        $this->user->name      = $this->name;
        $this->user->last_name = $this->last_name;
        $this->user->email     = $this->email;
        $this->user->phone     = $this->phone;
        $this->user->npwp      = $this->npwp;
        $this->user->nib       = $this->nib;
        $this->user->address   = $this->address;

        if (!empty($this->file_legality)) {
            $this->user->file_legality = $this->file_legality->store("legality", "public");
        }

        if (!empty($this->file_npwp)) {
            $this->user->file_npwp = $this->file_npwp->store("npwp", "public");
        }

        try {
            $this->user->save();
            $this->o_file_npwp = asset("files/{$this->user->file_npwp}");
            $this->o_file_legality = asset("files/{$this->user->file_legality}");
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash("fms_error", "Failed to Save. Please Try Again");
            return;
        }

        session()->flash("fms_info", "Profile Successfully Updated");
    }

    public function render()
    {
        return view('livewire.form.profile-setting');
    }
}
