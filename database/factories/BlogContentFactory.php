<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;
use PhpParser\Node\NullableType;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BlogContent>
 */
class BlogContentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = fake()->randomElement(["heading", "text", "quote"]);
        $content = $type === 'quote' || $type === 'heading'  ? fake()->sentences(1, 2) : fake()->paragraphs(8, 9);
        return [
            "blog_id" => Blog::inRandomOrder()->first(),
            "type"=> $type,
            "content"=> $content,
            "image_path"=> null,
            "order" => fake()->numberBetween(1,100),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
