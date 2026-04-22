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
        // ADMIN USER (Orion Star)
        // ===========================================
        User::updateOrCreate(
            ['email' => 'admin@orionstar.vip'],
            [
                'name' => 'Orion Star Admin',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'phone' => '(555) 123-4567',
                'avatar_url' => null,
                'performance_score' => 100,
                'email_verified_at' => now(),
                'facebook' => 'https://facebook.com/orionstars',
                'whatsapp' => '+1234567890',
                'telegram' => 'orionstars_admin',
                'description' => 'Official administration account for Orion Star VIP platform.',
                'footer_description' => 'Orion Stars is a leading online gaming platform offering the best fish games, slots, and sweepstakes for players across the US. Join thousands of players and experience the thrill of real-time gaming with secure access and fast rewards.',
            ]
        );
    }
}
