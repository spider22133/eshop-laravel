<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
     public $arr_ids = [];
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
            AttributeSeeder::class
        ]);

        \App\Models\Product::factory(100)->create()
            ->each(function ($product) {
                for ($i = 1; $i <= rand(2, 4); $i++) {
                    \App\Models\ProductAttribute::factory()->create([
                        'product_id' => $product->id,
                        'article_number' => $product->article_number . "-" . $i,
                        'price' => rand(1000, 99999),
                        'description' => $product->description,
                        'description_short' => $product->description_short
                    ])
                    ->each(function($prd_atr) {

                        if(in_array($prd_atr->id, $this->arr_ids)) return;
                        $this->arr_ids[] = $prd_atr->id;

                        $size_ids = DB::table('attributes')->where('id_attribute_group','1')->pluck('id');

                        $size_ids = range(1,11);
                        $color_ids = range(12,17);
                        shuffle($size_ids);
                        shuffle($color_ids);
                        $size_connections = array_slice($size_ids, 0, rand(1,11));
                        $color_connections = array_slice($color_ids, 0, rand(1,3));
                        // dd($connections); die;

                        foreach($size_connections as $value) {
                            DB::table("product_attribute_combination")->insert([
                                'attribute_id' => $value,
                                'product_attribute_id' =>  $prd_atr->id,
                                'created_at' => now(),
                                'updated_at' => now()
                            ]);
                        }
                        foreach($color_connections as $value) {
                            DB::table("product_attribute_combination")->insert([
                                'attribute_id' => $value,
                                'product_attribute_id' =>  $prd_atr->id,
                                'created_at' => now(),
                                'updated_at' => now()
                            ]);
                        }
                    });
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




        /*->each(function ($product_attribute) {
                         $count = \App\Models\Attribute::count();
                         $attr_ids = range(1, $count);
                         shuffle($attr_ids);

                         $connections = array_slice($attr_ids, 0, rand(0, $count));
                         foreach ($connections as $value) {
                             DB::table("product_attribute_combination")->insert([
                                 'product_attribute_id' => $product_attribute->id,
                                 'attribute_id' => $value,
                                 'created_at' => now(),
                                 'updated_at' => now()
                             ]);
                         }
                     });*/
    }
}
