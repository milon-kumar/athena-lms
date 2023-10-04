<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=>1,
            'name'  =>$this->faker->name,
            'phone' =>'017'.rand(11111111,99999999),
            'email' =>$this->faker->email,
            'skype' =>Str::random(5),
            'whatsapp'=>'017'.rand(11111111,99999999),
            'description'=>$this->faker->text(15),
            'fb_page'=>$this->faker->url,
            'youtube_chanel'=>$this->faker->url,
        ];
    }
}
