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
            $table->string('hero_title')->nullable()->after('title');
            $table->string('hero_subtitle')->nullable()->after('hero_title');
            $table->json('hero_ctas')->nullable()->after('hero_subtitle');

            // Alternating Content Sections
            $table->json('sections')->nullable()->after('description');

            // How To Section
            $table->json('how_to')->nullable()->after('sections');

            // Dynamic Card Grid Section
            $table->string('card_section_title')->nullable()->after('how_to');
            $table->text('card_section_content')->nullable()->after('card_section_title');
            $table->json('card_section_cards')->nullable()->after('card_section_content');

            // Testimonials, FAQs, and Special Notes
            $table->json('testimonials')->nullable()->after('card_section_cards');
            $table->json('faqs')->nullable()->after('testimonials');
            $table->string('special_title')->nullable()->after('faqs');
            $table->json('special_items')->nullable()->after('special_title');
            
            // Key Features
            $table->json('features')->nullable()->after('special_items');

            // Decoupling: Drop Category Relationship
            $table->dropForeign(['game_category_id']);
            $table->dropColumn('game_category_id');
        });

        // Update Posts Table
        Schema::table('posts', function (Blueprint $table) {
            // Decoupling: Drop Category Relationship
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('games', function (Blueprint $table) {
            $table->foreignId('game_category_id')->nullable()->constrained()->onDelete('cascade');
            
            $table->dropColumn([
                'hero_title', 'hero_subtitle', 'hero_ctas',
                'sections', 'how_to',
                'card_section_title', 'card_section_content', 'card_section_cards',
                'testimonials', 'faqs', 'special_title', 'special_items', 'features'
            ]);
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->foreignId('category_id')->nullable()->constrained()->onDelete('cascade');
        });
    }
};
