<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->words(3, true),
            'description' => fake()->paragraph(),
            'image' => fake()->imageUrl(640, 480),
            'price' => fake()->randomFloat(2, 10, 1000),
            'stock' => fake()->numberBetween(0, 100),
            'category' => fake()->randomElement(['Electronics', 'Fashion', 'Home', 'Books', 'Sports']),
            'status' => fake()->randomElement(['active', 'inactive']),
        ];
    }
}
