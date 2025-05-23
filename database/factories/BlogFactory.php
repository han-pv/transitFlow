<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use App\Models\BlogCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(6);
        $user = User::inRandomOrder()->first();
        $category = BlogCategory::inRandomOrder()->first();
        return [
            "user_id" => $user,
            "category_id" => $category,
            "title" => $title,
            "slug" => Str::slug($title),
            "summary" => fake()->paragraph(rand(3, 5)),
            "bg_image_path"=> null,
            "main_image_path"=> null,
            "created_at" => now(),
            "updated_at" => now(),
        ];
    }
}
