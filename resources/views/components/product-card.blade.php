@props(['product'])

<div class="product-card group relative bg-white rounded-xl border border-gray-100 p-4 transition-all duration-300 hover:shadow-lg">
    <!-- Sale Badge -->
    @if ($product->sale_price && $product->discount_percentage)
        <span class="absolute top-3 left-3 bg-amber-500 text-white text-xs font-semibold px-2 py-1 rounded">
            {{ $product->discount_percentage }} Off
        </span>
    @endif
</div>