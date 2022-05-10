<?php

namespace Database\Seeders;

use App\Models\Consignee;
use Illuminate\Database\Seeder;

class ConsigneeSeeder extends Seeder
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
                "consignee_name" => "PT Djarum Indonesia",
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
                "consignee_name" => "PT Gangnam Style",
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
            $model = new Consignee();
            foreach ($item as $key => $value) {
                $model->$key = $value;
            }

            $model->saveOrFail();
        }
    }
}
