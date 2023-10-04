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
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('unique_id')->nullable();
            $table->enum('type',['text','image'])->nullable();
            $table->string('name')->nullable();
            $table->longText('description')->nullable();
            $table->longText('conclusion_text')->nullable();
            $table->text('pass_message')->nullable();
            $table->text('fail_message')->nullable();
            $table->boolean('is_random')->nullable();
            $table->boolean('blank_answer')->nullable();
            $table->boolean('incorrect_answer')->nullable();
            $table->boolean('correct_incorrect')->nullable();
            $table->boolean('display_correct_answer')->nullable();
            $table->boolean('display_explanation')->nullable();
            $table->string('password')->nullable();
            $table->integer('times')->nullable();
            $table->integer('minutes')->nullable();
            $table->integer('pass_mark')->nullable();
            $table->enum('status',['published','unpublished','pending','success','failure','cancel','active','inactive','approve','decline','delete'])->default('published');            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};
