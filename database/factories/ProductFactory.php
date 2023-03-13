<?php

namespace Database\Factories;

use App\Models\Tag;
use App\Models\Category;
use App\Models\Discount;
use Illuminate\Support\Str;
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
        $category   = Category::inRandomOrder()->first();
        $discount   = Discount::inRandomOrder()->first();
        $tag          = Tag::inRandomOrder()->first();
        $rand        = fake()->numberBetween(15, 90);
        $images     = json_encode(
            [
                ['url' => "https://picsum.photos/id/$rand/720", 'alt' => fake()->sentence()],
                ['url' => "https://picsum.photos/id/$rand/720", 'alt' => fake()->sentence()],
                ['url' => "https://picsum.photos/id/$rand/720", 'alt' => fake()->sentence()],
                ['url' => "https://picsum.photos/id/$rand/720", 'alt' => fake()->sentence()],
                ['url' => "https://picsum.photos/id/$rand/720", 'alt' => fake()->sentence()],
                ['url' => fake()->imageUrl(), 'alt' => fake()->sentence()],
                ['url' => fake()->imageUrl(), 'alt' => fake()->sentence()],
                ['url' => "https://picsum.photos/id/$rand/720", 'alt' => fake()->sentence()],
                ['url' => "https://picsum.photos/id/$rand/720", 'alt' => fake()->sentence()],
            ]
        );
        return [
            'uuid' => Str::uuid(),
            'category_id'   => $category->id,
            'discount_id'   => $discount->id,
            'tag_id'          => $tag->id,
            'name'           => fake()->sentence(3),
            'slug'             => fake()->unique()->slug(3),
            'amount'        => fake()->randomFloat(2, 10, 1000),
            'quantity'       => fake()->randomDigit(),
            'description'   => fake()->paragraph(),
            'images'        => $images,
            'height'         => fake()->numberBetween(1, 100),
            'width'          => fake()->numberBetween(1, 100),
            'length'         => fake()->numberBetween(1, 100),
            'weight'         => fake()->numberBetween(1, 1000),
            'meta_title'    => fake()->sentence(6),
            'meta_description' => fake()->sentence(10),
            'meta_keywords' => null,
        ];
    }
}
