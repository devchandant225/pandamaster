<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Update Games Table
        Schema::table('games', function (Blueprint $table) {
            // Hero Section
            if (!Schema::hasColumn('games', 'hero_title')) {
                $table->string('hero_title')->nullable()->after('title');
            }
            if (!Schema::hasColumn('games', 'hero_subtitle')) {
                $table->string('hero_subtitle')->nullable()->after('hero_title');
            }
            if (!Schema::hasColumn('games', 'hero_ctas')) {
                $table->json('hero_ctas')->nullable()->after('hero_subtitle');
            }

            // Alternating Content Sections
            if (!Schema::hasColumn('games', 'sections')) {
                $table->json('sections')->nullable()->after('description');
            }

            // How To Section
            if (!Schema::hasColumn('games', 'how_to')) {
                $table->json('how_to')->nullable()->after('sections');
            }

            // Dynamic Card Grid Section
            if (!Schema::hasColumn('games', 'card_section_title')) {
                $table->string('card_section_title')->nullable()->after('how_to');
            }
            if (!Schema::hasColumn('games', 'card_section_content')) {
                $table->text('card_section_content')->nullable()->after('card_section_title');
            }
            if (!Schema::hasColumn('games', 'card_section_cards')) {
                $table->json('card_section_cards')->nullable()->after('card_section_content');
            }

            // Testimonials, FAQs, and Special Notes
            if (!Schema::hasColumn('games', 'testimonials')) {
                $table->json('testimonials')->nullable()->after('card_section_cards');
            }
            if (!Schema::hasColumn('games', 'faqs')) {
                $table->json('faqs')->nullable()->after('testimonials');
            }
            if (!Schema::hasColumn('games', 'special_title')) {
                $table->string('special_title')->nullable()->after('faqs');
            }
            if (!Schema::hasColumn('games', 'special_items')) {
                $table->json('special_items')->nullable()->after('special_title');
            }
            
            // Key Features
            if (!Schema::hasColumn('games', 'features')) {
                $table->json('features')->nullable()->after('special_items');
            }

            // Decoupling: Drop Category Relationship
            if (Schema::hasColumn('games', 'game_category_id')) {
                $table->dropForeign(['game_category_id']);
                $table->dropColumn('game_category_id');
            }
        });

        // Update Posts Table
        Schema::table('posts', function (Blueprint $table) {
            // Decoupling: Drop Category Relationship
            if (Schema::hasColumn('posts', 'category_id')) {
                $table->dropForeign(['category_id']);
                $table->dropColumn('category_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('games', function (Blueprint $table) {
            if (!Schema::hasColumn('games', 'game_category_id')) {
                $table->foreignId('game_category_id')->nullable()->constrained()->onDelete('cascade');
            }
            
            $columnsToDrop = [
                'hero_title', 'hero_subtitle', 'hero_ctas',
                'sections', 'how_to',
                'card_section_title', 'card_section_content', 'card_section_cards',
                'testimonials', 'faqs', 'special_title', 'special_items', 'features'
            ];

            foreach ($columnsToDrop as $column) {
                if (Schema::hasColumn('games', $column)) {
                    $table->dropColumn($column);
                }
            }
        });

        Schema::table('posts', function (Blueprint $table) {
            if (!Schema::hasColumn('posts', 'category_id')) {
                $table->foreignId('category_id')->nullable()->constrained()->onDelete('cascade');
            }
        });
    }
};
