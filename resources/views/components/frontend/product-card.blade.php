@props(['product'])

<div
    class="bg-white border border-gray-200/80 hover:border-[#629D23] rounded-lg p-3 sm:p-4 flex flex-col justify-between hover:shadow-md transition-all duration-300 group relative">

    <!-- Top Image Area -->
    <div class="relative w-full h-40 sm:h-44 mb-3 flex items-center justify-center bg-white rounded-md overflow-hidden">

        <!-- Discount Ribbon Badge -->
        @if ($product->sale_price && $product->price > $product->sale_price)
            <div
                class="absolute top-0 left-2.5 z-10 bg-[#E3B04B] text-[#2C3C28] text-[12px] font-bold px-2.5 pt-2 pb-4 text-center leading-tight [clip-path:polygon(0_0,100%_0,100%_100%,50%_80%,0_100%)] drop-shadow-sm">
                {{ round((($product->price - $product->sale_price) / $product->price) * 100) }}%<br>
                <span class="font-bold text-[11px] block -mt-0.5">Off</span>
            </div>
        @endif
        
        <!-- Image -->
        <a href="#" class="w-full h-full flex items-center justify-center p-2">
            @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                    class="max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-300">
            @else
                <i class="fas fa-leaf text-4xl text-gray-200"></i>
            @endif
        </a>

        <!-- Ekomart Green Hover Action Bar -->
        <div
            class="absolute bottom-0 left-0 right-0 bg-[#629D23] rounded-t-2xl pt-3 pb-2.5 px-3 flex items-center justify-center gap-3 opacity-0 group-hover:opacity-100 transition-all duration-300 z-20">

            <!-- Wishlist Button -->
            <div class="relative group/btn">
                <!-- Hover Tooltip Popup -->
                <div
                    class="absolute -top-10 left-1/2 -translate-x-1/2 bg-[#4e7d1b] text-white text-[11px] font-semibold px-2.5 py-1 rounded shadow-md whitespace-nowrap opacity-0 group-hover/btn:opacity-100 transition-opacity duration-200 pointer-events-none z-30 after:content-[''] after:absolute after:top-full after:left-1/2 after:-translate-x-1/2 after:border-4 after:border-transparent after:border-t-[#4e7d1b]">
                    Add To Wishlist
                </div>
                <button type="button"
                    class="w-9 h-9 rounded-full border border-dashed border-white/80 text-white flex items-center justify-center hover:bg-white hover:text-[#629D23] hover:border-transparent transition-all duration-200 shadow-sm"
                    title="Add to Wishlist">
                    <i class="far fa-heart text-sm"></i>
                </button>
            </div>

            <!-- Compare Button -->
            <div class="relative group/btn">
                <!-- Hover Tooltip Popup -->
                <div
                    class="absolute -top-10 left-1/2 -translate-x-1/2 bg-[#4e7d1b] text-white text-[11px] font-semibold px-2.5 py-1 rounded shadow-md whitespace-nowrap opacity-0 group-hover/btn:opacity-100 transition-opacity duration-200 pointer-events-none z-30 after:content-[''] after:absolute after:top-full after:left-1/2 after:-translate-x-1/2 after:border-4 after:border-transparent after:border-t-[#4e7d1b]">
                    Compare
                </div>
                <button type="button"
                    class="w-9 h-9 rounded-full border border-dashed border-white/80 text-white flex items-center justify-center hover:bg-white hover:text-[#629D23] hover:border-transparent transition-all duration-200 shadow-sm"
                    title="Compare">
                    <i class="fas fa-sync-alt text-sm"></i>
                </button>
            </div>

            <!-- Quick View Button -->
            <div class="relative group/btn">
                <!-- Hover Tooltip Popup -->
                <div
                    class="absolute -top-10 left-1/2 -translate-x-1/2 bg-[#4e7d1b] text-white text-[11px] font-semibold px-2.5 py-1 rounded shadow-md whitespace-nowrap opacity-0 group-hover/btn:opacity-100 transition-opacity duration-200 pointer-events-none z-30 after:content-[''] after:absolute after:top-full after:left-1/2 after:-translate-x-1/2 after:border-4 after:border-transparent after:border-t-[#4e7d1b]">
                    Quick View
                </div>
                <button type="button" @click="openQuickView({{ json_encode($product) }})"
                    class="w-9 h-9 rounded-full border border-dashed border-white/80 text-white flex items-center justify-center hover:bg-white hover:text-[#629D23] hover:border-transparent transition-all duration-200 shadow-sm"
                    title="Quick View">
                    <i class="far fa-eye text-sm"></i>
                </button>
            </div>

        </div>
    </div>

    <!-- Product Details -->
    <div class="flex flex-col flex-grow justify-between">
        <div>
            <h4
                class="font-bold text-[#2C3C28] text-xs sm:text-sm line-clamp-2 mb-1 group-hover:text-[#629D23] transition-colors leading-snug">
                <a href="#">{{ $product->name }}</a>
            </h4>
            <p class="text-[11px] text-gray-400 mb-2">
                {{ $product->unit ?? '500g Pack' }}
            </p>
        </div>

        <!-- Price -->
        <div class="flex items-center gap-2 pt-1 border-t border-gray-50">
            <span class="text-sm sm:text-base font-bold text-[#dc2626]">
                ${{ number_format($product->sale_price ?? $product->price, 2) }}
            </span>
            @if ($product->sale_price)
                <span class="text-xs text-gray-400 line-through">
                    ${{ number_format($product->price, 2) }}
                </span>
            @endif
        </div>
    </div>

</div>
