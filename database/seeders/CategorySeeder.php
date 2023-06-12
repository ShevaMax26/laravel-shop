<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            'T-shirts',
            'Jeans',
            'Dresses',
            'Shoes',
            'Jackets',
            'Sweaters',
            'Skirts',
            'Shorts',
            'Hats',
            'Socks'
        ];

        foreach ($categories as $category) {
            Category::create([
                'title' => $category
            ]);
        }
    }
}
