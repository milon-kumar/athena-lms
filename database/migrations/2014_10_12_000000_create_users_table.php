<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->enum('type',['super_admin','admin','teacher','official','student','user','author','professional','subscriber'])->nullable()->default('user');
            $table->string('ip_address')->nullable();
            $table->string('unique_id')->nullable();
            $table->string('name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('user_name')->nullable()->unique();
            $table->string('email')->nullable()->unique();
            $table->string('phone')->nullable();
            $table->string('others_phone')->nullable();
            $table->text('institute')->nullable();
            $table->string('thana')->nullable();
            $table->string('district')->nullable();
            $table->date('dob')->nullable();
            $table->string('age')->nullable();
            $table->enum('gender',['male','female','others'])->nullable();
            $table->string('national_id')->nullable();
            $table->string('passport_number')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('image')->default('images/default.jpg')->nullable();
            $table->longText('about')->nullable();
            $table->integer('selected_course_id')->nullable()->default(null);
            $table->boolean('is_approve')->default(false);
            $table->boolean('is_active')->default(false);
            $table->boolean('is_delete')->default(true);
            $table->enum('status',['published','unpublished','pending','success','failure','cancel','active','inactive','approve','decline','delete'])->default('published');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
