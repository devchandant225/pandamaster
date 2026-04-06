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
        LandingSection::firstOrCreate(
            ['section_key' => 'hero'],
            [
                'title' => 'Play Win Repeat',
                'subtitle' => 'Your Premier Online Gaming Destination',
                'description' => 'Discover 100+ premium games with the best odds and biggest wins. Join thousands of players winning big every day!',
                'badge_text' => '🎮 Premium Gaming Experience',
                'cta_primary_text' => '🎰 Start Playing - Get $1000 Bonus',
                'cta_primary_url' => '/register',
                'cta_secondary_text' => 'Browse Games',
                'cta_secondary_url' => '/games',
                'background_type' => 'gradient',
                'animation_type' => 'stars',
                'stats' => [
                    ['value' => '100+', 'label' => 'Premium Games'],
                    ['value' => '$2M+', 'label' => 'Won This Week'],
                    ['value' => '50K+', 'label' => 'Active Players'],
                ],
                'is_active' => true,
                'sort_order' => 1,
            ]
        );
    }
}
