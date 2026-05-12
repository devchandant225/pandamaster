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
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->decimal('balance', 15, 2)->default(0.00);
            $table->decimal('bonus_coins', 15, 2)->default(0.00);
            $table->decimal('total_wagered', 15, 2)->default(0.00);
            $table->decimal('total_won', 15, 2)->default(0.00);
            $table->integer('games_played')->default(0);
            $table->integer('level')->default(1);
            $table->integer('experience_points')->default(0);
            $table->enum('vip_status', ['bronze', 'silver', 'gold', 'platinum', 'diamond'])->default('bronze');
            $table->json('preferences')->nullable();
            $table->timestamp('last_login_at')->nullable();
            $table->timestamps();
            
            $table->index('user_id');
            $table->index('vip_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
