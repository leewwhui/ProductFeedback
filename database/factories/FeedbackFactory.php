<?php

namespace Database\Factories;

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
            "title" => $this->faker->sentence(),
            'category' => $this->faker->randomElement(['enhancement', 'feature', 'bug', 'ui', 'ux']),
            'upvotes' => $this->faker->numberBetween(0, 100),
            'status' => $this->faker->randomElement(['suggestion', 'planned', 'in-progress', 'live']),
            'description' => $this->faker->paragraph()
        ];
    }
}
