@props(['product'])

<div class="bg-white border border-gray-200/80 hover:border-[#629D23] rounded-lg p-3 sm:p-4 flex flex-col justify-between hover:shadow-md transition-all duration-300 group relative">
    
    <!-- Top Image Area -->
    <div class="relative w-full h-40 sm:h-44 mb-3 flex items-center justify-center bg-white rounded-md overflow-hidden">
        
        <!-- Discount Badge -->
        @if($product->sale_price && $product->price > $product->sale_price)
            <div class="absolute top-0 left-2 z-10 bg-[#e3a029] text-white text-[10px] font-bold px-1.5 py-1 rounded-b text-center shadow-sm">
                {{ round((($product->price - $product->sale_price) / $product->price) * 100) }}%<br>Off
            </div>
        @endif

        <!-- Image -->
        <a href="#" class="w-full h-full flex items-center justify-center p-2">
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                     class="max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-300">
            @else
                <i class="fas fa-leaf text-4xl text-gray-200"></i>
            @endif
        </a>

        <!-- Hover Action Bar -->
        <div class="absolute bottom-2 left-1/2 -translate-x-1/2 bg-[#629D23] rounded-full px-3 py-1.5 flex items-center gap-3 opacity-0 group-hover:opacity-100 transition-all duration-300 shadow-md text-white z-20">
            <button type="button" class="hover:text-amber-200 transition-colors" title="Add to Wishlist">
                <i class="far fa-heart text-xs"></i>
            </button>
            <button type="button" class="hover:text-amber-200 transition-colors" title="Compare">
                <i class="fas fa-sync-alt text-xs"></i>
            </button>
            <button type="button" 
                    @click="openQuickView({{ json_encode($product) }})" 
                    class="hover:text-amber-200 transition-colors" title="Quick View">
                <i class="far fa-eye text-xs"></i>
            </button>
        </div>
    </div>

    <!-- Product Details -->
    <div class="flex flex-col flex-grow justify-between">
        <div>
            <h4 class="font-bold text-[#2C3C28] text-xs sm:text-sm line-clamp-2 mb-1 group-hover:text-[#629D23] transition-colors leading-snug">
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
            @if($product->sale_price)
                <span class="text-xs text-gray-400 line-through">
                    ${{ number_format($product->price, 2) }}
                </span>
            @endif
        </div>
    </div>

</div>