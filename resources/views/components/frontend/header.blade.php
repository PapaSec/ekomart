<header class="w-full" x-data="{ mobileMenuOpen: false, section: null }">

    {{-- Main Top Header Bar (White Bar) --}}
    <div class="bg-white py-4 border-b border-zinc-100">
        <div class="max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between gap-6 h-16">

                {{-- Left side: logo & Mobile Menu Toggle --}}
                <div class="flex items-center gap-4">

                    <a href="{{ route('home') }}" class="flex-shrink-0 transition-opacity hover:opacity-80">
                        <img src="{{ asset('storage/logos/logo.svg') }}" 
                             alt="{{ config('app.name') }}" class="h-10 w-auto object-contain" 
                             onerror="this.style.display='none'; this.nextElementSibling.style.display='block'"/>
                        
                        <!-- Fallback Text Logo if image fails -->
                        <span class="hidden text-xl font-black text-[#629D23] tracking-tight">
                            Eko<span class="text-zinc-800">mart</span>
                        </span>
                    </a>
                </div>

                {{-- Center: Desktop Top Search Bar --}}
                <livewire:frontend.search-bar />

                {{-- Right side: Account, Wishlist & My Cart --}}
                <div class="flex items-center gap-2 sm:gap-4">
                    
                    {{-- User Account Info --}}
                    <a href="#" class="hidden sm:flex items-center gap-2 text-zinc-700 hover:text-[#629D23] transition group py-1.5">
                        <div class="p-2 rounded-full bg-zinc-50 group-hover:bg-emerald-50 transition">
                            <x-phosphor-user class="size-5 text-zinc-600 group-hover:text-[#629D23]" />
                        </div>
                        <div class="hidden lg:block text-left">
                            <span class="block text-[10px] text-zinc-400 leading-none">Sign In</span>
                            <span class="block text-xs font-semibold text-zinc-800 leading-tight">My Account</span>
                        </div>
                    </a>

                    {{-- Wishlist Icon + Count Badge --}}
                    <a href="#" class="relative p-2 rounded-full bg-zinc-50 hover:bg-emerald-50 text-zinc-600 hover:text-[#629D23] transition group">
                        <x-phosphor-heart class="size-5 text-zinc-600 group-hover:text-[#629D23]" />
                        <!-- Red Badge Indicator -->
                        <span class="absolute top-0 right-0 inline-flex items-center justify-center px-1.5 py-0.5 text-[9px] font-bold leading-none text-white transform translate-x-1/3 -translate-y-1/3 bg-red-500 rounded-full">0</span>
                    </a>

                    {{-- Dynamic Cart Summary --}}
                    <a href="#" class="flex items-center gap-2 text-zinc-700 hover:text-[#629D23] transition group py-1.5">
                        <div class="relative p-2 rounded-full bg-zinc-50 group-hover:bg-emerald-50 transition">
                            <x-phosphor-shopping-cart class="size-5 text-zinc-600 group-hover:text-[#629D23]" />
                            <!-- Theme Green Badge Indicator -->
                            <span class="absolute top-0 right-0 inline-flex items-center justify-center px-1.5 py-0.5 text-[9px] font-bold leading-none text-white transform translate-x-1/3 -translate-y-1/3 bg-[#629D23] rounded-full">0</span>
                        </div>
                        <div class="hidden lg:block text-left">
                            <span class="block text-[10px] text-zinc-400 leading-none">My Cart</span>
                            <span class="block text-xs font-semibold text-zinc-800 leading-tight">R0.00</span>
                        </div>
                    </a>
                    
                </div>

            </div>
        </div>
    </div>
</header>