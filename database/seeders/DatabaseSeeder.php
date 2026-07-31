<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\{Brand, Category, Product};

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Roles, Permissions & Admin User
        $this->call([
            RoleAndPermissionSeeder::class,
        ]);

        // 2. Featured Categories & Brands
        Category::factory(8)->create(['is_featured' => true]);
        Brand::factory(5)->create();

        // 3. Ekomart Sample Products
        Product::factory(30)->create();
    }
}