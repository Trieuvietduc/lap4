<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'price'=>fake()->numberBetween($min = 15000, $max = 60000),
            'thumbnail_url'=>fake()->imageUrl(),
            'status' => rand(0,1)
        ];
    }
}
