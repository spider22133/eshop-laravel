<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\Image::factory(\App\Models\ProductAttribute::count())->create()
            ->each(function ($image) {
                DB::table("product_attribute_images")->insert([
                    'product_attribute_id' => $image->id,
                    'image_id' => $image->id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            });
    }
}
