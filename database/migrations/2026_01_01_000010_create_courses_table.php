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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category'); // 'giao-tiep', 'ielts', 'toeic', 'tre-em'
            $table->text('description')->nullable();
            $table->json('objectives')->nullable(); // Target goals
            $table->json('roadmap')->nullable(); // Learning path steps
            $table->json('structure')->nullable(); // Lesson modules structure
            $table->string('level')->default('Mọi trình độ');
            $table->string('thumbnail')->nullable();
            $table->decimal('price', 12, 2)->default(0);
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
