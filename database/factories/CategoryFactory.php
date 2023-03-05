<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'parent_id' => null,
            'name' => fake()->word,
            'slug' => fake()->slug,
            'description' => fake()->sentence,
            'image' => fake()->imageUrl(),
            'is_featured' => fake()->boolean,
            'render_order' => fake()->numberBetween(0, 1000),
        ];
    }
}
