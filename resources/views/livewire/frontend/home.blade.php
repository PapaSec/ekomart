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
    <section class="py-12 bg-white" x-data="{
        scroll(dir) {
            $refs.categorySlider.scrollBy({ left: dir * 300, behavior: 'smooth' });
        }
    }">
        <div class="max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Section Header with Border Line and Controls -->
            <div class="flex items-center justify-between pb-4 mb-6 border-b border-gray-200">
                <h3 class="text-2xl sm:text-3xl font-bold text-[#2C3C28]">
                    Featured Categories
                </h3>

                <div class="flex items-center gap-2">
                    <button @click="scroll(-1)" type="button"
                        class="w-9 h-9 flex items-center justify-center rounded border border-gray-300 hover:border-[#629D23] hover:text-[#629D23] transition-colors bg-white text-gray-600">
                        <i class="fas fa-chevron-left text-xs"></i>
                    </button>
                    <button @click="scroll(1)" type="button"
                        class="w-9 h-9 flex items-center justify-center rounded border border-gray-300 hover:border-[#629D23] hover:text-[#629D23] transition-colors bg-white text-gray-600">
                        <i class="fas fa-chevron-right text-xs"></i>
                    </button>
                </div>
            </div>

            <!-- Horizontal Slider Grid -->
            <div x-ref="categorySlider" class="flex gap-5 overflow-x-auto scroll-smooth pb-2 no-scrollbar"
                style="scrollbar-width: none; -ms-overflow-style: none;">
                @forelse($featuredCategories as $category)
                    <a href="{{ Route::has('shop') ? route('shop', ['category' => $category->slug]) : '#' }}"
                        class="min-w-[180px] sm:min-w-[200px] bg-[#F8F9FA] border border-gray-200/80 rounded-md p-5 flex flex-col items-center justify-between hover:shadow-md transition-all duration-300 group text-center flex-shrink-0">

                        <!-- Category Image / Icon -->
                        <div class="w-24 h-24 mb-4 flex items-center justify-center">
                            @if ($category->image)
                                <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}"
                                    class="max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-300">
                            @else
                                <i
                                    class="fas fa-leaf text-3xl text-gray-300 group-hover:text-[#629D23] transition-colors duration-300"></i>
                            @endif
                        </div>

                        <!-- Category Details -->
                        <div>
                            <h4 class="font-bold text-[#2C3C28] text-sm line-clamp-1 mb-1">
                                {{ $category->name }}
                            </h4>
                            <p class="text-[12px] font-bold text-[#629D23] uppercase tracking-wider">
                                {{ $category->products_count ?? 0 }} ITEMS
                            </p>
                        </div>
                    </a>
                @empty
                    <div class="col-span-full py-6 text-center text-gray-400">
                        No featured categories found.
                    </div>
                @endforelse
            </div>

        </div>
    </section>
    <!-- Featured Categories Section End -->


</div>
