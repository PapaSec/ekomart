<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\{Builder, Model};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\Product;

#[Fillable([
    'name',
    'slug',
    'icon',
    'image',
    'is_featured',
    'is_active',
    'sort_order',
])]
class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    /**
     * Get the attributes that should be cast.
     */
    protected function casts(): array
    {
        return [
            'is_featured' => 'boolean',
            'is_active'   => 'boolean',
            'sort_order'  => 'integer',
        ];
    }

    /**
     * Relationship to get all products under this category.
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    /** 
     * In Laravel Eloquent, any method starting with scope (like scopeActive or scopeFeatured) is recognized as a query scope on the model. Placing them together at the bottom keeps your relationships and casting rules neat and organized.
     */

    /**
     * Scope to order categories by sort_order.
     */
    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('sort_order', 'asc');
    }

    /**
     * Scope to filter active categories.
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function getImageUrlAttribute(): ?string
    {
        if (! $this->image) {
            return null;
        }

        // Prepend 'categories/' if the stored string is missing it
        $path = str_contains($this->image, '/') ? $this->image : 'categories/' . $this->image;

        return asset('storage/' . $path);
    }

    /**
     * Scope to filter featured categories.
     */
    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', true);
    }
}