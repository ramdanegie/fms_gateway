<?php

namespace Database\Seeders;

use App\Models\Shipper;
use Illuminate\Database\Seeder;

class ShipperSeeder extends Seeder
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
                "shipper_name" => "SITC Indonesia",
                "country" => "Indonesia",
                "city" => "Jakarta",
                "address" => "Jln serayu",
                "pic_name" => "PT Djarum",
                "pic_phone" => "021 4657433",
                "email" => "mail@emal.om",
                "remark" => "-",
            ],
            [
                "user_id" => "1",
                "shipper_name" => "SOFAST SHL",
                "country" => "Indonesia",
                "city" => "Surabaya",
                "address" => "Jln salakaso",
                "pic_name" => "Gang Naam",
                "pic_phone" => "021 58689493",
                "email" => "email@mailer.com",
                "remark" => "-",
            ],
        ];

        foreach ($list as $item) {
            $model = new Shipper();
            foreach ($item as $key => $value) {
                $model->$key = $value;
            }

            $model->saveOrFail();
        }
    }
}
