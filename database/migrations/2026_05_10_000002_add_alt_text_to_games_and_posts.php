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
        Schema::table('games', function (Blueprint $table) {
            $table->string('thumbnail_alt')->nullable()->after('thumbnail_url');
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->string('image_alt')->nullable()->after('image_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('games', function (Blueprint $table) {
            $table->dropColumn('thumbnail_alt');
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('image_alt');
        });
    }
};
