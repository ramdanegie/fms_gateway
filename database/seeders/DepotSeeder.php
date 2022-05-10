<?php

namespace Database\Seeders;

use App\Models\Depot;
use Illuminate\Database\Seeder;

class DepotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [
            [
                "user_id" => "1",
                "name" => "DEPO SPIL MARUNDA",
                "city" => "Jakarta",
                "address" => "Jln KBN Marunda",
            ],
            [
                "user_id" => "1",
                "name" => "DEPO UCLA MARUNDA",
                "city" => "Jakarta",
                "address" => "Jln KBN Marunda",
            ],
        ];

        foreach ($list as $item) {
            $model = new Depot();
            foreach ($item as $key => $value) {
                $model->$key = $value;
            }

            $model->saveOrFail();
        }
    }
}
