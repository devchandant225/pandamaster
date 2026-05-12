<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->longText('robots_txt')->nullable();
            $table->longText('header_scripts')->nullable();
            $table->longText('footer_scripts')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['robots_txt', 'header_scripts', 'footer_scripts']);
        });
    }
};
