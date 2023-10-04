<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Course;
use App\Models\CourseChapter;
use App\Models\Setting;
use App\Models\Teacher;
use App\Models\User;
use App\Models\Video;
use Database\Factories\CategoryFactory;
use Database\Factories\CourseFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            RolePermissionSeeder::class,
        ]);

        Teacher::factory(1)->create();
        Category::factory(1)->create();
        Course::factory(1)->create();
        CourseChapter::factory(1)->create();
        Video::factory(1)->create();
        Comment::factory(0)->create();
    }
}
