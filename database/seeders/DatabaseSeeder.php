<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Cargo::factory(5)->create(["user_id" => 1]);
        \App\Models\Location::factory(5)->create(["user_id" => 1]);

        $this->call([
            TeamSeeder::class,
            UserSeeder::class,
            ContainerTypeSeeder::class,
            ContainerSizeSeeder::class,
            RoleSeeder::class,
            MasterPortSeeder::class,
            ConsigneeSeeder::class,
            ShipperSeeder::class,
            DepotSeeder::class,
        ]);
    }
}
