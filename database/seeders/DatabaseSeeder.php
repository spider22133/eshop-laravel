<?php

namespace Database\Seeders;

use App\Models\Image;
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


        \App\Models\Product::factory(100)->create()
            ->each(function ($product) {
                for ($i = 1; $i <= rand(2, 4); $i++) {
                    \App\Models\ProductAttribute::factory()->create([
                        'product_id' => $product->id,
                        'article_number' => $product->article_number . "-" . $i,
                        'price' => rand(1000, 99999),
                        'description' => $product->description,
                        'description_short' => $product->description_short
                    ]);
                }
            });

        \App\Models\Image::factory(\App\Models\ProductAttribute::count())->create()
            ->each(function ($image) {
                DB::table("product_attribute_images")->insert([
                    'product_attribute_id' => $image->id,
                    'image_id' => $image->id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            });


        $this->call([
            AttributeGroupSeeder::class,
            AttributeSeeder::class,
            AdminSeeder::class
        ]);
    }
}
