<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    public function run()
    {
        $colors = [
            '34ebab',
            'ff0000',
            '0000ff',
            'ffff00',
            '800080'
        ];

        foreach ($colors as $color) {
            Color::create([
                'title' => $color
            ]);
        }
    }
}
