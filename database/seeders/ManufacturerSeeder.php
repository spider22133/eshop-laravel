<?php

namespace Database\Seeders;

use App\Models\Manufacturer;
use Illuminate\Database\Seeder;

class ManufacturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manufacturers_data = [
            ['name' => 'Abus'],
            ['name' => 'Alpina'],
            ['name' => 'Bell'],
            ['name' => 'Endura'],
            ['name' => 'Giro']
        ];

        Manufacturer::insert($manufacturers_data);
    }
}
