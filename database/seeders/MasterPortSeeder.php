<?php

namespace Database\Seeders;

use App\Models\MasterPort;
use Illuminate\Database\Seeder;

class MasterPortSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [
            ["Port Klang", "Malaysia", "MY", "Malaysia"],
            ["Port of Tanjung Priok", "Indonesia", "ID", "Jakarta"],
        ];

        foreach ($list as $key => $value) {
            $model = new MasterPort();
            $model->user_id = 1;
            $model->name = $value[0];
            $model->type = "SEA";
            $model->country = $value[1];
            $model->country_code = $value[1];
            $model->city = $value[2];
            $model->address = $value[0];
            $model->lat = "0";
            $model->lng = "0";

            $model->saveOrFail();
        }
    }
}
