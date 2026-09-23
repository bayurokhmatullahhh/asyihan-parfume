<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@asyihan.id'],
            [
                'name' => 'Master Asyihan Admin',
                'role' => 'admin',
                'phone' => '081234567890',
                'password' => Hash::make('admin123'),
                'email_verified_at' => now(),
            ]
        );

        // Also create a sample regular customer user for testing
        User::updateOrCreate(
            ['email' => 'customer@asyihan.id'],
            [
                'name' => 'Raden Mas Arya',
                'role' => 'user',
                'phone' => '085712345678',
                'birth_date' => '1995-07-17',
                'address' => 'Jl. Keraton No. 45, Yogyakarta',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
            ]
        );
    }
}
