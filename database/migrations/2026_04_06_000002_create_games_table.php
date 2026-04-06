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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->foreignId('game_category_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('thumbnail_url');
            $table->string('game_url')->nullable();
            $table->string('demo_url')->nullable();
            $table->decimal('rtp', 5, 2)->nullable()->comment('Return to Player percentage');
            $table->enum('game_type', ['slots', 'fish', 'keno', 'table', 'card', 'other'])->default('slots');
            $table->boolean('is_hot')->default(false);
            $table->boolean('is_new')->default(false);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->integer('play_count')->default(0);
            $table->json('features')->nullable();
            $table->timestamps();
            
            $table->index(['game_category_id', 'is_active']);
            $table->index(['is_hot', 'is_new', 'is_featured']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
