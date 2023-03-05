<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Discount>
 */
class DiscountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = fake()->randomElement(['percentage', 'fixed']);
        $value = fake()->randomFloat(2, 1, 100);
        $maxUses = fake()->numberBetween(0, 100);
        $startDate = fake()->dateTimeBetween('-1 month', 'now');
        $endDate = fake()->optional()->dateTimeBetween($startDate, '+1 month');

        return [
            'code' => fake()->unique()->text(10),
            'type' => $type,
            'value' => $value,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'max_uses' => $maxUses,
            'uses' => fake()->numberBetween(0, $maxUses),
        ];
    }
}
