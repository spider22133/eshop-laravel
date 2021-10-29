<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{

    public $arr_ids = [];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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

    }
}
