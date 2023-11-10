<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'client_id' => fake()->numberBetween(1,50),
            'type' => fake()->randomElement(['savings','current','checking','time deposit']),
            'initial_deposit' => fake()->numberBetween(2000,10000),
            'status' => fake()->randomElement(['active','active','active','active','dormant'])
        ];
    }
}
