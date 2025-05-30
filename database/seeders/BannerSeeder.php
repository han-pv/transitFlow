<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $objs = [
            'home',
            'blogs',
            'about',
            'gallery',
            'team-members',
            'contact',
        ];
        
        foreach ($objs as $obj) {
            Banner::create([
                'section' => $obj,
            ]);
        }
    }
}
