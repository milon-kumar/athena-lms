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
        Schema::create('course_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('course_id')->nullable()->constrained('courses')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('image')->nullable()->default('images/default.jpg');
            $table->integer('total_course_students')->nullable()->default(0);
            $table->integer('recorded_class_video')->nullable()->default(0);
            $table->integer('live_classes')->nullable();
            $table->string('live_class_time')->nullable();
            $table->integer('total_class_hours')->nullable()->default(0);
            $table->integer('mcq_exams')->nullable()->default(0);
            $table->integer('weekly_exams')->nullable()->default(0);
            $table->integer('paper_final_exams')->nullable()->default(0);
            $table->boolean('class_recorded')->default(true)->nullable();
            $table->string('live_class_method')->nullable();
            $table->text('course_buy_video')->nullable();
            $table->text('course_description')->nullable();
            $table->text('teachers')->nullable();
            $table->string('fb_private_discussion_group')->nullable();
            $table->text('course_introduction_video')->nullable();
            $table->integer('enrollment_validity')->nullable();
            $table->integer('video_view_permit')->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_details');
    }
};
