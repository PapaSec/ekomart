<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\Brand;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    protected $model = Brand::class;

    public function definition(): array
    {
        $name = fake()->unique()->company();

        return [
            'name'        => $name,
            'slug'        => Str::slug($name),
            'logo'        => null,
            'description' => fake()->sentence(),
            'is_active'   => true,
            'is_featured' => false,
            'sort_order'  => fake()->numberBetween(1, 10),
        ];
    }
}