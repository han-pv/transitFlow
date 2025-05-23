<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Testimonial>
 */
class TestimonialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::inRandomOrder()->first();
        return [
            'firstname' => fake()->firstName(),
            'lastname' => fake()->boolean(80) ? fake()->lastName() : null,
            'rating' => fake()->numberBetween(1, 5),
            'comment' => fake()->paragraph(2),
            'image' => null,
            'title' => fake()->jobTitle(),
            'company' => fake()->company(),
            'location' => fake()->city() . ', ' . fake()->country(),
            'is_active' => fake()->boolean(30),
            'created_by' => $user->firstname . " " . $user->lastname,
        ];
    }
}
