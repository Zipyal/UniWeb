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
        Schema::create('adaptation_materials', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('slug', 255)->unique();
            $table->text('content');
            $table->enum('type', ['article', 'video', 'questionnaire', 'tip', 'document']);
            $table->string('file_path', 512)->nullable();
            $table->string('thumbnail', 512)->nullable();
            $table->foreignId('author_id')->constrained('users')->onDelete('cascade');
            $table->boolean('is_published')->default(false);
            $table->integer('views_count')->default(0);
            $table->timestamps();
            
            $table->index('title');
            $table->index('type');
            $table->index('is_published');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adaptation_materials');
    }
};
