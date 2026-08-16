<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Database\Factories\ProductFactory;

#[Fillable([
    'category_id',
    'brand_id',
    'vendor_id',
    'name',
    'slug',
    'sku',
    'unit',
    'shelf_life',
    'product_type',
    'short_description',
    'description',
    'additional_info',
    'price',
    'sale_price',
    'discount_percentage',
    'stock',
    'featured_image',
    'images',
    'sort_order',
    'tags',
    'is_active',
    'is_featured',
    'in_stock',
])]
class Product extends Model
{
    /** @use HasFactory<ProductFactory> */
    use HasFactory, SoftDeletes;

    protected function casts(): array
    {
        return [
            'images' => 'array',
            'tags' => 'array',
            'price' => 'decimal:2',
            'sale_price' => 'decimal:2',
            'discount_percentage' => 'integer',
            'stock' => 'integer',
            'sort_order' => 'sort_order',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
            'in_stock' => 'boolean',
        ];
    }

    // Relationships
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function vendor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'vendor_id');
    }

    // Accessors for Ekomart UI Components

    /**
     * Calculates discount percent if not explicitly set in DB.
     * Used for the top badge ("25% Off").
     */
    public function getCalculatedDiscountAttribute(): int
    {
        if ($this->discount_percentage) {
            return $this->discount_percentage;
        }

        if ($this->sale_price && $this->price > $this->sale_price) {
            return (int) round((($this->price - $this->sale_price) / $this->price) * 100);
        }

        return 0;
    }

    /**
     * Main display image fallback.
     */
    public function getFirstImageAttribute(): string
    {
        if ($this->featured_image) {
            return asset('storage/' . $this->featured_image);
        }

        if (!empty($this->images)) {
            return asset('storage/' . $this->images[0]);
        }

        return asset('images/placeholder.png');
    }

    /**
     * Calculate discount percentage dynamically.
     * Returns null if no valid discount exists.
     */
    public function getDiscountPercentageAttribute(): ?int
    {
        if (
    !$this->sale_price
    || ($this->sale !== null && $this->sale->price >= $this->price)
    || $this->price <= 0
) {
            return null;
        }

        $discount = (($this->price - $this->sale_price) / $this->price) * 100;
        return (int) round($discount);
    }

    // Query Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeInStock($query)
    {
        return $query->where('in_stock', true)->where('stock', '>', 0);
    }
}