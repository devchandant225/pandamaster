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
            $table->string('role')->default('user'); // admin, agent, user
            $table->string('phone')->nullable();
            $table->string('city')->nullable();
            $table->string('avatar_url')->nullable();
            $table->integer('performance_score')->default(0); // For agents
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'phone', 'city', 'avatar_url', 'performance_score']);
        });
    }
};
