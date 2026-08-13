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

    <!-- Weekly Best Sellers Section Start -->
    <section class="py-12 bg-[#f3f4f6]" x-data="{
        scroll(dir) {
            const container = $refs.bestSellersSlider;
            container.scrollBy({ left: dir * container.clientWidth, behavior: 'smooth' });
        }
    }">
        <div class="max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Inner White Box Container -->
            <div class="bg-white rounded-xl p-6 sm:p-8 shadow-sm border border-gray-100">

                <!-- Header Row -->
                <div class="flex items-center justify-between pb-4 mb-6 border-b border-gray-200/80">
                    <div>
                        <h3 class="text-2xl sm:text-3xl font-bold text-[#2C3C28]">
                            Weekly Best Selling Groceries
                        </h3>
                    </div>

                    <div class="flex items-center gap-2">
                        <button @click="scroll(-1)" type="button"
                            class="w-8 h-8 sm:w-9 sm:h-9 flex items-center justify-center rounded border border-gray-300 hover:border-[#629D23] hover:text-[#629D23] transition-colors bg-white text-gray-600">
                            <i class="fas fa-chevron-left text-xs"></i>
                        </button>
                        <button @click="scroll(1)" type="button"
                            class="w-8 h-8 sm:w-9 sm:h-9 flex items-center justify-center rounded border border-gray-300 hover:border-[#629D23] hover:text-[#629D23] transition-colors bg-white text-gray-600">
                            <i class="fas fa-chevron-right text-xs"></i>
                        </button>
                    </div>
                </div>

                <!-- Best Sellers Slider (5 Columns on Large Displays) -->
                <div x-ref="bestSellersSlider" class="flex gap-4 sm:gap-5 overflow-x-auto scroll-smooth no-scrollbar"
                    style="scrollbar-width: none; -ms-overflow-style: none;">

                    @forelse($bestSellers as $product)
                        <div
                            class="flex-shrink-0 w-[calc((100%-1rem)/2)] sm:w-[calc((100%-2*1.25rem)/3)] md:w-[calc((100%-3*1.25rem)/4)] lg:w-[calc((100%-4*1.25rem)/5)] bg-white border border-gray-200/80 hover:border-[#629D23] rounded-lg p-4 flex flex-col justify-between hover:shadow-lg transition-all duration-300 group">

                            <!-- Top Section: Image & Badges -->
                            <div
                                class="relative w-full h-44 mb-3 flex items-center justify-center bg-[#F8F9FA] rounded-md overflow-hidden">
                                @if ($product->sale_price)
                                    <span
                                        class="absolute top-2 left-2 bg-[#629D23] text-white text-[10px] font-bold uppercase px-2 py-0.5 rounded z-10">
                                        Sale
                                    </span>
                                @endif

                                <a href="#" class="w-full h-full flex items-center justify-center p-2">
                                    @if ($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                            class="max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-300">
                                    @else
                                        <i class="fas fa-box text-4xl text-gray-300"></i>
                                    @endif
                                </a>
                            </div>

                            <!-- Product Information -->
                            <div>
                                <!-- Category Badge -->
                                <span class="text-[11px] text-gray-400 uppercase tracking-wider block mb-1">
                                    {{ $product->category->name ?? 'Grocery' }}
                                </span>

                                <!-- Title -->
                                <h4
                                    class="font-bold text-[#2C3C28] text-sm line-clamp-2 mb-2 hover:text-[#629D23] transition-colors">
                                    <a href="#">{{ $product->name }}</a>
                                </h4>

                                <!-- Pricing -->
                                <div class="flex items-center gap-2 mb-4">
                                    <span class="text-base font-bold text-[#629D23]">
                                        ${{ number_format($product->sale_price ?? $product->price, 2) }}
                                    </span>
                                    @if ($product->sale_price)
                                        <span class="text-xs text-gray-400 line-through">
                                            ${{ number_format($product->price, 2) }}
                                        </span>
                                    @endif
                                </div>

                                <!-- Add to Cart Button -->
                                <button type="button"
                                    class="w-full bg-[#F8F9FA] hover:bg-[#629D23] text-[#2C3C28] hover:text-white border border-gray-200 hover:border-[#629D23] font-bold text-xs py-2 px-3 rounded-md transition-all duration-200 flex items-center justify-center gap-2">
                                    <i class="fas fa-shopping-basket"></i>
                                    <span>Add to Cart</span>
                                </button>
                            </div>

                        </div>
                    @empty
                        <div class="w-full py-8 text-center text-gray-400">
                            No best sellers available.
                        </div>
                    @endforelse

                </div>

            </div>

        </div>
    </section>
    <!-- Weekly Best Sellers Section End -->

</div>
