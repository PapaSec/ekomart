<div x-show="showModal" 
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm"
     x-cloak>

    <div @click.away="showModal = false"
         class="bg-white rounded-2xl max-w-4xl w-full p-6 sm:p-8 relative shadow-2xl overflow-hidden max-h-[90vh] overflow-y-auto">

        <!-- Close Button -->
        <button @click="showModal = false" type="button"
                class="absolute top-4 right-4 w-9 h-9 bg-gray-100 hover:bg-gray-200 text-gray-600 rounded-full flex items-center justify-center transition-colors">
            <i class="fas fa-times text-sm"></i>
        </button>

        <template x-if="selectedProduct">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">

                <!-- Modal Left: Image -->
                <div>
                    <div class="w-full h-72 sm:h-80 border border-gray-100 rounded-xl p-4 flex items-center justify-center bg-[#f8f9fa] mb-4">
                        <img :src="modalImage" :alt="selectedProduct.name" class="max-h-full max-w-full object-contain">
                    </div>
                </div>

                <!-- Modal Right: Details -->
                <div>
                    <div class="flex items-center gap-3 mb-2">
                        <span class="bg-[#629D23] text-white text-[10px] font-bold px-2 py-0.5 rounded uppercase"
                              x-text="selectedProduct.category ? selectedProduct.category.name : 'Grocery'">
                        </span>
                        <div class="flex items-center text-amber-400 text-xs">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <span class="text-gray-400 text-xs ml-2">10 Reviews</span>
                        </div>
                    </div>

                    <h2 class="text-xl sm:text-2xl font-bold text-[#2C3C28] mb-2" x-text="selectedProduct.name"></h2>

                    <span class="inline-block border border-green-200 bg-green-50 text-[#629D23] text-[11px] font-bold px-2 py-0.5 rounded mb-4">
                        In Stock
                    </span>

                    <div class="flex items-center gap-3 mb-4">
                        <span class="text-2xl font-bold text-[#629D23]" 
                              x-text="'$' + (selectedProduct.sale_price ? parseFloat(selectedProduct.sale_price).toFixed(2) : parseFloat(selectedProduct.price ?? 0).toFixed(2))">
                        </span>
                        <span class="text-sm text-gray-400 line-through" 
                              x-show="selectedProduct.sale_price"
                              x-text="'$' + parseFloat(selectedProduct.price ?? 0).toFixed(2)">
                        </span>
                    </div>

                    <p class="text-xs sm:text-sm text-gray-500 leading-relaxed mb-6" 
                       x-text="selectedProduct.description ?? 'High quality organic grocery item brought directly from certified suppliers.'">
                    </p>

                    <!-- Actions -->
                    <div class="flex items-center gap-3 mb-6">
                        <div class="flex items-center border border-gray-200 rounded-lg overflow-hidden bg-white">
                            <button @click="if(modalQty > 1) modalQty--" class="px-3 py-2 text-gray-500 hover:bg-gray-100">-</button>
                            <span class="px-3 py-2 font-bold text-sm text-[#2C3C28]" x-text="modalQty < 10 ? '0' + modalQty : modalQty"></span>
                            <button @click="modalQty++" class="px-3 py-2 text-gray-500 hover:bg-gray-100">+</button>
                        </div>

                        <button type="button" class="bg-[#629D23] hover:bg-[#52841d] text-white font-bold text-xs sm:text-sm px-6 py-2.5 rounded-lg transition-colors flex items-center gap-2">
                            <i class="fas fa-shopping-cart"></i>
                            <span>Add To Cart</span>
                        </button>
                    </div>

                    <div class="border-t border-gray-100 pt-4 text-xs text-gray-500 space-y-1">
                        <p><strong class="text-gray-700">SKU:</strong> <span x-text="selectedProduct.sku ?? 'N/A'"></span></p>
                        <p><strong class="text-gray-700">Category:</strong> <span x-text="selectedProduct.category ? selectedProduct.category.name : 'Groceries'"></span></p>
                    </div>
                </div>

            </div>
        </template>
    </div>
</div>