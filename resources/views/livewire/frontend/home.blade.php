<!-- Hero Banner Section Start -->
<div class="rts-hero-area relative overflow-hidden py-12 lg:py-16" 
     style="background-image: url('{{ asset('assets/images/banner/04.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center min-h-[450px]">
            
            <!-- Left Side: Text Content -->
            <div class="lg:col-span-7 z-10">
                <!-- Subtitle -->
                <span class="text-sm font-medium text-gray-800 tracking-wide block mb-3">
                    Get up to -30% off on your purchase
                </span>

                <!-- Main Title -->
                <h1 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold text-gray-900 leading-tight mb-4">
                    Buy From Different Kind <br class="hidden sm:inline"> of Grocery Store
                </h1>

                <!-- Tagline -->
                <p class="text-base text-gray-800 font-medium mb-8">
                    Don't miss these opportunities...
                </p>

                <!-- Action Row -->
                <div class="flex items-center flex-wrap gap-6">
                    <!-- Shop Now Button -->
                    <a href="#" class="inline-flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white font-semibold px-7 py-3.5 rounded-lg transition-all shadow-sm">
                        <span>Shop Now</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>

                    <!-- Price Tag -->
                    <div class="flex items-baseline gap-1.5">
                        <span class="text-sm text-gray-700 font-medium">from</span>
                        <span class="text-3xl sm:text-4xl font-extrabold text-gray-900">$80.99</span>
                    </div>
                </div>
            </div>

            <!-- Right Side: 01.png Person Image -->
            <div class="lg:col-span-5 relative flex justify-center lg:justify-end">
                <img src="{{ asset('assets/images/banner/01.png') }}" 
                     alt="Buy From Different Kind of Grocery Store" 
                     class="w-full max-w-md h-auto object-contain relative z-10">
            </div>

        </div>
    </div>
</div>
<!-- Hero Banner Section End -->