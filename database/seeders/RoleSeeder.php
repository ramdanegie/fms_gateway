<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Team;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $team_cde = "REG";
        $team = Team::where("code", $team_cde)->first();

        foreach (config("menus") as $menu) {
            $model           = new Role();
            $model->team_id  = $team->id;
            $model->tcode    = $menu['key'];
            $model->can_view = 1;
            $model->saveOrFail();

            if(isset($menu['childs'])) {
                foreach ($menu['childs'] as $child) {
                    $model           = new Role();
                    $model->team_id  = $team->id;
                    $model->tcode    = $child['key'];
                    $model->can_view = 1;
                    $model->saveOrFail();
                }                
            }
        }
    }
}
