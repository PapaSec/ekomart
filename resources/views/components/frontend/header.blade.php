<header class="w-full bg-white" x-data="{ mobileMenuOpen: false, section: null }">

    {{-- Main Top Header Bar (White Bar) --}}
    <div class="py-4 border-b border-zinc-100">
        <div class="max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between gap-4 h-16">

                {{-- Left side: Logo Wrapper --}}
                <div class="flex items-center flex-shrink-0">
                    <a href="{{ route('home') }}" class="transition-opacity hover:opacity-80">
                        <img src="{{ asset('storage/logos/logo.svg') }}" alt="{{ config('app.name') }}"
                            class="h-10 w-auto object-contain"
                            onerror="this.style.display='none'; this.nextElementSibling.style.display='block'" />

                        <!-- Fallback Text Logo if image fails -->
                        <span class="hidden text-xl font-black text-[#629D23] tracking-tight">
                            Eko<span class="text-zinc-800">mart</span>
                        </span>
                    </a>
                </div>

                {{-- Center: Combined Location & Search Unit (Tighter Max Width + Left Margin Padding) --}}
                <div class="hidden md:flex flex-1 items-center gap-2.5 max-w-[640px] h-12 ml-8">

                    <!-- The Location Box Shell -->
                    <div class="w-40 h-full bg-white border border-gray-200 rounded-[6px] flex items-center cursor-pointer hover:border-[#629D23] transition-colors group">
                        {{-- Left: Icon Area with vertical divider --}}
                        <div class="h-full px-3 flex items-center justify-center border-r border-gray-200">
                            <x-phosphor-map-pin class="size-5 text-gray-400 group-hover:text-[#629D23] transition-colors" />
                        </div>

                        {{-- Right: Stacked Typography --}}
                        <div class="flex flex-col justify-center text-left pl-3 pr-2 select-none">
                            <span class="text-[10px] font-medium text-gray-400 tracking-wide leading-none">Your location</span>
                            <span class="text-xs font-bold text-gray-800 tracking-tight leading-none mt-1">Select Location</span>
                        </div>
                    </div>

                    {{-- Search Component Shell (Takes remaining center space dynamically) --}}
                    <div class="flex-1 h-full">
                        <livewire:frontend.search-bar />
                    </div>

                </div>

                {{-- Right side: Actions Row (Account, Wishlist & My Cart) --}}
                <div class="flex items-center gap-2 sm:gap-3">

                    {{-- User Account Info Button --}}
                    <flux:button variant="outline"
                        class="!h-12 !px-4 !rounded-[6px] !bg-white !text-zinc-800 !border-zinc-200 hover:!bg-[#2C3C28] hover:!border-[#2C3C28] transition-all duration-150 group">
                        <div class="flex items-center gap-2.5">
                            <div class="relative flex items-center justify-center size-5">
                                <x-phosphor-user class="size-5 text-zinc-700 group-hover:hidden transition-colors" />
                                <x-phosphor-user-bold class="size-5 text-white hidden group-hover:block transition-colors" />

                                <span class="absolute -top-1.5 -right-1.5 inline-flex items-center justify-center min-w-4 h-4 px-1 text-[9px] font-bold text-white bg-red-500 rounded-full border border-white group-hover:border-[#2C3C28] transition-colors">
                                    0
                                </span>
                            </div>

                            <div class="text-left select-none">
                                <span class="block text-[10px] text-zinc-400 group-hover:text-zinc-300 leading-none transition-colors">
                                    {{ auth()->check() ? 'Welcome back' : 'Sign In' }}
                                </span>
                                <span class="block text-sm font-semibold !text-zinc-800 group-hover:!text-white transition-colors leading-tight">
                                    {{ auth()->check() ? auth()->user()->name : 'My Account' }}
                                </span>
                            </div>
                        </div>
                    </flux:button>

                    {{-- Wishlist Button --}}
                    <flux:button variant="outline"
                        class="!h-12 !px-4 !px-6 !rounded-[6px] !bg-white !text-zinc-800 !border-zinc-200 hover:!bg-[#2C3C28] hover:!border-[#2C3C28] transition-all duration-150 group">
                        <div class="flex items-center gap-2.5">
                            <div class="relative flex items-center justify-center size-5">
                                <x-phosphor-heart class="size-5 text-zinc-700 group-hover:hidden transition-colors" />
                                <x-phosphor-heart-bold class="size-5 text-white hidden group-hover:block transition-colors" />

                                <span class="absolute -top-1.5 -right-1.5 inline-flex items-center justify-center min-w-4 h-4 px-1 text-[9px] font-bold text-white bg-[#629D23] rounded-full border border-white group-hover:border-[#2C3C28] transition-colors">
                                    0
                                </span>
                            </div>

                            <span class="text-sm font-semibold !text-zinc-800 group-hover:!text-white transition-colors select-none">
                                Wishlist
                            </span>
                        </div>
                    </flux:button>

                    {{-- My Cart Button --}}
                    <flux:button variant="outline"
                        class="!h-12 !px-4 !px-6 !rounded-[6px] !bg-white !text-zinc-800 !border-zinc-200 hover:!bg-[#2C3C28] hover:!border-[#2C3C28] transition-all duration-150 group">
                        <div class="flex items-center gap-2.5">
                            <div class="relative flex items-center justify-center size-5">
                                <x-phosphor-shopping-cart class="size-5 text-zinc-700 group-hover:hidden transition-colors" />
                                <x-phosphor-shopping-cart-bold class="size-5 text-white hidden group-hover:block transition-colors" />

                                <span class="absolute -top-1.5 -right-1.5 inline-flex items-center justify-center min-w-4 h-4 px-1 text-[9px] font-bold text-white bg-[#629D23] rounded-full border border-white group-hover:border-[#2C3C28] transition-colors">
                                    0
                                </span>
                            </div>

                            <span class="text-sm font-semibold !text-zinc-800 group-hover:!text-white transition-colors select-none">
                                My Cart
                            </span>
                        </div>
                    </flux:button>

                </div>
            </div>
        </div>
    </div>
</header>