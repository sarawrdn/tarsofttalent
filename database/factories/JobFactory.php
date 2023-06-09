<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(rand(3,5),true),
            'address' => $this->faker->words(rand(3,5),true),
            'vacancy' => '1',
            'allowance' => '500 - 1000',
            'description' => $this->faker->text,
            'requirement' => $this->faker->text,
        ];
    }
}
