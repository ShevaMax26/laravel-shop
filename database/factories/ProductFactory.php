<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Group;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $categories = Category::pluck('id')->toArray();
        $groups = Group::pluck('id')->toArray();

        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'content' => $this->faker->text,
            'preview_image' => 'testImage',
            'old_price' => $this->faker->numberBetween(70, 100),
            'price' => $this->faker->numberBetween(40, 60),
            'count' => $this->faker->numberBetween(0, 10),
            'category_id' => $this->faker->randomElement($categories),
            'group_id' => $this->faker->randomElement($groups),
        ];
    }
}
