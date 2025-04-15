<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255); // Ограничение длины 255 символов
            $table->text('content'); // TEXT для длинного содержимого
            $table->string('image', 512)->nullable(); // Путь к изображению, необязательное
            $table->foreignId('author_id')->constrained('users')->onDelete('cascade'); // С каскадным удалением
            $table->boolean('is_published')->default(false);
            $table->timestamps();
            
            // Индексы для оптимизации поиска
            $table->index('title');
            $table->index('is_published');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
