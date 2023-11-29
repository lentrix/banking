<?php

namespace Database\Factories;

use App\Models\Account;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $accountsCount = Account::count();

        return [
            'account_id' => fake()->numberBetween(1,$accountsCount),
            'type' => fake()->randomElement(['d','d','d','w']),
            'datetime' => fake()->dateTimeBetween('2022-01-01',now()),
            'source' => fake()->randomElement(['c','c','c','q','q','t'])
        ];
    }
}
