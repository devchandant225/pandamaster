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
        Schema::create('landing_sections', function (Blueprint $table) {
            $table->id();
            $table->string('section_key')->unique()->comment('Unique identifier for the section (hero, features, etc.)');
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->text('description')->nullable();
            $table->string('badge_text')->nullable()->comment('Small badge text like "Premium Gaming Experience"');
            $table->string('cta_primary_text')->nullable()->comment('Primary button text');
            $table->string('cta_primary_url')->nullable()->comment('Primary button URL');
            $table->string('cta_secondary_text')->nullable()->comment('Secondary button text');
            $table->string('cta_secondary_url')->nullable()->comment('Secondary button URL');
            $table->string('background_type')->default('gradient')->comment('gradient, image, video');
            $table->string('background_url')->nullable()->comment('Background image/video URL');
            $table->string('animation_type')->default('particles')->comment('particles, stars, neon, pulse');
            $table->json('stats')->nullable()->comment('Statistics array like ["100+ Games", "$2M+ Won", "50K+ Players"]');
            $table->json('features')->nullable()->comment('Feature highlights for the section');
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
            
            $table->index(['section_key', 'is_active']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('landing_sections');
    }
};
