<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'article_number' => $this->faker->unique()->swiftBicNumber,
            'manufacturer_id' => random_int(1,5),
            'description' => $this->faker->realText(),
            'description_short' => $this->faker->realText(100),
            'name' => $this->faker->unique()->words(random_int(2,3), true)
        ];
    }
}
