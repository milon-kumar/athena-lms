<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title =  $this->faker->text(60);
        return [
            'user_id'=>1,
            'category_id'=>1,
            'title'=>$title,
            'slug'=>Str::slug($title),
            'image'=>'images/default.jpg',
            'regular_course_fee'=>200000,
            'discount_fee'=>2000,
            'full_course_fee'=>(20000) - (2000) ,
            'status'=>'published',
        ];
    }
}
