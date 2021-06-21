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
        foreach ($manufacturers_data as $item) {
            $manufacturer = new Manufacturer([
                'name' => $item['name']
            ]);

            $manufacturer->save();
        }
    }
}
