<?php

namespace Database\Seeders;

use App\Models\AttributeGroup;
use Illuminate\Database\Seeder;

class AttributeGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attributes = array(
            array('is_color_group' => 0, 'group_type' => 'select','name' => 'Size'),
            array('is_color_group' => 1,'group_type' => 'color','name' => 'Color'),
            array('is_color_group' => 0,'group_type' => 'select','name' => 'Material'),
        );

        foreach ($attributes as $attribute) {
                $attr = new AttributeGroup(
                    [
                        'is_color_group' =>$attribute['is_color_group'],
                        'group_type' =>$attribute['group_type'],
                        'name' => $attribute['name']
                    ]
                );
                $attr->save();
        }
    }
}
