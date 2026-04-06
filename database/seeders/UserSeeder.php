<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Creates default users for testing and demonstration:
     * - 1 Admin user
     */
    public function run(): void
    {
        // ===========================================
        // ADMIN USER
        // ===========================================
        User::firstOrCreate(
            ['email' => 'admin@orionstar.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'phone' => '(555) 000-0001',
                'avatar_url' => null,
                'performance_score' => 100,
                'email_verified_at' => now(),
            ]
        );
    }
}
