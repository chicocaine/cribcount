<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Adjustable>
 */
class AdjustableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'initial_term' => fake()->numberBetween(1, 30),
            'initial_rate' => fake()->randomFloat(2, 1, 10),
            'margin' => fake()->randomFloat(2, 1, 10),
            'periodic_cap' => fake()->randomFloat(2, 1, 10),
            'lifetime_cap' => fake()->randomFloat(2, 1, 10),
            'interest_only_period' => fake()->numberBetween(1, 10),
        ];
    }
}
