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
    <div x-data="{
        showModal: false,
        selectedProduct: null,
        modalImage: '',
        modalQty: 1,
    
        // Compare Modal State
        showCompareModal: false,
        compareItems: [],
    
        openQuickView(product) {
        this.selectedProduct = product;
        this.modalQty = 1;

        // Uses the appended first_image accessor directly
        this.modalImage = product.first_image || '/images/placeholder.png';

        this.showModal = true;
    },
    
        addToCompare(product) {
            // Prevent duplicates
            if (!this.compareItems.some(item => item.id === product.id)) {
                // Keep max 4 items for layout neatness
                if (this.compareItems.length >= 4) {
                    this.compareItems.shift();
                }
                this.compareItems.push(product);
            }
            this.showCompareModal = true;
        },
    
        removeFromCompare(index) {
            this.compareItems.splice(index, 1);
        }
    }">

        <!-- Global Cross-Browser Scrollbar Style -->
        <style>
            .no-scrollbar::-webkit-scrollbar {
                display: none;
            }

            .no-scrollbar {
                -ms-overflow-style: none;
                scrollbar-width: none;
            }
        </style>

        <!-- 1. Featured Categories Section -->
        <section class="py-10 bg-[#f3f4f6]" x-data="{
            scroll(dir) {
                const container = $refs.categorySlider;
                container.scrollBy({ left: dir * container.clientWidth, behavior: 'smooth' });
            }
        }">
            <div class="max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-white rounded-lg p-6 sm:p-8 border border-gray-100">
                    <div class="flex items-center justify-between pb-4 mb-6 border-b border-gray-200/80">
                        <h3 class="text-2xl sm:text-3xl font-bold text-[#2C3C28]">Featured Categories</h3>
                        <div class="flex items-center gap-2">
                            <button @click="scroll(-1)" type="button"
                                class="w-9 h-9 flex items-center justify-center rounded border border-gray-300 hover:border-[#629D23] hover:text-white hover:bg-[#629D23] transition-colors bg-white text-gray-600"><i
                                    class="fas fa-chevron-left text-xs"></i></button>
                            <button @click="scroll(1)" type="button"
                                class="w-9 h-9 flex items-center justify-center rounded border border-gray-300 hover:border-[#629D23] hover:text-white hover:bg-[#629D23] transition-colors bg-white text-gray-600"><i
                                    class="fas fa-chevron-right text-xs"></i></button>
                        </div>
                    </div>

                    <div x-ref="categorySlider" class="flex gap-4 lg:gap-5 overflow-x-auto scroll-smooth no-scrollbar">
                        @forelse($featuredCategories as $category)
                            <a href="{{ Route::has('shop') ? route('shop', ['category' => $category->slug]) : '#' }}"
                                class="flex-shrink-0 w-[calc((100%-1rem)/2)] sm:w-[calc((100%-2*1rem)/3)] lg:w-[calc((100%-4*1.25rem)/5)] bg-white border border-gray-200/90 hover:border-[#629D23] rounded-2xl p-2 flex flex-col hover:shadow-md transition-all duration-300 group text-center">

                                {{-- Inner Light Gray Container --}}
                                <div
                                    class="bg-[#F8F9FA] rounded-xl p-3 sm:p-4 flex flex-col items-center justify-between h-full w-full min-h-[165px]">

                                    {{-- Image / Icon (slightly scaled to fit reduced height) --}}
                                    <div class="w-16 h-16 sm:w-20 sm:h-20 my-auto flex items-center justify-center">
                                        @if ($category->image)
                                            <img src="{{ asset('storage/' . $category->image) }}"
                                                alt="{{ $category->name }}"
                                                class="max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-300">
                                        @else
                                            <i
                                                class="fas fa-leaf text-2xl text-gray-300 group-hover:text-[#629D23] transition-colors duration-300"></i>
                                        @endif
                                    </div>

                                    {{-- Category Details --}}
                                    <div class="w-full pt-1.5">
                                        <h4
                                            class="font-bold text-[#2C3C28] text-xs sm:text-sm leading-tight mb-1 line-clamp-1">
                                            {{ $category->name }}
                                        </h4>
                                        <p
                                            class="text-[11px] sm:text-[12px] font-bold text-[#629D23] uppercase tracking-wider">
                                            {{ $category->products_count ?? 0 }} ITEMS
                                        </p>
                                    </div>

                                </div>
                            </a>
                        @empty
                            <div class="w-full py-8 text-center text-gray-400">No featured categories found.</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </section>

        <!-- 2. Weekly Best Selling Groceries Section -->
        <section class="py-10 bg-[#f3f4f6]" x-data="{ activeTab: 'all' }">
            <div class="max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-white rounded-xl p-6 sm:p-8 shadow-sm border border-gray-100">
                    <div
                        class="flex flex-col md:flex-row md:items-center justify-between pb-4 mb-6 border-b border-gray-200/80 gap-4">
                        <h3 class="text-2xl sm:text-3xl font-bold text-[#2C3C28]">Weekly Best Selling Groceries</h3>
                        <div class="flex items-center gap-2 overflow-x-auto no-scrollbar pb-1">
                            <button @click="activeTab = 'all'"
                                :class="activeTab === 'all' ? 'bg-[#629D23] text-white font-semibold' :
                                    'text-gray-600 hover:text-[#629D23] font-medium'"
                                class="px-4 py-1.5 rounded-full text-sm transition-colors whitespace-nowrap">All
                                Items</button>
                            <button @click="activeTab = 'frozen'"
                                :class="activeTab === 'frozen' ? 'bg-[#629D23] text-white font-semibold' :
                                    'text-gray-600 hover:text-[#629D23] font-medium'"
                                class="px-4 py-1.5 rounded-full text-sm transition-colors whitespace-nowrap">Frozen
                                Foods</button>
                            <button @click="activeTab = 'diet'"
                                :class="activeTab === 'diet' ? 'bg-[#629D23] text-white font-semibold' :
                                    'text-gray-600 hover:text-[#629D23] font-medium'"
                                class="px-4 py-1.5 rounded-full text-sm transition-colors whitespace-nowrap">Diet
                                Foods</button>
                            <button @click="activeTab = 'healthy'"
                                :class="activeTab === 'healthy' ? 'bg-[#629D23] text-white font-semibold' :
                                    'text-gray-600 hover:text-[#629D23] font-medium'"
                                class="px-4 py-1.5 rounded-full text-sm transition-colors whitespace-nowrap">Healthy
                                Foods</button>
                            <button @click="activeTab = 'vitamin'"
                                :class="activeTab === 'vitamin' ? 'bg-[#629D23] text-white font-semibold' :
                                    'text-gray-600 hover:text-[#629D23] font-medium'"
                                class="px-4 py-1.5 rounded-full text-sm transition-colors whitespace-nowrap">Vitamin
                                Items</button>
                        </div>
                    </div>

                    <!-- Product Grid -->
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
                        @forelse($bestSellers as $product)
                            <x-frontend.product-card :product="$product" />
                        @empty
                            <div class="col-span-full py-8 text-center text-gray-400">No products found.</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </section>

        <!-- Quick View Modal Component -->
        <x-frontend.quick-view-modal />

        <!-- Compare Products Modal Component -->
        <x-frontend.compare-modal />

    </div>


</div>
