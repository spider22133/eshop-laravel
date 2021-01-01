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
            array('group_type' => 'select','name' => 'Size'),
            array('group_type' => 'color','name' => 'Color'),
            array('group_type' => 'select','name' => 'Material'),
        );

        foreach ($attributes as $attribute) {
                $attr = new AttributeGroup(
                    [
                        'group_type' =>$attribute['group_type'],
                        'name' => $attribute['name']
                    ]
                );
                $attr->save();
        }
    }
}
