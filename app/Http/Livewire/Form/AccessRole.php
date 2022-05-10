<?php

namespace App\Http\Livewire\Form;

use App\Models\Role;
use Livewire\Component;

class AccessRole extends Component
{
    public $tcode;
    public $team;
    public $can_create;
    public $can_edit;
    public $can_delete;
    public $can_view;

    public function setCanView()
    {
        $role = Role::where([["team_id", $this->team->id], ["tcode", $this->tcode]])->first();
        if (empty($role)) {
            $role = new Role();
            $role->team_id = $this->team->id;
            $role->tcode = $this->tcode;
        }

        $role->can_view = $this->can_view;
        $role->save();
    }

    public function setCanCreate()
    {
        $role = Role::where([["team_id", $this->team->id], ["tcode", $this->tcode]])->first();
        if (empty($role)) {
            $role = new Role();
            $role->team_id = $this->team->id;
            $role->tcode = $this->tcode;
        }

        $role->can_create = $this->can_create;
        $role->save();
    }

    public function setCanEdit()
    {
        $role = Role::where([["team_id", $this->team->id], ["tcode", $this->tcode]])->first();
        if (empty($role)) {
            $role = new Role();
            $role->team_id = $this->team->id;
            $role->tcode = $this->tcode;
        }

        $role->can_edit = $this->can_edit;
        $role->save();
    }

    public function setCanDelete()
    {
        $role = Role::where([["team_id", $this->team->id], ["tcode", $this->tcode]])->first();
        if (empty($role)) {
            $role = new Role();
            $role->team_id = $this->team->id;
            $role->tcode = $this->tcode;
        }

        $role->can_delete = $this->can_delete;
        $role->save();
    }

    public function mount()
    {
        $role = Role::where([["team_id", $this->team->id], ["tcode", $this->tcode]])->first();
        if(!empty($role)) {
            $this->can_create = $role->can_create;
            $this->can_edit = $role->can_edit;
            $this->can_delete = $role->can_delete;
            $this->can_view = $role->can_view;
        }
    }

    public function render()
    {
        return view('livewire.form.access-role', [
            "team" => $this->team
        ]);
    }
}
