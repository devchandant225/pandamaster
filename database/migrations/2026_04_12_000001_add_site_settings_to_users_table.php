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
            if (!Schema::hasColumn('users', 'whatsapp')) $table->string('whatsapp')->nullable();
            if (!Schema::hasColumn('users', 'viber')) $table->string('viber')->nullable();
            if (!Schema::hasColumn('users', 'facebook')) $table->string('facebook')->nullable();
            if (!Schema::hasColumn('users', 'twitter')) $table->string('twitter')->nullable();
            if (!Schema::hasColumn('users', 'linkedin')) $table->string('linkedin')->nullable();
            if (!Schema::hasColumn('users', 'instagram')) $table->string('instagram')->nullable();
            if (!Schema::hasColumn('users', 'tiktok')) $table->string('tiktok')->nullable();
            if (!Schema::hasColumn('users', 'pinterest')) $table->string('pinterest')->nullable();
            if (!Schema::hasColumn('users', 'telegram')) $table->string('telegram')->nullable();
            if (!Schema::hasColumn('users', 'description')) $table->text('description')->nullable();
            if (!Schema::hasColumn('users', 'logo')) $table->string('logo')->nullable();
            if (!Schema::hasColumn('users', 'favicon')) $table->string('favicon')->nullable();
            if (!Schema::hasColumn('users', 'login_url')) $table->string('login_url')->nullable();
            if (!Schema::hasColumn('users', 'register_url')) $table->string('register_url')->nullable();
            if (!Schema::hasColumn('users', 'youtube_url')) $table->string('youtube_url')->nullable();
            if (!Schema::hasColumn('users', 'external_dashboard_url')) $table->string('external_dashboard_url')->nullable();
            if (!Schema::hasColumn('users', 'footer_description')) $table->text('footer_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'whatsapp', 'viber', 'facebook', 'twitter', 'linkedin',
                'instagram', 'tiktok', 'pinterest', 'telegram',
                'description', 'logo', 'favicon',
                'login_url', 'register_url', 'youtube_url',
                'external_dashboard_url', 'footer_description'
            ]);
        });
    }
};
