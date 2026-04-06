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
            $table->text('keyword')->nullable();
            $table->string('image')->nullable();
            $table->json('schema_head')->nullable();
            $table->json('schema_body')->nullable();
            $table->enum('page_type', [
                'home',
                'about',
                'contact',
                'investors',
                'tools',
                'city',
                'property',
                'properties',
                'blog',
                'post',
                'privacy',
                'terms-condition'
            ]);
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->unique('page_type');
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
