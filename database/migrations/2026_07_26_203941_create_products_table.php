<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            // Foreign Keys
            $table->foreignId('category_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('brand_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('vendor_id')->nullable()->constrained('users')->nullOnDelete();

            // Basic Specs
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('sku')->unique()->nullable();
            $table->string('unit')->nullable(); // e.g. "500g Pack", "1 Liter", "12 Pcs"
            $table->string('shelf_life')->nullable(); // e.g. "6 Months"
            $table->string('product_type')->nullable(); // e.g. "Original", "Organic"

            // Descriptions
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->longText('additional_info')->nullable(); // For the extra tab on product page

            // Pricing & Badges
            $table->decimal('price', 10, 2);
            $table->decimal('sale_price', 10, 2)->nullable();
            $table->integer('discount_percentage')->nullable(); // For the "25% Off" badge

            // Ratings & Widgets
            $table->decimal('rating', 3, 2)->default(0.00); // e.g. 4.85 stars
            $table->unsignedInteger('reviews_count')->default(0); // e.g. 125 Reviews
            $table->unsignedInteger('total_sales')->default(0); // For "Top Selling" widgets

            // Inventory & Gallery
            $table->integer('stock')->default(0);
            $table->string('featured_image')->nullable();
            $table->json('images')->nullable(); // Array of gallery thumbnail paths
            $table->json('tags')->nullable(); // e.g. ["fashion", "t-shirts", "men"]

            // Status Flags
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->boolean('in_stock')->default(true);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};