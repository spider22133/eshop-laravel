<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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


         \App\Models\Product::factory(10)->create()
             ->each(function ($product){

                 \App\Models\ProductAttribute::factory(rand(2,4))->create([
                     'product_id' => $product->id,
                     'article_number' => $product->article_number,
                     'description' => $product->description,
                     'description_short' => $product->description_short
                 ]);

             });

        $this->call([
            AttributeSeeder::class,
            AdminSeeder::class
        ]);
    }
}
