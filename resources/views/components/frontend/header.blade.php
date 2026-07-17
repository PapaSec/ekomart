<header class="w-full" x-data="{ mobileMenuOpen: false, section: null }">

    {{-- Main Top Header Bar (White Bar) --}}
    <div class="bg-white py-4 border-b border-zinc-100">
        <div class="max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between gap-6 h-16">

                {{-- Left side: logo & Mobile Menu Toggle --}}
                <div class="flex items-center gap-4">

                    <a href="{{ route('home') }}" class="flex-shrink-0 transition-opacity hover:opacity-80">
                        <img src="{{ asset('storage/logos/logo.svg') }}" alt="{{ config('app.name') }}"
                            class="h-10 w-auto object-contain"
                            onerror="this.style.display='none'; this.nextElementSibling.style.display='block'" />

                        <!-- Fallback Text Logo if image fails -->
                        <span class="hidden text-xl font-black text-[#629D23] tracking-tight">
                            Eko<span class="text-zinc-800">mart</span>
                        </span>
                    </a>
                </div>

                <!-- The Location Box Shell (Fixed Width) -->
                <div
                    class="w-44 h-12 bg-white border border-gray-200 rounded-[6px] flex items-center cursor-pointer hover:border-[#629D23] transition-colors group">

                    {{-- Left: Icon Area with vertical divider divider --}}
                    <div class="h-full px-3 flex items-center justify-center border-r border-gray-200">
                        <x-phosphor-map-pin class="size-5 text-gray-400 group-hover:text-[#629D23] transition-colors" />
                    </div>

                    {{-- Right: Stacked Typography --}}
                    <div class="flex flex-col justify-center text-left pl-3 pr-2 select-none">
                        <span class="text-[10px] font-medium text-gray-400 tracking-wide leading-tight">Your
                            location</span>
                        <span class="text-xs font-bold text-gray-800 tracking-tight leading-tight mt-0.5">Select
                            Location</span>
                    </div>

                </div>

                {{-- Center: Desktop Top Search Bar --}}
                <livewire:frontend.search-bar />

                {{-- Right side: Account, Wishlist & My Cart --}}
                <div class="flex items-center gap-2 sm:gap-4">

                    {{-- User Account Info --}}
                    <a href="#"
                        class="hidden sm:flex items-center gap-2 text-zinc-700 hover:text-[#629D23] transition group py-1.5">
                        <div class="p-2 rounded-full bg-zinc-50 group-hover:bg-emerald-50 transition">
                            <x-phosphor-user class="size-5 text-zinc-600 group-hover:text-[#629D23]" />
                        </div>
                        <div class="hidden lg:block text-left">
                            <span class="block text-[10px] text-zinc-400 leading-none">Sign In</span>
                            <span class="block text-xs font-semibold text-zinc-800 leading-tight">My Account</span>
                        </div>
                    </a>

                    {{-- Wishlist Icon + Count Badge --}}
                    <a href="#"
                        class="relative p-2 rounded-full bg-zinc-50 hover:bg-emerald-50 text-zinc-600 hover:text-[#629D23] transition group">
                        <x-phosphor-heart class="size-5 text-zinc-600 group-hover:text-[#629D23]" />
                        <!-- Red Badge Indicator -->
                        <span
                            class="absolute top-0 right-0 inline-flex items-center justify-center px-1.5 py-0.5 text-[9px] font-bold leading-none text-white transform translate-x-1/3 -translate-y-1/3 bg-red-500 rounded-full">0</span>
                    </a>

                    {{-- My Cart Button --}}
                    <flux:button variant="outline"
                        class="!h-11 !px-4 !rounded-[6px] !bg-white !text-zinc-800 border-gray-100 hover:border-[#629D23] hover:bg-transparent transition-colors group">
                        <div class="flex items-center gap-2.5">

                            {{-- Left: Cart Icon + Badge --}}
                            <div class="relative">
                                <!-- Forcing the icon to look sharp with zinc-700 -->
                                <x-phosphor-shopping-cart
                                    class="size-5 text-zinc-700 group-hover:text-[#629D23] transition-colors" />

                                {{-- Green Badge Indicator --}}
                                <span
                                    class="absolute -top-1.5 -right-1.5 inline-flex items-center justify-center min-w-4 h-4 px-1 text-[9px] font-bold text-white bg-[#629D23] rounded-full border border-white">
                                    0
                                </span>
                            </div>

                            {{-- Right: Simple Text --}}
                            <span
                                class="text-sm font-semibold !text-zinc-800 group-hover:!text-[#629D23] transition-colors select-none">
                                My Cart
                            </span>

                        </div>
                    </flux:button>

                </div>

            </div>
        </div>
    </div>
</header>