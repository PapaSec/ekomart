@props(['product'])

<div class="product-card group relative bg-white rounded-xl border border-gray-100 p-4 transition-all duration-300 hover:shadow-lg">
    <!-- Sale Badge -->
    @if($product->sale_price && $product->discount_percentage)
        <span class="absolute top-3 left-3 bg-amber-500 text-white text-xs font-semibold px-2 py-1 rounded">
            {{ $product->discount_percentage }}% Off
        </span>
    @endif

    <!-- Product Image -->
    <div class="h-44 w-full flex items-center justify-center overflow-hidden rounded-lg mb-3">
        <img src="{{ $product->featured_image ?? asset('assets/images/placeholder.jpg') }}" 
             alt="{{ $product->name }}" 
             class="object-contain h-full w-full group-hover:scale-105 transition-transform duration-300">
    </div>

    <!-- Category & Specifications -->
    <div class="text-xs text-gray-400 font-medium mb-1 flex items-center justify-between">
        <span>{{ $product->product_type ?? 'Grocery' }}</span>
        <span>{{ $product->unit }}</span>
    </div>

    <!-- Product Title -->
    <h3 class="text-sm font-semibold text-gray-800 line-clamp-2 hover:text-green-600 mb-2">
        <a href="#">{{ $product->name }}</a>
    </h3>

    <!-- Rating Stars -->
    <div class="flex items-center space-x-1 mb-2">
        <div class="flex text-amber-400 text-xs">
            @for($i = 1; $i <= 5; $i++)
                <i class="{{ $i <= round($product->rating) ? 'fas' : 'far' }} fa-star"></i>
            @endfor
        </div>
        <span class="text-xs text-gray-400">({{ $product->reviews_count }})</span>
    </div>

    <!-- Pricing & Quick Action -->
    <div class="flex items-center justify-between mt-3 pt-3 border-t border-gray-50">
        <div>
            @if($product->sale_price)
                <span class="text-base font-bold text-red-600">${{ number_format($product->sale_price, 2) }}</span>
                <span class="text-xs text-gray-400 line-through ml-1">${{ number_format($product->price, 2) }}</span>
            @else
                <span class="text-base font-bold text-gray-900">${{ number_format($product->price, 2) }}</span>
            @endif
        </div>

        <!-- Add to Cart Trigger -->
        <button wire:click="$dispatch('add-to-cart', { id: {{ $product->id }} })" 
                class="bg-green-100 text-green-700 hover:bg-green-600 hover:text-white p-2 rounded-lg transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
        </button>
    </div>
</div>