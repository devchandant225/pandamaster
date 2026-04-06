<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\GameCategory;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Creates sample game categories and games for the gaming platform.
     */
    public function run(): void
    {
        // ===========================================
        // GAME CATEGORIES
        // ===========================================
        $slotsCategory = GameCategory::firstOrCreate(
            ['name' => 'Slots'],
            [
                'slug' => 'slots',
                'description' => 'Spin and win with our exciting collection of slot games',
                'sort_order' => 1,
                'is_active' => true,
            ]
        );

        $fishCategory = GameCategory::firstOrCreate(
            ['name' => 'Fish Games'],
            [
                'slug' => 'fish-games',
                'description' => 'Dive deep into underwater adventures and catch big wins',
                'sort_order' => 2,
                'is_active' => true,
            ]
        );

        $kenoCategory = GameCategory::firstOrCreate(
            ['name' => 'Keno'],
            [
                'slug' => 'keno',
                'description' => 'Pick your numbers and test your luck',
                'sort_order' => 3,
                'is_active' => true,
            ]
        );

        $tableCategory = GameCategory::firstOrCreate(
            ['name' => 'Table Games'],
            [
                'slug' => 'table-games',
                'description' => 'Classic casino table games for every player',
                'sort_order' => 4,
                'is_active' => true,
            ]
        );

        $cardCategory = GameCategory::firstOrCreate(
            ['name' => 'Card Games'],
            [
                'slug' => 'card-games',
                'description' => 'Strategic card games for skilled players',
                'sort_order' => 5,
                'is_active' => true,
            ]
        );

        // ===========================================
        // SLOT GAMES
        // ===========================================
        Game::firstOrCreate(
            ['title' => 'Starlight Princess'],
            [
                'game_category_id' => $slotsCategory->id,
                'slug' => 'starlight-princess',
                'description' => 'A magical slot game featuring cascading wins and multipliers up to 500x!',
                'thumbnail_url' => 'https://via.placeholder.com/400x300/D4AF37/000000?text=Starlight+Princess',
                'game_url' => 'https://example.com/games/starlight-princess',
                'demo_url' => 'https://example.com/demo/starlight-princess',
                'rtp' => 96.50,
                'game_type' => 'slots',
                'is_hot' => true,
                'is_new' => false,
                'is_featured' => true,
                'is_active' => true,
                'play_count' => 15420,
                'features' => ['free_spins', 'multiplier', 'cascade'],
            ]
        );

        Game::firstOrCreate(
            ['title' => 'Gates of Olympus'],
            [
                'game_category_id' => $slotsCategory->id,
                'slug' => 'gates-of-olympus',
                'description' => 'Journey to Mount Olympus and win big with Zeus\'s powers!',
                'thumbnail_url' => 'https://via.placeholder.com/400x300/D4AF37/000000?text=Gates+of+Olympus',
                'game_url' => 'https://example.com/games/gates-of-olympus',
                'demo_url' => 'https://example.com/demo/gates-of-olympus',
                'rtp' => 96.51,
                'game_type' => 'slots',
                'is_hot' => true,
                'is_new' => false,
                'is_featured' => true,
                'is_active' => true,
                'play_count' => 18750,
                'features' => ['free_spins', 'multiplier', 'tumble'],
            ]
        );

        Game::firstOrCreate(
            ['title' => 'Sweet Bonanza'],
            [
                'game_category_id' => $slotsCategory->id,
                'slug' => 'sweet-bonanza',
                'description' => 'A candy-themed slot with explosive wins and free spins!',
                'thumbnail_url' => 'https://via.placeholder.com/400x300/FF69B4/FFFFFF?text=Sweet+Bonanza',
                'game_url' => 'https://example.com/games/sweet-bonanza',
                'demo_url' => 'https://example.com/demo/sweet-bonanza',
                'rtp' => 96.48,
                'game_type' => 'slots',
                'is_hot' => true,
                'is_new' => false,
                'is_featured' => false,
                'is_active' => true,
                'play_count' => 21340,
                'features' => ['free_spins', 'bomb_feature'],
            ]
        );

        Game::firstOrCreate(
            ['title' => 'Wild West Gold'],
            [
                'game_category_id' => $slotsCategory->id,
                'slug' => 'wild-west-gold',
                'description' => 'Strike gold in the Wild West with sticky wilds and big wins!',
                'thumbnail_url' => 'https://via.placeholder.com/400x300/D4AF37/000000?text=Wild+West+Gold',
                'game_url' => 'https://example.com/games/wild-west-gold',
                'demo_url' => 'https://example.com/demo/wild-west-gold',
                'rtp' => 96.53,
                'game_type' => 'slots',
                'is_hot' => false,
                'is_new' => true,
                'is_featured' => true,
                'is_active' => true,
                'play_count' => 5230,
                'features' => ['sticky_wilds', 'free_spins'],
            ]
        );

        // ===========================================
        // FISH GAMES
        // ===========================================
        Game::firstOrCreate(
            ['title' => 'Ocean King'],
            [
                'game_category_id' => $fishCategory->id,
                'slug' => 'ocean-king',
                'description' => 'The ultimate fish shooting game with massive bosses and jackpots!',
                'thumbnail_url' => 'https://via.placeholder.com/400x300/00BFFF/FFFFFF?text=Ocean+King',
                'game_url' => 'https://example.com/games/ocean-king',
                'demo_url' => 'https://example.com/demo/ocean-king',
                'rtp' => 97.00,
                'game_type' => 'fish',
                'is_hot' => true,
                'is_new' => false,
                'is_featured' => true,
                'is_active' => true,
                'play_count' => 12890,
                'features' => ['boss_battles', 'jackpot', 'multiplayer'],
            ]
        );

        Game::firstOrCreate(
            ['title' => 'Fish Hunter'],
            [
                'game_category_id' => $fishCategory->id,
                'slug' => 'fish-hunter',
                'description' => 'Hunt exotic fish and win incredible prizes!',
                'thumbnail_url' => 'https://via.placeholder.com/400x300/00BFFF/FFFFFF?text=Fish+Hunter',
                'game_url' => 'https://example.com/games/fish-hunter',
                'demo_url' => 'https://example.com/demo/fish-hunter',
                'rtp' => 96.80,
                'game_type' => 'fish',
                'is_hot' => false,
                'is_new' => true,
                'is_featured' => false,
                'is_active' => true,
                'play_count' => 3450,
                'features' => ['special_weapons', 'boss_fish'],
            ]
        );

        // ===========================================
        // KENO GAMES
        // ===========================================
        Game::firstOrCreate(
            ['title' => 'Classic Keno'],
            [
                'game_category_id' => $kenoCategory->id,
                'slug' => 'classic-keno',
                'description' => 'Traditional keno with modern payouts. Pick up to 10 numbers!',
                'thumbnail_url' => 'https://via.placeholder.com/400x300/FF69B4/FFFFFF?text=Classic+Keno',
                'game_url' => 'https://example.com/games/classic-keno',
                'demo_url' => 'https://example.com/demo/classic-keno',
                'rtp' => 95.00,
                'game_type' => 'keno',
                'is_hot' => false,
                'is_new' => false,
                'is_featured' => true,
                'is_active' => true,
                'play_count' => 7890,
                'features' => ['auto_pick', 'quick_play'],
            ]
        );

        // ===========================================
        // TABLE GAMES
        // ===========================================
        Game::firstOrCreate(
            ['title' => 'European Roulette'],
            [
                'game_category_id' => $tableCategory->id,
                'slug' => 'european-roulette',
                'description' => 'Classic European roulette with a single zero for better odds!',
                'thumbnail_url' => 'https://via.placeholder.com/400x300/D4AF37/000000?text=European+Roulette',
                'game_url' => 'https://example.com/games/european-roulette',
                'demo_url' => 'https://example.com/demo/european-roulette',
                'rtp' => 97.30,
                'game_type' => 'table',
                'is_hot' => true,
                'is_new' => false,
                'is_featured' => true,
                'is_active' => true,
                'play_count' => 9560,
                'features' => ['statistics', 'hot_cold_numbers'],
            ]
        );

        Game::firstOrCreate(
            ['title' => 'Blackjack VIP'],
            [
                'game_category_id' => $tableCategory->id,
                'slug' => 'blackjack-vip',
                'description' => 'Premium blackjack with perfect strategy potential!',
                'thumbnail_url' => 'https://via.placeholder.com/400x300/000000/D4AF37?text=Blackjack+VIP',
                'game_url' => 'https://example.com/games/blackjack-vip',
                'demo_url' => 'https://example.com/demo/blackjack-vip',
                'rtp' => 99.50,
                'game_type' => 'table',
                'is_hot' => true,
                'is_new' => false,
                'is_featured' => false,
                'is_active' => true,
                'play_count' => 11230,
                'features' => ['side_bets', 'surrender'],
            ]
        );

        // ===========================================
        // CARD GAMES
        // ===========================================
        Game::firstOrCreate(
            ['title' => 'Baccarat Pro'],
            [
                'game_category_id' => $cardCategory->id,
                'slug' => 'baccarat-pro',
                'description' => 'Professional baccarat with road maps and statistics!',
                'thumbnail_url' => 'https://via.placeholder.com/400x300/FF69B4/FFFFFF?text=Baccarat+Pro',
                'game_url' => 'https://example.com/games/baccarat-pro',
                'demo_url' => 'https://example.com/demo/baccarat-pro',
                'rtp' => 98.94,
                'game_type' => 'card',
                'is_hot' => false,
                'is_new' => true,
                'is_featured' => true,
                'is_active' => true,
                'play_count' => 4560,
                'features' => ['roadmap', 'statistics'],
            ]
        );

        Game::firstOrCreate(
            ['title' => 'Texas Hold\'em Poker'],
            [
                'game_category_id' => $cardCategory->id,
                'slug' => 'texas-holdem-poker',
                'description' => 'The world\'s most popular poker variant!',
                'thumbnail_url' => 'https://via.placeholder.com/400x300/D4AF37/000000?text=Texas+Holdem',
                'game_url' => 'https://example.com/games/texas-holdem',
                'demo_url' => 'https://example.com/demo/texas-holdem',
                'rtp' => 97.50,
                'game_type' => 'card',
                'is_hot' => true,
                'is_new' => false,
                'is_featured' => true,
                'is_active' => true,
                'play_count' => 16780,
                'features' => ['multiplayer', 'tournaments'],
            ]
        );
    }
}
