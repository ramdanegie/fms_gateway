<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                "email"    => "fms-testing@gmail.com",
                "name"     => "FMS Testing",
                "team_id"  => "2",
                "password" => Hash::make("udanup123"),
            ],
            [
                "email"    => "fms-admin@gmail.com",
                "name"     => "FMS Testing",
                "team_id"  => "1",
                "password" => Hash::make("udanup123"),
            ],
        ];

        foreach ($users as $i => $user) {
            $model           = new User();
            $model->name     = $user['name'];
            $model->pic_name = $user['name'];
            $model->email    = $user['email'];
            $model->password = $user['password'];
            $model->team_id  = $user['team_id'];

            $model->save();
        }
    }
}
