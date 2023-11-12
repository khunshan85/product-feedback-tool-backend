<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Feedback>
 */
class FeedbackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->text(20),
            'description' => $this->faker->paragraph(),
            'vote' => $this->faker->numberBetween(1, 99999),
            'category_id' => $this->faker->numberBetween(1, Category::count()),
            'user_id' => $this->faker->numberBetween(1, User::count()),
        ];
    }
}
