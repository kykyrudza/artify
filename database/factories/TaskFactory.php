<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nameTask' => $this->faker->name(),
            'descriptionTask' => $this->faker->text(),
            'dueDateTask' => $this->faker->date(),
            'user_id' => 1
        ];
    }
}
