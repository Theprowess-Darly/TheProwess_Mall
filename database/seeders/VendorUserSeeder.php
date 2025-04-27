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
        // Create vendor user
        $vendor = User::create([
            'name' => 'Anabelle Blanche',
            'email' => 'anabelle@gmail.com',
            'password' => Hash::make('Password123'),
            'role' => 'marchand',
            'email_verified_at' => now(),
        ]);

        // Create wallet for vendor
        Wallet::create([
            'user_id' => $vendor->id,
            'balance' => 0,
            'currency' => 'XAF',
            'is_active' => true,
        ]);

        $this->command->info('Vendor user created successfully!');
    }
}
