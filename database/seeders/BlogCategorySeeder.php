<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $objs = [
            'Shipping',
            'Services',
            'Transport',
            'Warehouse',
            'Transport Industries',
        ];

        foreach ($objs as $obj) {
            BlogCategory::create([
                'name' => $obj,
            ]);
        }
    }
}
