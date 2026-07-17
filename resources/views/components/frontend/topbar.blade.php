<div class="bg-[#629D23] border-b border-white/10 text-white text-xs py-2 relative z-50">
    <div class="max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-2">

            {{-- Left Side: Quick Navigation --}}
            <div class="flex items-center justify-center md:justify-start gap-4">
                <a href="#" class="flex items-center gap-1.5 text-white/90 hover:text-white transition font-medium">
                    <x-phosphor-map-pin class="size-3.5 text-white/80" />
                    <span>Find Store</span>
                </a>

                <div class="w-px h-3 bg-white/20"></div>

                <a href="#" class="flex items-center gap-1.5 text-white/90 hover:text-white transition font-medium">
                    <x-phosphor-headset class="size-3.5 text-white/80" />
                    <span>Support</span>
                </a>
            </div>

            {{-- Center: Dynamic Promo Bar --}}
            <div class="hidden lg:flex items-center justify-center text-center">
                <p class="font-medium text-white/90">
                    Super discount active! Save up to <span class="text-yellow-300 font-bold">50% off</span> on fresh greens!
                </p>
            </div>

            {{-- Right Side: User Utilities & Selectors --}}
            <div class="flex items-center justify-center md:justify-end gap-4">
                <a href="#" class="flex items-center gap-1.5 text-white/90 hover:text-white transition font-medium">
                    <x-phosphor-truck class="size-3.5 text-white/80" />
                    <span>Track Order</span>
                </a>

                <div class="w-px h-3 bg-white/20"></div>

                <div class="flex items-center gap-1 cursor-pointer text-white/90 hover:text-white transition font-medium">
                    <span>English</span>
                    <x-phosphor-caret-down class="size-3 text-white/70" />
                </div>

                <div class="flex items-center gap-1 cursor-pointer text-white/90 hover:text-white transition font-medium">
                    <span>ZAR</span>
                    <x-phosphor-caret-down class="size-3 text-white/70" />
                </div>
            </div>

        </div>
    </div>
</div>