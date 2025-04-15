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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('slug', 255)->unique();
            $table->text('description');
            $table->enum('level', ['bachelor', 'master', 'phd', 'short-term', 'preparatory']);
            $table->string('field', 100); // Направление подготовки
            $table->integer('duration_months');
            $table->string('language', 50);
            $table->decimal('price', 10, 2)->nullable();
            $table->string('cover_image', 512)->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            $table->index('title');
            $table->index('level');
            $table->index('field');
            $table->index('is_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
