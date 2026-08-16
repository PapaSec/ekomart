<?php

namespace App\Livewire\Frontend;

use App\Models\{Category, Product};
use Livewire\Component;
use Livewire\Attributes\{Layout, On, Title};

#[Layout('layouts.app')]
#[Title('Ekomart - Fresh Organic Grocery Store')]
class Home extends Component
{
    #[On('add-to-wishlist')]
    public function addToWishlist($productId)
    {
        if (!auth()->check()) {
            $this->dispatch('notify', ['type' => 'warning', 'message' => 'Please login to add items to your wishlist.']);
            return;
        }

        // Attach product to user's wishlist without duplicating
        auth()->user()->wishlist()->syncWithoutDetaching([$productId]);

        $this->dispatch('notify', ['type' => 'success', 'message' => 'Added to wishlist!']);
    }

    #[On('add-to-compare')]
    public function addToCompare($productId)
    {
        // Session-based compare list logic
        $compare = session()->get('compare', []);
        $compare[$productId] = $productId;
        session()->put('compare', $compare);

        $this->dispatch('notify', ['type' => 'success', 'message' => 'Added to comparison list!']);
    }

    public function render()
    {
        return view('livewire.frontend.home', [
            // Featured Categories Carousel 
            'featuredCategories' => Category::active()
                ->featured()
                ->ordered()
                ->withCount('products')
                ->take(8)
                ->get(),

            // Weekly Best Selling Groceries
            'bestSellers' => Product::active()
                ->inStock()
                ->with('category') 
                ->orderByDesc('total_sales')
                ->take(12)
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