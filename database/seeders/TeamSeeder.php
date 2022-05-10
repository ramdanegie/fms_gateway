<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teams = [
            [
                "code" => "ADM",
                "title" => "Admin"
            ],
            [
                "code" => "REG",
                "title" => "Regular"
            ],
        ];

        foreach ($teams as $team) {
            $model        = new Team();
            $model->code  = $team['code'];
            $model->title = $team['title'];
            $model->save();
        }
    }
}
