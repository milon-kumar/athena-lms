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
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('category_id')->nullable()->constrained('categories')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('image')->nullable()->default('images/default.jpg');
            $table->integer('regular_course_fee')->nullable();
            $table->integer('discount_fee')->nullable();
            $table->integer('full_course_fee')->nullable();
            $table->string('offer_day')->default(0)->nullable();
            $table->integer('serial')->nullable()->default(0);
            $table->boolean('is_free')->default(false);
            $table->boolean('is_offer')->nullable()->default(false);
            $table->boolean('is_status')->default(false)->nullable();
            $table->boolean('is_active')->default(false)->nullable();
            $table->boolean('is_featured')->default(false)->nullable();
            $table->boolean('is_popular')->default(false)->nullable();
            $table->boolean('is_copy')->default(false)->nullable();
            $table->integer('view_count')->default(0);
            $table->longText('course_setting')->nullable();
            $table->string('others_one')->nullable();
            $table->string('others_two')->nullable();
            $table->string('others_three')->nullable();
            $table->enum('status',['published','unpublished','pending','success','failure','cancel','active','inactive','approve','decline','delete','disable'])->default('pending');
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
