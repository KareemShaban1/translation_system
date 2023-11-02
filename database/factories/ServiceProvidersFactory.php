<?php

namespace Database\Factories;

use App\Models\ExpenseType;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ServiceProvidersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name' => fake()->name,
            'phone_number' => fake()->phoneNumber,
            'another_phone_number' => fake()->phoneNumber,
            'address' => fake()->address,
            'email' => fake()->unique()->safeEmail(),
            'expense_type_id' => ExpenseType::inRandomOrder()->first()->id,

        ];
    }
}