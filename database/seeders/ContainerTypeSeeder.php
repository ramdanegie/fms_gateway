<?php

namespace Database\Seeders;

use App\Models\TypeContainer;
use Illuminate\Database\Seeder;

class ContainerTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [
            ["GP", "General Purpose"],
            ["HC", "High Cube"],
        ];

        foreach ($list as $v) {
            $model = new TypeContainer();
            $model->title = $v[0];
            $model->description = $v[1];
            $model->saveOrFail();
        }
    }
}
