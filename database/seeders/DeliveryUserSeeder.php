<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Wallet;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create delivery user
        $delivery = User::create([
            'name' => 'Peter Mpangani',
            'email' => 'peter@gmail.com',
            'password' => Hash::make('Password123'),
            'role' => 'livreur',
            'email_verified_at' => now(),
        ]);

        // Create wallet for delivery user
        Wallet::create([
            'user_id' => $delivery->id,
            'balance' => 0,
            'currency' => 'XAF',
            'is_active' => true,
        ]);

        $this->command->info('Delivery user created successfully!');
    }
}
