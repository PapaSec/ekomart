<?php

namespace App\Livewire\Frontend;

use App\Models\{Category, Product};
use Livewire\Component;
use Livewire\Attributes\{Layout, Title};

#[Layout('layouts.app')]
#[Title('Ekomart - Fresh Organic Grocery Store')]
class Home extends Component
{
    public function render()
    {
        return view('livewire.frontend.home', [
            // Featured Categories Carousel (e.g. Organic Vegetable 299 ITEMS)
            'featuredCategories' => Category::active()
                ->featured()
                ->ordered()
                ->withCount('products')
                ->take(8)
                ->get(),

            // Weekly Best Selling Groceries
            'bestSellers' => Product::active()
                ->inStock()
                ->orderByDesc('total_sales')
                ->take(10)
                ->get(),

            // Hand Picked 10% Offer Items
            'handPicked' => Product::active()
                ->whereNotNull('sale_price')
                ->latest()
                ->take(6)
                ->get(),

            // Multi-column Bottom Widgets
            'recentlyAdded' => Product::active()->latest()->take(3)->get(),
            'topRated' => Product::active()->orderByDesc('rating')->take(3)->get(),
            'topSelling' => Product::active()->orderByDesc('total_sales')->take(3)->get(),
        ]);
    }
}
