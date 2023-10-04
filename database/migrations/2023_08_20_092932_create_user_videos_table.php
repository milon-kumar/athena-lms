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
        Schema::create('user_videos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('course_id')->nullable()->constrained('courses')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('course_chapter_id')->nullable()->constrained('course_chapters')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('video_id')->nullable()->constrained('videos')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('live_video_id')->nullable()->constrained('live_videos')->cascadeOnUpdate()->cascadeOnDelete();
            $table->integer('view_count')->default(0)->nullable();
            $table->string('video_type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_videos');
    }
};
