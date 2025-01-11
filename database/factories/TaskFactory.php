<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = $this->faker->randomElement(['pending', 'completed']);

        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph,
            'status' => $status,
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'completed_at' => $status === "completed" ?  $this->faker->randomElement([null, $this->faker->dateTimeBetween('-1 year', 'now')]) : null,
        ];
    }
}
