<?php

namespace Database\Seeders;

use App\Models\Attribute;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attributes = [
            ['id_attribute_group' => '1', 'color' => '', 'name' => '36.0'],
            ['id_attribute_group' => '1', 'color' => '', 'name' => '37.0'],
            ['id_attribute_group' => '1', 'color' => '', 'name' => '38.0'],
            ['id_attribute_group' => '1', 'color' => '', 'name' => '39.0'],
            ['id_attribute_group' => '1', 'color' => '', 'name' => '40.0'],
            ['id_attribute_group' => '1', 'color' => '', 'name' => '41.0'],
            ['id_attribute_group' => '1', 'color' => '', 'name' => '42.0'],
            ['id_attribute_group' => '1', 'color' => '', 'name' => '43.0'],
            ['id_attribute_group' => '1', 'color' => '', 'name' => '44.0'],
            ['id_attribute_group' => '1', 'color' => '', 'name' => '45.0'],
            ['id_attribute_group' => '1', 'color' => '', 'name' => '46.0'],
            ['id_attribute_group' => '2', 'color' => '#FFFFFF', 'name' => 'weiß'],
            ['id_attribute_group' => '2', 'color' => '#000000', 'name' => 'schwarz'],
            ['id_attribute_group' => '2', 'color' => '#808080', 'name' => 'grau'],
            ['id_attribute_group' => '2', 'color' => '#666666', 'name' => 'hellgrau'],
            ['id_attribute_group' => '2', 'color' => '#0000FF', 'name' => 'blau'],
            ['id_attribute_group' => '2', 'color' => '#334455', 'name' => 'marine'],
            ['id_attribute_group' => '3', 'color' => '', 'name' => 'Kunststoff'],
            ['id_attribute_group' => '3', 'color' => '', 'name' => 'Textil']
        ];

        Attribute::insert($attributes);
    }
}
