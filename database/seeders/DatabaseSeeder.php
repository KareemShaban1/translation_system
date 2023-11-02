<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\CashOut;
use App\Models\Client;
use App\Models\ExpenseItems;
use App\Models\ExpenseType;
use App\Models\ReceiveCash;
use App\Models\Service;
use App\Models\ServiceProviders;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(PermissionTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(LanguagesSeeder::class);


        //    User::factory(10)->create();
        Client::factory(10)->create();
        ExpenseType::factory(10)->create();
        Service::factory(10)->create();
        ServiceProviders::factory(10)->create();
        // $this->call(ServiceSeeder::class);
        //    CashOut::factory(10)->create();
        //    ReceiveCash::factory(10)->create();
        // ExpenseItems::factory(10)->create();


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}