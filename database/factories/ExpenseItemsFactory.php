<?php

namespace Database\Factories;

use App\Models\ExpenseType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ExpenseItemsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'expense_name' => fake()->word,
            'expense_type_id' => ExpenseType::inRandomOrder()->first()->id,
            'recipient' => fake()->randomElement(['client', 'service_provider', 'user']),
        ];
    }
}