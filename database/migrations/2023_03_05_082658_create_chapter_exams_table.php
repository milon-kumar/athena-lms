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
        Schema::create('chapter_exams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('course_id')->nullable()->constrained('courses')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('course_chapter_id')->nullable()->constrained('course_chapters')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('exam_type_id')->nullable()->constrained('exam_types')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('title')->nullable();
            $table->integer('time')->nullable();
            $table->string('exam_link')->nullable();
            $table->integer('serial')->nullable()->default(0);
            $table->boolean('is_free')->default(true)->comment('True Minnes Is Paied Course Chapter . Is not free')->nullable();
            $table->boolean('is_status')->default(false)->nullable();
            $table->boolean('is_active')->default(false)->nullable();
            $table->boolean('is_featured')->default(false)->nullable();
            $table->boolean('is_popular')->default(false)->nullable();
            $table->integer('view_count')->default(0);
            $table->string('others_one')->nullable();
            $table->string('others_two')->nullable();
            $table->string('others_three')->nullable();
            $table->enum('status',['published','unpublished','pending','success','failure','cancel','active','inactive','approve','decline','delete'])->default('published');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chapter_exams');
    }
};
