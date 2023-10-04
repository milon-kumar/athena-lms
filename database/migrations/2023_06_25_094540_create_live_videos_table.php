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
        Schema::create('live_videos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('course_id')->nullable()->constrained('courses')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->text('link')->nullable();
            $table->integer('serial')->nullable()->default(0);
            $table->boolean('is_active')->default(false)->nullable();
            $table->boolean('is_featured')->default(false)->nullable();
            $table->boolean('is_popular')->default(false)->nullable();
            $table->integer('view_count')->default(0);
            $table->string('duration')->nullable();
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
    public function down()
    {
        Schema::dropIfExists('live_videos');
    }
};
