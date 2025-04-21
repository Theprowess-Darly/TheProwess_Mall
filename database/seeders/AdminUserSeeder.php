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
        // Create admin user
        $admin = User::create([
            'name' => 'DARLY DIANGHA',
            'email' => 'mrsdianghadg@gmail.com',
            'password' => Hash::make('Password321'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        // Create wallet for admin
        Wallet::create([
            'user_id' => $admin->id,
            'balance' => 0,
            'currency' => 'XAF',
            'is_active' => true,
        ]);

        $this->command->info('Admin user created successfully!');
    }
}
