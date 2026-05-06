<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Cek jika user admin sudah ada
        if (!User::where('email', 'admin@bukutamu.com')->exists()) {
            User::create([
                'name' => 'Administrator',
                'email' => 'admin@bukutamu.com',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ]);

            $this->command->info('Admin user created successfully!');
            $this->command->info('Email: admin@bukutamu.com');
            $this->command->info('Password: password123');
        } else {
            $this->command->info('Admin user already exists!');
        }
    }
}