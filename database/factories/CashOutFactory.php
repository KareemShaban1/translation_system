<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Service;
use App\Models\ServiceProviders;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CashOut>
 */
class CashOutFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $expense = fake()->randomElement(['rent', 'salary']);
        $recipient = fake()->randomElement(['client', 'service_provider', 'user']);
    
        return [
            'receipt_number' => fake()->unique()->randomNumber(),
            'date' => fake()->date,
            'expense' => $expense,
            'recipient' => $recipient,
            'service_id' => Service::inRandomOrder()->first()->id,
            'service_provider_id' => $recipient === 'service_provider' ? ServiceProviders::inRandomOrder()->first()->id : null,
            'client_id' => $recipient === 'client' ? Client::inRandomOrder()->first()->id : null,
            'user_id' => $recipient === 'user' ? User::inRandomOrder()->first()->id : null,
        ];
    }
}