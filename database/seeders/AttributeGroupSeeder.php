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
        $groups = [
            ['is_color_group' => 0, 'group_type' => 'select','name' => 'Size'],
            ['is_color_group' => 1,'group_type' => 'color','name' => 'Color'],
            ['is_color_group' => 0,'group_type' => 'select','name' => 'Material'],
        ];

        AttributeGroup::insert($groups);
    }
}
