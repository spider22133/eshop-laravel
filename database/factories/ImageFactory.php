<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'src' => json_encode([
                'small' => $this->faker->imageUrl(480,640,'480x640', false, null, true),
                'medium' => $this->faker->imageUrl(768,1024,'768x1024', false, null, true),
                'full' => $this->faker->imageUrl(1080,1920,'1080x1920', false, null, true),
                'thumb'=> $this->faker->imageUrl(100,100,'100x100', false, null, true),
            ])
        ];
    }
}
