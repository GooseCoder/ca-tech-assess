<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fund>
 */
class FundFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name().' Investment Fund',
            'start_year' => fake()->year(),
            'fund_manager_id' => FundManagerFactory::new(),
            'aliases' => json_encode(explode(' ', fake()->words(5, true)))
        ];
    }
}
