<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        $name = fake()->unique()->words(2, true);

        return [
            'name'        => ucfirst($name),
            'slug'        => Str::slug($name),
            'icon'        => 'fas fa-shopping-basket',
            'image'       => null,
            'is_featured' => false,
            'is_active'   => true,
            'sort_order'  => fake()->numberBetween(1, 10),
        ];
    }
}