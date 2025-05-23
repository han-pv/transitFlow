<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Contact;
use App\Models\TeamMember;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\BlogContent;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(.0)->create();

        User::factory()
            ->create([
                'firstname' => 'Admin',
                'username' => 'admin',
                'permissions' => range(1, 8),
            ]);

        User::factory()
            ->create([
                'firstname' => 'User',
                'username' => 'user',
                'permissions' => [2],
            ]);

        $this->call([
            BlogCategorySeeder::class,
        ]);

        Blog::factory(100)->create();

        BlogContent::factory(1000)->create();

        TeamMember::factory(100)->create();

        Testimonial::factory(10)->create();


        Contact::factory(20)->create();

         $this->call([
            AboutSeeder::class,
            BannerSeeder::class,
        ]);

    }
}
