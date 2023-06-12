<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    public function run()
    {
        $tags = [
            'Fashion',
            'Accessories',
            'Shoes',
            'Beauty',
            'Jewelry',
            'Sports',
            'Outdoor',
            'Technology',
            'Home',
            'Health'
        ];

        foreach ($tags as $tag) {
            Tag::create([
                'title' => $tag
            ]);
        }
    }
}
