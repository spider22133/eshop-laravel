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
        $attributes = array(
            array('id_attribute_group' => '1', 'color' => '', 'name' => '36.0'),
            array('id_attribute_group' => '1', 'color' => '', 'name' => '37.0'),
            array('id_attribute_group' => '1', 'color' => '', 'name' => '38.0'),
            array('id_attribute_group' => '1', 'color' => '', 'name' => '39.0'),
            array('id_attribute_group' => '1', 'color' => '', 'name' => '40.0'),
            array('id_attribute_group' => '1', 'color' => '', 'name' => '41.0'),
            array('id_attribute_group' => '1', 'color' => '', 'name' => '42.0'),
            array('id_attribute_group' => '1', 'color' => '', 'name' => '43.0'),
            array('id_attribute_group' => '1', 'color' => '', 'name' => '44.0'),
            array('id_attribute_group' => '1', 'color' => '', 'name' => '45.0'),
            array('id_attribute_group' => '1', 'color' => '', 'name' => '46.0'),
            array('id_attribute_group' => '2', 'color' => '#FFFFFF', 'name' => 'weiß'),
            array('id_attribute_group' => '2', 'color' => '#000000', 'name' => 'schwarz'),
            array('id_attribute_group' => '2', 'color' => '#808080', 'name' => 'grau'),
            array('id_attribute_group' => '2', 'color' => '#666666', 'name' => 'hellgrau'),
            array('id_attribute_group' => '2', 'color' => '#0000FF', 'name' => 'blau'),
            array('id_attribute_group' => '2', 'color' => '#334455', 'name' => 'marine'),
            array('id_attribute_group' => '3', 'color' => '', 'name' => 'Kunststoff'),
            array('id_attribute_group' => '3', 'color' => '', 'name' => 'Textil')
        );

        foreach ($attributes as $attribute) {

            $attr = new Attribute(
                [
                    'id_attribute_group' => $attribute['id_attribute_group'],
                    'color' => $attribute['color'],
                    'name' => $attribute['name']
                ]
            );
            $attr->save();
        }

    }
}
