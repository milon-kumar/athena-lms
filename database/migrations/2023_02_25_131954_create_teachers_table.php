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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('name')->nullable();
            $table->string('image')->nullable()->default('images/user.webp');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('skype')->nullable();
            $table->string('whatsapp')->nullable();
            $table->longText('description')->nullable();
            $table->string('fb_page')->nullable();
            $table->string('youtube_chanel')->nullable();
            $table->string('education')->nullable();
            $table->string('passing_year')->nullable();
            $table->string('occupation')->nullable();
            $table->enum('rank',['best'])->nullable();
            $table->integer('serial')->nullable()->default(0);
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
     * Reverse the migrations.    <br/>
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
