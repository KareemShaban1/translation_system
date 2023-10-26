<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Service;
use App\Models\ServiceProviders;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReceiveCash>
 */
class ReceiveCashFactory extends Factory
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
            'receipt_number' => fake()->unique()->randomNumber(),
            'date' => fake()->date,
            'service_id' => Service::inRandomOrder()->first()->id,
            'service_provider_id' => ServiceProviders::inRandomOrder()->first()->id,
            'client_id' => Client::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
            'paid_amount' => fake()->randomFloat(2, 10, 1000), // Generate random paid amount between 10 and 1000
        ];
    }
}