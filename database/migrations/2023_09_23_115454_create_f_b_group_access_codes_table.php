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
        Schema::create('f_b_group_access_codes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('enrole_id')->nullable()->constrained('enroles');
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->foreignId('course_id')->nullable()->constrained('courses');
            $table->text('code')->nullable();
            $table->enum('status',['published','unpublished','pending','success','failure','cancel','active','inactive','approve','decline','delete'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('f_b_group_access_codes');
    }
};
