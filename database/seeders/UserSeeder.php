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
        // ADMIN USER (Panda Master)
        // ===========================================
        User::updateOrCreate(
            ['email' => 'admin@pandamaster777.xyz'],
            [
                'name' => 'Panda Master Admin',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'phone' => '(555) 123-4567',
                'avatar_url' => null,
                'performance_score' => 100,
                'email_verified_at' => now(),
                'facebook' => 'https://facebook.com/pandamasters',
                'whatsapp' => '+1234567890',
                'telegram' => 'pandamasters_admin',
                'description' => 'Official administration account for Panda Master VIP platform.',
                'footer_description' => 'Panda Master is a leading online gaming platform offering the best fish games, slots, and sweepstakes for players across the US. Join thousands of players and experience the thrill of real-time gaming with secure access and fast rewards.',
            ]
        );

        // ===========================================
        // AGENT USER
        // ===========================================
        User::updateOrCreate(
            ['email' => 'agent@pandamaster.vip'],
            [
                'name' => 'Panda Master Agent',
                'password' => Hash::make('password'),
                'role' => 'agent',
                'phone' => '(555) 987-6543',
                'city' => 'New York',
                'performance_score' => 85,
                'email_verified_at' => now(),
                'description' => 'Certified agent for Panda Master VIP platform.',
            ]
        );

        // ===========================================
        // REGULAR USER
        // ===========================================
        User::updateOrCreate(
            ['email' => 'user@example.com'],
            [
                'name' => 'Regular Player',
                'password' => Hash::make('password'),
                'role' => 'user',
                'phone' => '(555) 000-1111',
                'city' => 'Los Angeles',
                'email_verified_at' => now(),
            ]
        );
    }
}
