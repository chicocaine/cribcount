<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mortgage>
 */
class MortgageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'home_price' => fake()->randomFloat(4, 100000, 1000000),
            'down_payment' => fake()->randomFloat(4, 10000, 100000),
            'loan_type' => fake()->randomElement(['fixed', 'adjustable']),
            'interest_rate' => fake()->randomFloat(2, 1, 10),
            'loan_term' => fake()->numberBetween(1, 30),
            'monthly_property_tax' => fake()->randomFloat(4, 100, 1000),
            'monthly_home_insurance' => fake()->randomFloat(4, 100, 1000),
            'monthly_hoa' => fake()->randomFloat(4, 100, 1000),
        ];
    }
}
