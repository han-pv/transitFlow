<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'phone_number' => fake()->boolean(80) ? fake()->phoneNumber() : null,
            'city' => fake()->boolean(80) ? fake()->city() : null,
            'message' => fake()->paragraphs(2, true),
            'ip_address' => fake()->ipv4(),
            'user_agent' => fake()->userAgent(),
            'is_responded' => fake()->boolean(20),
        ];
    }
}
