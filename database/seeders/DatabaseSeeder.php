<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Color;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategorySeeder::class,
            ColorSeeder::class,
            TagSeeder::class,
            GroupSeeder::class,
        ]);

        $tags = Tag::all();
        $colors = Color::all();
        $products = Product::factory(5)->create();

        foreach ($products as $product) {
            $tagsIds = $tags->random(random_int(1, 6))->pluck('id');
            $product->tags()->attach($tagsIds);

            $colorIds = $colors->random(1)->pluck('id');
            $product->colors()->attach($colorIds);
        }
    }
}
