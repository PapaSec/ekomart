<div x-show="showModal" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60" x-cloak>

    <div @click.away="showModal = false"
        class="bg-white rounded-xl max-w-4xl w-full p-6 sm:p-8 relative shadow-2xl overflow-hidden max-h-[90vh] overflow-y-auto">

        <!-- Close Button -->
        <button @click="showModal = false" type="button"
            class="absolute top-4 right-4 w-9 h-9 bg-gray-100 hover:bg-gray-200 text-gray-600 rounded-full flex items-center justify-center transition-colors z-10">
            <i class="fas fa-times text-sm"></i>
        </button>

        <template x-if="selectedProduct">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">

                <!-- Modal Left: Main Image & Gallery Thumbnails -->
                <div>
                    <div
                        class="w-full h-72 sm:h-80 border border-gray-100 rounded-xl p-4 flex items-center justify-center bg-[#ffffff] mb-3">
                        <img :src="modalImage" :alt="selectedProduct.name"
                            class="max-h-full max-w-full object-contain">
                    </div>

                    <!-- Gallery Thumbnails (if array exists) -->
                    <template x-if="selectedProduct.images && selectedProduct.images.length > 0">
                        <div class="flex items-center gap-2 overflow-x-auto pb-2">
                            <!-- Main Featured Image Thumbnail -->
                            <button type="button"
                                @click="modalImage = selectedProduct.featured_image ? '/storage/' + selectedProduct.featured_image : '/images/placeholder.png'"
                                class="w-14 h-14 border rounded-lg p-1 flex items-center justify-center bg-white flex-shrink-0 hover:border-[#629D23]"
                                :class="{ 'border-[#629D23] ring-1 ring-[#629D23]': modalImage === ('/storage/' +
                                        selectedProduct.featured_image) }">
                                <img :src="selectedProduct.featured_image ? '/storage/' + selectedProduct.featured_image :
                                    '/images/placeholder.png'"
                                    class="max-h-full max-w-full object-contain">
                            </button>

                            <!-- Extra Gallery Thumbnails -->
                            <template x-for="(img, index) in selectedProduct.images" :key="index">
                                <button type="button" @click="modalImage = '/storage/' + img"
                                    class="w-14 h-14 border rounded-lg p-1 flex items-center justify-center bg-white flex-shrink-0 hover:border-[#629D23]"
                                    :class="{ 'border-[#629D23] ring-1 ring-[#629D23]': modalImage === ('/storage/' + img) }">
                                    <img :src="'/storage/' + img" class="max-h-full max-w-full object-contain">
                                </button>
                            </template>
                        </div>
                    </template>
                </div>

                <!-- Modal Right: Product Details -->
                <div>
                    <div class="flex items-center gap-3 mb-2 flex-wrap">
                        <!-- Category Badge -->
                        <span class="bg-[#629D23] text-white text-[10px] font-bold px-2 py-0.5 rounded uppercase"
                            x-text="selectedProduct.category ? selectedProduct.category.name : 'General'">
                        </span>

                        <!-- Dynamic Rating & Reviews Count -->
                        <div class="flex items-center text-amber-400 text-xs">
                            <i class="fas fa-star"></i>
                            <span class="font-bold text-gray-700 ml-1"
                                x-text="parseFloat(selectedProduct.rating ?? 0).toFixed(1)"></span>
                            <span class="text-gray-400 text-xs ml-2"
                                x-text="'(' + (selectedProduct.reviews_count ?? 0) + ' Reviews)'"></span>
                        </div>
                    </div>

                    <h2 class="text-xl sm:text-2xl font-bold text-[#2C3C28] mb-2" x-text="selectedProduct.name"></h2>

                    <!-- Dynamic Stock Status Badge -->
                    <div class="mb-4">
                        <template x-if="selectedProduct.in_stock && selectedProduct.stock > 0">
                            <span
                                class="inline-block border border-green-200 bg-green-50 text-[#629D23] text-[11px] font-bold px-2.5 py-0.5 rounded">
                                In Stock (<span x-text="selectedProduct.stock"></span> available)
                            </span>
                        </template>
                        <template x-if="!selectedProduct.in_stock || selectedProduct.stock <= 0">
                            <span
                                class="inline-block border border-red-200 bg-red-50 text-red-600 text-[11px] font-bold px-2.5 py-0.5 rounded">
                                Out of Stock
                            </span>
                        </template>
                    </div>

                    <!-- Price Block -->
                    <div class="flex items-center gap-3 mb-4">
                        <span class="text-2xl font-bold text-[#629D23]"
                            x-text="'$' + (selectedProduct.sale_price ? parseFloat(selectedProduct.sale_price).toFixed(2) : parseFloat(selectedProduct.price ?? 0).toFixed(2))">
                        </span>
                        <span class="text-sm text-gray-400 line-through"
                            x-show="selectedProduct.sale_price && parseFloat(selectedProduct.sale_price) < parseFloat(selectedProduct.price)"
                            x-text="'$' + parseFloat(selectedProduct.price ?? 0).toFixed(2)">
                        </span>
                    </div>

                    <!-- Short Description / Fallback -->
                    <p class="text-xs sm:text-sm text-gray-500 leading-relaxed mb-6"
                        x-text="selectedProduct.short_description || selectedProduct.description || 'High quality product available at the best price.'">
                    </p>

                    <!-- Add to Cart / Quantity Selector -->
                    <div class="flex items-center gap-3 mb-6">
                        <div class="flex items-center border border-gray-200 rounded-lg overflow-hidden bg-white">
                            <button type="button" @click="if(modalQty > 1) modalQty--"
                                class="px-3 py-2 text-gray-500 hover:bg-gray-100">-</button>
                            <span class="px-3 py-2 font-bold text-sm text-[#2C3C28]"
                                x-text="modalQty < 10 ? '0' + modalQty : modalQty"></span>
                            <button type="button" @click="modalQty++"
                                class="px-3 py-2 text-gray-500 hover:bg-gray-100">+</button>
                        </div>

                        <button type="button" :disabled="!selectedProduct.in_stock || selectedProduct.stock <= 0"
                            class="bg-[#629D23] hover:bg-[#52841d] disabled:bg-gray-300 disabled:cursor-not-allowed text-white font-bold text-xs sm:text-sm px-6 py-2.5 rounded-lg transition-colors flex items-center gap-2">
                            <i class="fas fa-shopping-cart"></i>
                            <span>Add To Cart</span>
                        </button>
                    </div>

                    <!-- Product Metadata Block -->
                    <div class="border-t border-gray-100 pt-4 text-xs text-gray-500 space-y-1.5">
                        <p><strong class="text-gray-700">SKU:</strong> <span
                                x-text="selectedProduct.sku || 'N/A'"></span></p>
                        <p><strong class="text-gray-700">Category:</strong> <span
                                x-text="selectedProduct.category ? selectedProduct.category.name : 'N/A'"></span></p>
                        <p x-show="selectedProduct.brand"><strong class="text-gray-700">Brand:</strong> <span
                                x-text="selectedProduct.brand ? selectedProduct.brand.name : ''"></span></p>
                        <p x-show="selectedProduct.vendor"><strong class="text-gray-700">Vendor:</strong> <span
                                x-text="selectedProduct.vendor ? selectedProduct.vendor.name : ''"></span></p>
                        <p x-show="selectedProduct.unit"><strong class="text-gray-700">Unit:</strong> <span
                                x-text="selectedProduct.unit"></span></p>
                        <p x-show="selectedProduct.shelf_life"><strong class="text-gray-700">Shelf Life:</strong> <span
                                x-text="selectedProduct.shelf_life"></span></p>
                    </div>
                </div>

            </div>
        </template>
    </div>
</div>
