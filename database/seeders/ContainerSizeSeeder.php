<?php

namespace Database\Seeders;

use App\Models\SizeContainer;
use Illuminate\Database\Seeder;

class ContainerSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [
            [20, "20ft"],
            [40, "40ft"],
            [45, "45ft"],
        ];

        foreach ($list as $v) {
            $model          = new SizeContainer();
            $model->value   = $v[0];
            $model->display = $v[1];
            $model->saveOrFail();
        }
    }
}
