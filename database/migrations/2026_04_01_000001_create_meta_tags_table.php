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
        Schema::create('meta_tags', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('desc')->nullable();
            $table->string('keyword')->nullable();
            $table->string('image')->nullable();
            $table->json('schema_head')->nullable();
            $table->json('schema_body')->nullable();
            $table->string('page_type')->unique();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meta_tags');
    }
};
