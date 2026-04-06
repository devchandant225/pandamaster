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
        Schema::table('users', function (Blueprint $table) {
            // Branding (Mainly for Admin)
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            
            // Social Media & Messaging
            $table->string('whatsapp')->nullable();
            $table->string('viber')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('instagram')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('telegram')->nullable();
            
            // Additional Details
            $table->text('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'logo', 'favicon', 'whatsapp', 'viber', 'facebook', 
                'twitter', 'linkedin', 'instagram', 'tiktok', 'telegram', 
                'description'
            ]);
        });
    }
};
