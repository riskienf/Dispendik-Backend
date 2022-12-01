<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activity>
 */
class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->sentence(),
            'picture' => fake()->imageUrl(),
            'date' => fake()->date(),
            'institution_id' => fake()->numberBetween(1, 10),
            'description' => fake()->sentence(),
        ];
    }
}
