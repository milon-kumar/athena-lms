<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Video>
 */
class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->text(30);
        return [
            'user_id'=>1,
            'course_id'=>1,
            'course_chapter_id'=>1,
            'serial'=>rand(1,100),
            'title'=>$title,
            'slug'=>Str::slug($title),
            'link'=>'uYQcK8ALfos',
            'is_free'=>rand(0,1),
            'view_count'=>0,
        ];
    }
}
