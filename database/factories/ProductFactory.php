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
    public function definition(): array
    {
        return [
            'shop_id' => fake()->numberBetween(1, 1_000),
            'name' => fake()->word(),
            'slug' => fake()->slug(),
            'image' => fake()->imageUrl(),
            'description' => fake()->paragraph(),
            'price' => fake()->numberBetween(10, 10_000),
            'is_pinned' => fake()->boolean(),
        ];
    }
}
