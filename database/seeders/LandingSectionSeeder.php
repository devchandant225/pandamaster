<?php

namespace Database\Seeders;

use App\Models\LandingSection;
use Illuminate\Database\Seeder;

class LandingSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hero Section
        LandingSection::updateOrCreate(
            ['section_key' => 'hero'],
            [
                'title' => 'Panda Master VIP',
                'subtitle' => 'The Ultimate Fish Game & Online Casino Platform',
                'description' => 'Experience the thrill of Panda Master VIP. Play 30+ premium games, including top fish games, slots, and arcade favorites. Download the app today and start winning real cash!',
                'badge_text' => '🐼 Panda Master Official VIP',
                'cta_primary_text' => '🎰 Play Online Now',
                'cta_primary_url' => '/play-online',
                'cta_secondary_text' => 'Download APK',
                'cta_secondary_url' => '/download',
                'background_type' => 'gradient',
                'animation_type' => 'stars',
                'stats' => [
                    ['value' => '30+', 'label' => 'Exclusive Games'],
                    ['value' => '100%', 'label' => 'Secure Payouts'],
                    ['value' => '24/7', 'label' => 'VIP Support'],
                ],
                'is_active' => true,
                'sort_order' => 1,
            ]
        );
    }
}
