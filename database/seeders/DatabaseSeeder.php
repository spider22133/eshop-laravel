<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Manufacturer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {
        \App\Models\User::factory(10)->create();

        $this->call([
            AdminSeeder::class,
            AttributeGroupSeeder::class,
            AttributeSeeder::class,
            ManufacturerSeeder::class,
            ProductSeeder::class,
            ImageSeeder::class
        ]);
    }
}
