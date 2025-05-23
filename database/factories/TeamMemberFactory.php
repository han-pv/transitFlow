<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TeamMember>
 */
class TeamMemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::inRandomOrder()->first();
        $gender = fake()->randomElement(['Male', 'Female']);
        $firstName = $gender === 'Male' ? fake()->firstName('male') : ($gender === 'Female' ? fake()->firstName('female') : fake()->firstName());
        $sosialMediaName = fake()->boolean(40) ? fake()->randomElement(['LinkedIn', 'TikTok', 'YouTube']) : null;

        return [
            'firstname' => $firstName,
            'lastname' => fake()->boolean(90) ? fake()->lastName() : null,
            'gender' => $gender,
            'birth_date' => fake()->dateTimeBetween('-60 years', '-18 years')->format('Y-m-d'),
            'hire_date' => fake()->dateTimeBetween('-10 years', 'now')->format('Y-m-d'),
            'role' => fake()->randomElement([
                'Driver',
                'Logistics Manager',
                'Warehouse Staff',
                'HR Specialist',
                'Accountant',
                'Customer Service',
                'Operations Supervisor',
            ]),
            'bio' => fake()->paragraphs(3, true),
            'image' => null,
            'phone_number' => fake()->phoneNumber(),
            'email' => fake()->boolean(95) ? fake()->unique()->safeEmail() : null,
            'instagram' => fake()->boolean(80) ? 'https://instagram.com/' . fake()->userName() : null,
            'facebook' => fake()->boolean(50) ? 'https://facebook.com/' . fake()->userName() : null,
            'x' => fake()->boolean(40) ? 'https://x.com/' . fake()->userName() : null,
            'other_social_name' => $sosialMediaName,
            'other_social' => isset($sosialMediaName) ? 'https://' . fake()->domainName() . '/' . fake()->userName() : null,
            'is_active' => fake()->boolean(80),
            'created_by' => $user->firstname . " " . $user->lastname,
            'created_at' => fake()->dateTimeBetween('-2 years', 'now'),
            'updated_at' => fake()->dateTimeBetween('-2 years', 'now'),
        ];
    }
}
