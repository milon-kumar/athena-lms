<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('enroles', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id')->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('course_id')->nullable()->constrained('courses')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('payment_id')->nullable()->constrained('payments')->cascadeOnUpdate()->cascadeOnDelete();
            $table->date('date')->nullable()->default(now());
            $table->string('facebook_group_code')->nullable()->default(Str::random(10));
            $table->boolean('is_suspend')->default(false);
            $table->boolean('is_post_approval')->default(false);
            $table->enum('status',['published','unpublished','pending','success','failure','cancel','active','inactive','approve','decline','delete'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enroles');
    }
};
