<?php

namespace App\Livewire;

use App\Models\{Category, Product};
use Livewire\Component;

class WeeklyBestSellers extends Component
{
    public string|int $selectedCategory = 'all';

    public function selectCategory(string|int $categoryId): void
    {
        $this->selectedCategory = $categoryId;
    }

    public function render()
    {
        // 1. Fetch featured grocery categories for the header tabs
        $categories = Category::query()
            ->where('is_active', true)
            ->take(5)
            ->get();

        // 2. Query up to 12 products filtered by category
        $products = Product::query()
            ->with(['category', 'brand'])
            ->when($this->selectedCategory !== 'all', function ($query) {
                $query->where('category_id', $this->selectedCategory);
            })
            // Filter by weekly best seller flag or high sales count if available
            // ->where('is_weekly_best_seller', true) 
            ->latest()
            ->take(12)
            ->get();

        return view('livewire.weekly-best-sellers', [
            'categories' => $categories,
            'products'   => $products,
        ]);
    }
}