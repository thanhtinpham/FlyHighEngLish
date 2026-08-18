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
        Schema::table('courses', function (Blueprint $table) {
            $table->index(['is_published', 'category'], 'idx_courses_published_cat');
        });

        Schema::table('lessons', function (Blueprint $table) {
            $table->index(['course_id', 'order'], 'idx_lessons_course_order');
            $table->index('is_preview', 'idx_lessons_preview');
        });

        Schema::table('documents', function (Blueprint $table) {
            $table->index('category_id', 'idx_documents_category');
            $table->index('created_at', 'idx_documents_created');
        });

        Schema::table('notifications', function (Blueprint $table) {
            $table->index('created_at', 'idx_notifications_created');
        });

        Schema::table('registrations', function (Blueprint $table) {
            $table->index(['status', 'created_at'], 'idx_registrations_status_created');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropIndex('idx_courses_published_cat');
        });

        Schema::table('lessons', function (Blueprint $table) {
            $table->dropIndex('idx_lessons_course_order');
            $table->dropIndex('idx_lessons_preview');
        });

        Schema::table('documents', function (Blueprint $table) {
            $table->dropIndex('idx_documents_category');
            $table->dropIndex('idx_documents_created');
        });

        Schema::table('notifications', function (Blueprint $table) {
            $table->dropIndex('idx_notifications_created');
        });

        Schema::table('registrations', function (Blueprint $table) {
            $table->dropIndex('idx_registrations_status_created');
        });
    }
};
