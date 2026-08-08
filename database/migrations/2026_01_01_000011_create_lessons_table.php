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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained('courses')->onDelete('cascade');
            $table->string('title');
            $table->string('slug');
            $table->string('level_or_week')->default('Tuần 1'); // e.g. "Tuần 1", "Level A1", etc.
            $table->text('description')->nullable();
            $table->longText('html_content')->nullable(); // Embedded HTML code or relative path to stored HTML file
            $table->string('html_file_path')->nullable(); // Relative path in public storage if uploaded
            $table->boolean('is_preview')->default(false); // Guest can preview
            $table->integer('order')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};
