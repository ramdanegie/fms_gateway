<?php

namespace App\Helper;

use App\Models\Role;
use App\Models\Team;

class Menus
{
    public $avail_menus = [];
    public function __construct(Team $team)
    {
        $roles = Role::where("team_id", $team->id)->get();
        foreach ($roles as $role) {
            if ($role->can_view == 0) {
                continue;
            }

            $this->avail_menus[$role->tcode] = [
                "can_view"   => $role->can_view,
                "can_create" => $role->can_create,
                "can_edit"   => $role->can_edit,
                "can_delete" => $role->can_delete,
            ];
        }
    }

    public static function getRoleForTeam(Team $team)
    {
        if($team->code == "ADM") {
            return config("admin-menus");
        }

        $output = [];
        $self = new self($team);
        foreach (config("menus") as $menu) {
            if(!isset($self->avail_menus[$menu['key']])){
                continue;
            }

            if(isset($menu['childs']) && !empty($menu['childs'])) {
                foreach ($menu['childs'] as $i => $child) {
                    if(isset($self->avail_menus[$child['key']])){
                        continue;
                    }

                    unset($menu['childs'][$i]);
                }
            }

            array_push($output, $menu);
        }

        return $output;
    }
}
