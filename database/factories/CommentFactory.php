<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return ['user_id' => 1,
            'course_id'=> 1,
            'commentable_id' => 1,
            'commentable_type' => "App\\Models\\Video",
            'message' => $this->faker->paragraph(),
        ];
    }
}
