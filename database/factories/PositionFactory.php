<?php

namespace Database\Factories;

use App\Models\Position;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Position>
 */
class PositionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle,
            'description' => fake()->paragraphs(4, true),
            'salary' => fake()->numberBetween(5000,300000),
            'location' => fake()->city,
            'category' => fake()->randomElement(Position::$category),
            'experience' => fake()->randomElement(Position::$experience)
                
        ];
    }
}
