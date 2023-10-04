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
        Schema::create('student_exams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->foreignId('course_id')->nullable()->constrained('courses');
            $table->foreignId('exam_id')->nullable()->constrained('exams');
            $table->timestamp('exam_start_time')->nullable();
            $table->timestamp('exam_end_time')->nullable();
            $table->float('exam_given_time')->nullable();
            $table->integer('total_question')->nullable();
            $table->integer('given_ans')->nullable();
            $table->integer('correct_answer')->nullable();
            $table->integer('wrong_answer')->nullable();
            $table->integer('pass_mark')->nullable();
            $table->float('get_mark')->nullable();
            $table->string('note')->nullable();
            $table->enum('status',['published','unpublished','pending','success','failure','cancel','active','inactive','approve','decline','delete'])->default('published');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_exams');
    }
};
