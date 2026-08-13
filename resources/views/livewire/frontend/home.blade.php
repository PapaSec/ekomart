<div class="bg-gray-50">

    <!-- Hero Banner Section Start -->
    <div class="rts-hero-area relative overflow-hidden pt-12 lg:pt-16 pb-0"
        style="background-image: url('{{ asset('storage/banner/04.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">

        <!-- Wide Screen Container -->
        <div class="max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-end min-h-[480px]">

                <!-- Left Side: Text Content -->
                <div class="lg:col-span-7 z-10 pb-12 lg:pb-16">
                    <!-- Subtitle -->
                    <span class="text-sm font-semibold text-[#2C3C28] tracking-wide block mb-3">
                        Get up to -30% off on your purchase
                    </span>

                    <!-- Main Title -->
                    <h1 class="text-3xl sm:text-5xl lg:text-6xl font-bold text-[#2C3C28] leading-tight mb-4">
                        Buy From Different Kind <br class="hidden sm:inline"> of Grocery Store
                    </h1>

                    <!-- Tagline -->
                    <p class="text-base text-[#2C3C28] font-medium mb-8">
                        Don't miss these opportunities...
                    </p>

                    <div class="flex items-center flex-wrap gap-6">
                        <!-- Shop Now Button -->
                        <a href="#"
                            class="inline-flex items-center gap-2 bg-[#629D23] hover:bg-[#2C3C28] text-white font-bold px-7 py-3.5 rounded-lg transition-all    duration-300">
                            <span>Shop Now</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>

                        <!-- Price Tag -->
                        <div class="flex items-baseline gap-1.5">
                            <span class="text-sm text-[#2C3C28] font-medium">from</span>
                            <span class="text-3xl sm:text-4xl font-bold text-[#2C3C28]">$80.99</span>
                        </div>
                    </div>
                </div>

                <!-- Right Side: Cutout Person Image (Anchored flush to the bottom edge) -->
                <div class="lg:col-span-5 relative flex justify-center lg:justify-end items-end self-end">
                    <img src="{{ asset('storage/banner/01.png') }}" alt="Buy From Different Kind of Grocery Store"
                        class="w-full max-w-md lg:max-w-lg h-auto object-contain relative z-10 -mb-1 block">
                </div>

            </div>
        </div>
    </div>
    <!-- Hero Banner Section End -->

    <!-- Featured Categories Section Start -->
    <section class="py-10 bg-[#f3f4f6]" x-data="{
        scroll(dir) {
            const container = $refs.categorySlider;
            container.scrollBy({ left: dir * container.clientWidth, behavior: 'smooth' });
        }
    }">
        <div class="max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Inner White Box Container -->
            <div class="bg-white rounded-lg p-6 sm:p-8 border border-gray-100">

                <!-- Section Header with Border Line and Controls -->
                <div class="flex items-center justify-between pb-4 mb-6 border-b border-gray-200/80">
                    <h3 class="text-2xl sm:text-3xl font-bold text-[#2C3C28]">
                        Featured Categories
                    </h3>

                    <div class="flex items-center gap-2">
                        <button @click="scroll(-1)" type="button"
                            class="w-8 h-8 sm:w-9 sm:h-9 flex items-center justify-center rounded border border-gray-300 hover:border-[#629D23] hover:text-white hover:bg-[#629D23] transition-colors bg-white text-gray-600">
                            <i class="fas fa-chevron-left text-xs"></i>
                        </button>
                        <button @click="scroll(1)" type="button"
                            class="w-8 h-8 sm:w-9 sm:h-9 flex items-center justify-center rounded border border-gray-300 hover:border-[#629D23] hover:text-white hover:bg-[#629D23] transition-colors bg-white text-gray-600">
                            <i class="fas fa-chevron-right text-xs"></i>
                        </button>
                    </div>
                </div>

                <!-- Horizontal Slider (Strict 6 Columns on Desktop) -->
                <div x-ref="categorySlider" class="flex gap-4 lg:gap-5 overflow-x-auto scroll-smooth no-scrollbar"
                    style="scrollbar-width: none; -ms-overflow-style: none;">

                    @forelse($featuredCategories as $category)
                        <a href="{{ Route::has('shop') ? route('shop', ['category' => $category->slug]) : '#' }}"
                            class="flex-shrink-0 w-[calc((100%-1rem)/2)] sm:w-[calc((100%-2*1rem)/3)] lg:w-[calc((100%-5*1.25rem)/6)] bg-[#F8F9FA] border border-gray-200/80 hover:border-[#629D23] rounded-lg p-5 flex flex-col items-center justify-between hover:shadow-md transition-all duration-300 group text-center min-h-[190px]">

                            <!-- Category Image / Icon -->
                            <div class="w-20 h-20 sm:w-24 sm:h-24 my-auto flex items-center justify-center">
                                @if ($category->image)
                                    <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}"
                                        class="max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-300">
                                @else
                                    <i
                                        class="fas fa-leaf text-3xl text-gray-300 group-hover:text-[#629D23] transition-colors duration-300"></i>
                                @endif
                            </div>

                            <!-- Category Details -->
                            <div class="w-full pt-2">
                                <h4 class="font-bold text-[#2C3C28] text-xs sm:text-sm line-clamp-1 mb-1">
                                    {{ $category->name }}
                                </h4>
                                <p class="text-[11px] sm:text-[12px] font-bold text-[#629D23] uppercase tracking-wider">
                                    {{ $category->products_count ?? 0 }} ITEMS
                                </p>
                            </div>
                        </a>
                    @empty
                        <div class="w-full py-8 text-center text-gray-400">
                            No featured categories found.
                        </div>
                    @endforelse

                </div>

            </div>

        </div>
    </section>
    <!-- Featured Categories Section End -->

    <!-- Weekly Best Selling Groceries Section Start -->
    <section class="py-10 bg-[#f3f4f6]" x-data="{
        activeTab: 'all',
        showModal: false,
        selectedProduct: null,
        modalImage: '',
        modalQty: 1,
    
        openQuickView(product) {
            this.selectedProduct = product;
            this.modalImage = product.image ? '{{ asset('storage') }}/' + product.image : '';
            this.modalQty = 1;
            this.showModal = true;
        }
    }">
        <div class="max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Outer White Box Container -->
            <div class="bg-white rounded-xl p-6 sm:p-8 shadow-sm border border-gray-100">

                <!-- Header Row with Category Filter Tabs -->
                <div
                    class="flex flex-col md:flex-row md:items-center justify-between pb-4 mb-6 border-b border-gray-200/80 gap-4">
                    <h3 class="text-2xl sm:text-3xl font-bold text-[#2C3C28]">
                        Weekly Best Selling Groceries
                    </h3>

                    <!-- Category Tabs -->
                    <div class="flex items-center gap-2 overflow-x-auto no-scrollbar pb-1">
                        <button @click="activeTab = 'all'"
                            :class="activeTab === 'all' ? 'bg-[#629D23] text-white font-semibold' :
                                'text-gray-600 hover:text-[#629D23] font-medium'"
                            class="px-4 py-1.5 rounded-full text-xs transition-colors whitespace-nowrap">
                            All Items
                        </button>
                        <button @click="activeTab = 'frozen'"
                            :class="activeTab === 'frozen' ? 'bg-[#629D23] text-white font-semibold' :
                                'text-gray-600 hover:text-[#629D23] font-medium'"
                            class="px-4 py-1.5 rounded-full text-xs transition-colors whitespace-nowrap">
                            Frozen Foods
                        </button>
                        <button @click="activeTab = 'diet'"
                            :class="activeTab === 'diet' ? 'bg-[#629D23] text-white font-semibold' :
                                'text-gray-600 hover:text-[#629D23] font-medium'"
                            class="px-4 py-1.5 rounded-full text-xs transition-colors whitespace-nowrap">
                            Diet Foods
                        </button>
                        <button @click="activeTab = 'healthy'"
                            :class="activeTab === 'healthy' ? 'bg-[#629D23] text-white font-semibold' :
                                'text-gray-600 hover:text-[#629D23] font-medium'"
                            class="px-4 py-1.5 rounded-full text-xs transition-colors whitespace-nowrap">
                            Healthy Foods
                        </button>
                        <button @click="activeTab = 'vitamin'"
                            :class="activeTab === 'vitamin' ? 'bg-[#629D23] text-white font-semibold' :
                                'text-gray-600 hover:text-[#629D23] font-medium'"
                            class="px-4 py-1.5 rounded-full text-xs transition-colors whitespace-nowrap">
                            Vitamin Items
                        </button>
                    </div>
                </div>

                <!-- Product Grid (6 Columns on Large Screens) -->
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
                    @forelse($bestSellers as $product)
                        <div
                            class="bg-white border border-gray-200/80 hover:border-[#629D23] rounded-lg p-3 sm:p-4 flex flex-col justify-between hover:shadow-md transition-all duration-300 group relative">

                            <!-- Top Image Area -->
                            <div
                                class="relative w-full h-40 sm:h-44 mb-3 flex items-center justify-center bg-white rounded-md overflow-hidden">

                                <!-- Gold Ribbon Discount Badge -->
                                @if ($product->sale_price || rand(0, 1))
                                    <div
                                        class="absolute top-0 left-2 z-10 bg-[#e3a029] text-white text-[10px] font-bold px-1.5 py-1 rounded-b text-center shadow-sm">
                                        25%<br>Off
                                    </div>
                                @endif

                                <!-- Product Thumbnail Image -->
                                <a href="#" class="w-full h-full flex items-center justify-center p-2">
                                    @if ($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                            class="max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-300">
                                    @else
                                        <i class="fas fa-leaf text-4xl text-gray-200"></i>
                                    @endif
                                </a>

                                <!-- Green Hover Action Bar (Wishlist, Compare, Quick View) -->
                                <div
                                    class="absolute bottom-2 left-1/2 -translate-x-1/2 bg-[#629D23] rounded-full px-3 py-1.5 flex items-center gap-3 opacity-0 group-hover:opacity-100 transition-all duration-300 shadow-md text-white z-20">
                                    <button type="button" class="hover:text-amber-200 transition-colors"
                                        title="Add to Wishlist">
                                        <i class="far fa-heart text-xs"></i>
                                    </button>
                                    <button type="button" class="hover:text-amber-200 transition-colors"
                                        title="Compare">
                                        <i class="fas fa-sync-alt text-xs"></i>
                                    </button>
                                    <button type="button" @click="openQuickView({{ json_encode($product) }})"
                                        class="hover:text-amber-200 transition-colors" title="Quick View">
                                        <i class="far fa-eye text-xs"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Product Information -->
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

                                <!-- Pricing (Red Active Price + Strikethrough) -->
                                <div class="flex items-center gap-2 pt-1 border-t border-gray-50">
                                    <span class="text-sm sm:text-base font-bold text-[#dc2626]">
                                        ${{ number_format($product->sale_price ?? ($product->price ?? 36), 2) }}
                                    </span>
                                    <span class="text-xs text-gray-400 line-through">
                                        ${{ number_format($product->price ?? 36, 2) }}
                                    </span>
                                </div>
                            </div>

                        </div>
                    @empty
                        <div class="col-span-full py-8 text-center text-gray-400">
                            No products found in this section.
                        </div>
                    @endforelse
                </div>

            </div>

        </div>

        <!-- Quick View Modal Overlay -->
        <div x-show="showModal" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm" x-cloak>

            <!-- Modal Card Content -->
            <div @click.away="showModal = false"
                class="bg-white rounded-2xl max-w-4xl w-full p-6 sm:p-8 relative shadow-2xl overflow-hidden max-h-[90vh] overflow-y-auto">

                <!-- Close Button (X) -->
                <button @click="showModal = false" type="button"
                    class="absolute top-4 right-4 w-9 h-9 bg-gray-100 hover:bg-gray-200 text-gray-600 rounded-full flex items-center justify-center transition-colors">
                    <i class="fas fa-times text-sm"></i>
                </button>

                <template x-if="selectedProduct">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">

                        <!-- Modal Left: Image & Thumbnails -->
                        <div>
                            <div
                                class="w-full h-72 sm:h-80 border border-gray-100 rounded-xl p-4 flex items-center justify-center bg-[#f8f9fa] mb-4">
                                <img :src="modalImage" :alt="selectedProduct.name"
                                    class="max-h-full max-w-full object-contain">
                            </div>

                            <!-- Thumbnail Row -->
                            <div class="flex items-center gap-3">
                                <button
                                    @click="modalImage = selectedProduct.image ? '{{ asset('storage') }}/' + selectedProduct.image : ''"
                                    class="w-16 h-16 border rounded-lg p-1 bg-[#f8f9fa] hover:border-[#629D23]">
                                    <img :src="selectedProduct.image ? '{{ asset('storage') }}/' + selectedProduct.image : ''"
                                        class="w-full h-full object-contain">
                                </button>
                            </div>
                        </div>

                        <!-- Modal Right: Product Details -->
                        <div>
                            <!-- Category Badge & Ratings -->
                            <div class="flex items-center gap-3 mb-2">
                                <span
                                    class="bg-[#629D23] text-white text-[10px] font-bold px-2 py-0.5 rounded uppercase"
                                    x-text="selectedProduct.category ? selectedProduct.category.name : 'Grocery'">
                                </span>
                                <div class="flex items-center text-amber-400 text-xs">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <i class="far fa-star"></i>
                                    <span class="text-gray-400 text-xs ml-2">10 Reviews</span>
                                </div>
                            </div>

                            <!-- Title -->
                            <h2 class="text-xl sm:text-2xl font-bold text-[#2C3C28] mb-2"
                                x-text="selectedProduct.name"></h2>

                            <!-- In Stock Tag -->
                            <span
                                class="inline-block border border-green-200 bg-green-50 text-[#629D23] text-[11px] font-bold px-2 py-0.5 rounded mb-4">
                                In Stock
                            </span>

                            <!-- Price Section -->
                            <div class="flex items-center gap-3 mb-4">
                                <span class="text-sm text-gray-400 line-through" x-show="selectedProduct.sale_price"
                                    x-text="'$' + (selectedProduct.price ? parseFloat(selectedProduct.price).toFixed(2) : '36.00')">
                                </span>
                                <span class="text-2xl font-bold text-[#629D23]"
                                    x-text="'$' + (selectedProduct.sale_price ? parseFloat(selectedProduct.sale_price).toFixed(2) : (selectedProduct.price ? parseFloat(selectedProduct.price).toFixed(2) : '36.00'))">
                                </span>
                            </div>

                            <!-- Description -->
                            <p class="text-xs sm:text-sm text-gray-500 leading-relaxed mb-6"
                                x-text="selectedProduct.description ?? 'High quality organic grocery item brought directly from certified suppliers. Fresh, natural, and full of nutritious benefits for your daily diet.'">
                            </p>

                            <!-- Quantity & Add to Cart Row -->
                            <div class="flex items-center gap-3 mb-6">
                                <!-- Qty Control -->
                                <div
                                    class="flex items-center border border-gray-200 rounded-lg overflow-hidden bg-white">
                                    <button @click="if(modalQty > 1) modalQty--"
                                        class="px-3 py-2 text-gray-500 hover:bg-gray-100">-</button>
                                    <span class="px-3 py-2 font-bold text-sm text-[#2C3C28]"
                                        x-text="modalQty < 10 ? '0' + modalQty : modalQty"></span>
                                    <button @click="modalQty++"
                                        class="px-3 py-2 text-gray-500 hover:bg-gray-100">+</button>
                                </div>

                                <!-- Add to Cart -->
                                <button type="button"
                                    class="bg-[#629D23] hover:bg-[#52841d] text-white font-bold text-xs sm:text-sm px-6 py-2.5 rounded-lg transition-colors flex items-center gap-2">
                                    <i class="fas fa-shopping-cart"></i>
                                    <span>Add To Cart</span>
                                </button>

                                <!-- Wishlist -->
                                <button type="button"
                                    class="bg-[#629D23] hover:bg-[#52841d] text-white w-10 h-10 rounded-lg flex items-center justify-center transition-colors">
                                    <i class="far fa-heart text-sm"></i>
                                </button>
                            </div>

                            <!-- Product Meta Info -->
                            <div class="border-t border-gray-100 pt-4 text-xs text-gray-500 space-y-1">
                                <p><strong class="text-gray-700">SKU:</strong> <span
                                        x-text="selectedProduct.sku ?? 'BD100MX8SJ'"></span></p>
                                <p><strong class="text-gray-700">Category:</strong> <span
                                        x-text="selectedProduct.category ? selectedProduct.category.name : 'Groceries'"></span>
                                </p>
                                <p><strong class="text-gray-700">Tags:</strong> Fresh, Organic, Healthy</p>
                            </div>

                        </div>
                    </div>
                </template>

            </div>
        </div>

    </section>
    <!-- Weekly Best Selling Groceries Section End -->

</div>
