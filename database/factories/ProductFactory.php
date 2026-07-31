<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\{Brand, Category, Product, User};

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        $name = fake()->unique()->words(3, true);
        $price = fake()->randomFloat(2, 5, 100);
        $hasDiscount = fake()->boolean(60); // 60% chance of being on sale
        $salePrice = $hasDiscount ? round($price * 0.8, 2) : null; // 20% discount

        $units = ['500g Pack', '1kg Pack', '250g Box', '1 Liter', '1.5L Bottle', '12 Pcs'];

        return [
            'category_id'         => Category::inRandomOrder()->first()?->id ?? Category::factory(),
            'brand_id'            => Brand::inRandomOrder()->first()?->id ?? Brand::factory(),
            'vendor_id'           => User::inRandomOrder()->first()?->id ?? User::factory(),
            'name'                => ucfirst($name),
            'slug'                => Str::slug($name),
            'sku'                 => strtoupper(Str::random(10)),
            'unit'                => fake()->randomElement($units),
            'shelf_life'          => '6 Months',
            'product_type'        => fake()->randomElement(['Original', 'Organic', 'Fresh']),
            'short_description'   => fake()->sentence(),
            'description'         => fake()->paragraph(3),
            'additional_info'     => fake()->paragraph(2),
            'price'               => $price,
            'sale_price'          => $salePrice,
            'discount_percentage' => $hasDiscount ? 20 : null,
            'rating'              => fake()->randomFloat(2, 3.5, 5.0),
            'reviews_count'       => fake()->numberBetween(10, 250),
            'total_sales'         => fake()->numberBetween(0, 500),
            'stock'               => fake()->numberBetween(10, 100),
            'featured_image'      => null, // Will use placeholder accessor logic
            'images'              => [],
            'tags'                => ['grocery', 'fresh', 'food'],
            'is_active'           => true,
            'is_featured'         => fake()->boolean(40),
            'in_stock'            => true,
        ];
    }
}