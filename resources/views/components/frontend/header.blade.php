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

                {{-- Center: Combined Location & Search Unit (Desktop Only) --}}
                <div class="hidden md:flex flex-1 items-center gap-2.5 max-w-[640px] h-12 ml-8">

                    <!-- The Location Box Shell -->
                    <div
                        class="w-40 h-full bg-white border border-gray-200 rounded-[6px] flex items-center cursor-pointer hover:border-[#629D23] transition-colors group">
                        <div class="h-full px-3 flex items-center justify-center border-r border-gray-200">
                            <x-phosphor-map-pin
                                class="size-5 text-gray-400 group-hover:text-[#629D23] transition-colors" />
                        </div>

                        <div class="flex flex-col justify-center text-left pl-3 pr-2 select-none">
                            <span class="text-[10px] font-medium text-gray-400 tracking-wide leading-none">Your
                                location</span>
                            <span class="text-xs font-bold text-gray-800 tracking-tight leading-none mt-1">Select
                                Location</span>
                        </div>
                    </div>

                    {{-- Search Component Shell --}}
                    <div class="flex-1 h-full">
                        <livewire:frontend.search-bar />
                    </div>

                </div>

                {{-- Right side: Desktop Actions Row (Hidden on Mobile) --}}
                <div class="hidden md:flex items-center gap-2 sm:gap-3">

                    {{-- User Account Info Button --}}
                    @guest
                        <flux:button variant="outline" @click="$dispatch('open-auth-drawer', { mode: 'login' })"
                            class="!h-12 !px-4 !rounded-[6px] !bg-white !text-zinc-800 !border-zinc-200 hover:!bg-[#2C3C28] hover:!border-[#2C3C28] transition-all duration-150 group cursor-pointer">
                            <div class="flex items-center gap-2.5">
                                <div class="relative flex items-center justify-center size-5">
                                    <x-phosphor-user class="size-5 text-zinc-700 group-hover:hidden transition-colors" />
                                    <x-phosphor-user-bold
                                        class="size-5 text-white hidden group-hover:block transition-colors" />
                                </div>

                                <div class="text-left select-none">
                                    <span
                                        class="block text-[10px] text-zinc-400 group-hover:text-zinc-300 leading-none transition-colors">
                                        Sign In
                                    </span>
                                    <span
                                        class="block text-sm font-semibold !text-zinc-800 group-hover:!text-white transition-colors leading-tight">
                                        My Account
                                    </span>
                                </div>
                            </div>
                        </flux:button>
                    @endguest

                    @auth
                        <flux:dropdown>
                            <flux:button variant="outline"
                                class="!h-12 !px-4 !rounded-[6px] !bg-white !text-zinc-800 !border-zinc-200 hover:!bg-[#2C3C28] hover:!border-[#2C3C28] transition-all duration-150 group cursor-pointer">
                                <div class="flex items-center gap-2.5">
                                    <div class="relative flex items-center justify-center size-5">
                                        <x-phosphor-user
                                            class="size-5 text-zinc-700 group-hover:hidden transition-colors" />
                                        <x-phosphor-user-bold
                                            class="size-5 text-white hidden group-hover:block transition-colors" />

                                        <span
                                            class="absolute -top-1.5 -right-1.5 inline-flex items-center justify-center min-w-4 h-4 px-1 text-[9px] font-bold text-white bg-red-500 rounded-full border border-white group-hover:border-[#2C3C28] transition-colors">
                                            0
                                        </span>
                                    </div>

                                    <div class="text-left select-none">
                                        <span
                                            class="block text-[10px] text-zinc-400 group-hover:text-zinc-300 leading-none transition-colors">
                                            Welcome back
                                        </span>
                                        <span
                                            class="block text-sm font-semibold !text-zinc-800 group-hover:!text-white transition-colors leading-tight">
                                            {{ auth()->user()->name }}
                                        </span>
                                    </div>
                                </div>
                            </flux:button>

                            <flux:menu class="w-48">
                                <flux:menu.item href="{{ route('home') }}">
                                    My Dashboard
                                </flux:menu.item>

                                <flux:menu.item href="#">
                                    Order History
                                </flux:menu.item>

                                <flux:menu.separator />

                                <flux:menu.item x-data @click="document.getElementById('logout-form').submit()"
                                    variant="danger">
                                    Log Out
                                </flux:menu.item>
                            </flux:menu>
                        </flux:dropdown>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    @endauth

                    {{-- Wishlist Button --}}
                    <flux:button variant="outline"
                        class="!h-12 !px-4 !px-6 !rounded-[6px] !bg-white !text-zinc-800 !border-zinc-200 hover:!bg-[#2C3C28] hover:!border-[#2C3C28] transition-all duration-150 group">
                        <div class="flex items-center gap-2.5">
                            <div class="relative flex items-center justify-center size-5">
                                <x-phosphor-heart class="size-5 text-zinc-700 group-hover:hidden transition-colors" />
                                <x-phosphor-heart-bold
                                    class="size-5 text-white hidden group-hover:block transition-colors" />

                                <span
                                    class="absolute -top-1.5 -right-1.5 inline-flex items-center justify-center min-w-4 h-4 px-1 text-[9px] font-bold text-white bg-[#629D23] rounded-full border border-white group-hover:border-[#2C3C28] transition-colors">
                                    0
                                </span>
                            </div>

                            <span
                                class="text-sm font-semibold !text-zinc-800 group-hover:!text-white transition-colors select-none">
                                Wishlist
                            </span>
                        </div>
                    </flux:button>

                    {{-- My Cart Button --}}
                    <flux:button variant="outline"
                        class="!h-12 !px-4 !px-6 !rounded-[6px] !bg-white !text-zinc-800 !border-zinc-200 hover:!bg-[#2C3C28] hover:!border-[#2C3C28] transition-all duration-150 group">
                        <div class="flex items-center gap-2.5">
                            <div class="relative flex items-center justify-center size-5">
                                <x-phosphor-shopping-cart
                                    class="size-5 text-zinc-700 group-hover:hidden transition-colors" />
                                <x-phosphor-shopping-cart-bold
                                    class="size-5 text-white hidden group-hover:block transition-colors" />

                                <span
                                    class="absolute -top-1.5 -right-1.5 inline-flex items-center justify-center min-w-4 h-4 px-1 text-[9px] font-bold text-white bg-[#629D23] rounded-full border border-white group-hover:border-[#2C3C28] transition-colors">
                                    0
                                </span>
                            </div>

                            <span
                                class="text-sm font-semibold !text-zinc-800 group-hover:!text-white transition-colors select-none">
                                My Cart
                            </span>
                        </div>
                    </flux:button>

                </div>

                {{-- Right side: Mobile Actions Cluster (Visible ONLY on mobile/tablet) --}}
                <div class="flex md:hidden items-center gap-2.5">

                    {{-- Cart Button --}}
                    <button type="button" 
                        class="size-10 flex items-center justify-center rounded-xl border border-zinc-200 bg-white text-zinc-800 shadow-xs hover:bg-zinc-100 transition-colors cursor-pointer"
                        aria-label="Cart">
                        <x-phosphor-shopping-cart class="size-5 text-zinc-700" />
                    </button>

                    {{-- Search Button --}}
                    <button type="button" 
                        class="size-10 flex items-center justify-center rounded-xl border border-zinc-200 bg-white text-zinc-800 shadow-xs hover:bg-zinc-100 transition-colors cursor-pointer"
                        aria-label="Search">
                        <x-phosphor-magnifying-glass class="size-5 text-zinc-700" />
                    </button>

                    {{-- Hamburger Menu Button --}}
                    <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" 
                        class="size-10 flex items-center justify-center rounded-xl border border-zinc-200 bg-white text-zinc-800 shadow-xs hover:bg-zinc-100 transition-colors cursor-pointer"
                        aria-label="Toggle Menu">
                        <x-phosphor-list class="size-5 text-zinc-700" />
                    </button>

                </div>

            </div>
        </div>
    </div>

    {{-- Mobile Off-Canvas Drawer & Overlay --}}
<div x-cloak>

    {{-- Dark Backdrop Overlay --}}
    <div 
        x-show="mobileMenuOpen"
        x-transition:enter="transition opacity ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition opacity ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @click="mobileMenuOpen = false"
        class="fixed inset-0 bg-black/60 backdrop-blur-xs z-50 lg:hidden">
    </div>

    {{-- Slide-over Panel (Positioned on RIGHT with increased width: w-[360px]) --}}
    <div 
        x-show="mobileMenuOpen"
        x-transition:enter="transition transform ease-out duration-300"
        x-transition:enter-start="translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition transform ease-in duration-200"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
        x-data="{ activeTab: 'menu' }"
        class="fixed inset-y-0 right-0 w-[360px] max-w-[90vw] bg-white z-50 shadow-2xl flex flex-col justify-between overflow-y-auto lg:hidden">

        <div>
            {{-- Top Close Button (Green Square Box) --}}
            <div class="flex items-center justify-start">
                <button 
                    @click="mobileMenuOpen = false" 
                    type="button" 
                    class="size-11 bg-[#629D23] hover:bg-[#53861d] text-white flex items-center justify-center transition-colors cursor-pointer"
                    aria-label="Close Menu">
                    <x-phosphor-x-bold class="size-6" />
                </button>
            </div>

            {{-- Search Bar --}}
            <div class="p-5 pb-3">
                <div class="relative">
                    <input 
                        type="text" 
                        placeholder="Search..." 
                        class="w-full h-11 pl-4 pr-10 border border-zinc-300 rounded-md text-sm text-zinc-700 placeholder-zinc-400 focus:outline-none focus:border-[#629D23] transition-colors" />
                    <x-phosphor-magnifying-glass class="absolute right-3.5 top-1/2 -translate-y-1/2 size-4 text-zinc-400" />
                </div>
            </div>

            {{-- Tab Switcher: Menu vs Category --}}
            <div class="grid grid-cols-2 gap-3 px-5 py-2 mb-2">
                <button 
                    @click="activeTab = 'menu'" 
                    type="button"
                    class="py-2.5 rounded-md text-center text-sm font-bold transition-all cursor-pointer"
                    :class="activeTab === 'menu' ? 'bg-[#629D23] text-white' : 'bg-white text-zinc-700 border border-zinc-200 hover:bg-zinc-50'">
                    Menu
                </button>
                <button 
                    @click="activeTab = 'category'" 
                    type="button"
                    class="py-2.5 rounded-md text-center text-sm font-bold transition-all cursor-pointer"
                    :class="activeTab === 'category' ? 'bg-[#629D23] text-white' : 'bg-white text-zinc-700 border border-zinc-200 hover:bg-zinc-50'">
                    Category
                </button>
            </div>

            {{-- Tab 1: Navigation Menu --}}
            <div x-show="activeTab === 'menu'" class="px-5 divide-y divide-zinc-100 text-zinc-700 font-semibold text-sm">
                
                {{-- Home --}}
                <div class="flex items-center justify-between py-3">
                    <a href="{{ route('home') }}" class="hover:text-[#629D23] transition-colors">Home</a>
                    <button type="button" class="size-7 bg-[#629D23] text-white flex items-center justify-center rounded-xs hover:bg-[#53861d] transition-colors cursor-pointer">
                        <x-phosphor-caret-down-bold class="size-3.5" />
                    </button>
                </div>

                {{-- About --}}
                <div class="flex items-center justify-between py-3">
                    <a href="#" class="hover:text-[#629D23] transition-colors">About</a>
                </div>

                {{-- Pages --}}
                <div class="flex items-center justify-between py-3">
                    <a href="#" class="hover:text-[#629D23] transition-colors">Pages</a>
                    <button type="button" class="size-7 bg-[#629D23] text-white flex items-center justify-center rounded-xs hover:bg-[#53861d] transition-colors cursor-pointer">
                        <x-phosphor-caret-down-bold class="size-3.5" />
                    </button>
                </div>

                {{-- Shop --}}
                <div class="flex items-center justify-between py-3">
                    <a href="#" class="hover:text-[#629D23] transition-colors">Shop</a>
                    <button type="button" class="size-7 bg-[#629D23] text-white flex items-center justify-center rounded-xs hover:bg-[#53861d] transition-colors cursor-pointer">
                        <x-phosphor-caret-down-bold class="size-3.5" />
                    </button>
                </div>

                {{-- Blog --}}
                <div class="flex items-center justify-between py-3">
                    <a href="#" class="hover:text-[#629D23] transition-colors">Blog</a>
                    <button type="button" class="size-7 bg-[#629D23] text-white flex items-center justify-center rounded-xs hover:bg-[#53861d] transition-colors cursor-pointer">
                        <x-phosphor-caret-down-bold class="size-3.5" />
                    </button>
                </div>

                {{-- Contact Us --}}
                <div class="flex items-center justify-between py-3">
                    <a href="#" class="hover:text-[#629D23] transition-colors">Contact Us</a>
                </div>

            </div>

            {{-- Tab 2: Categories (Restored Icon & Item Layout) --}}
            <div x-show="activeTab === 'category'" class="px-5 text-sm font-semibold text-zinc-700" x-cloak>
                <ul class="divide-y divide-zinc-100">
                    <li>
                        <a href="#" class="flex items-center justify-between py-3 hover:text-[#629D23] transition-colors">
                            <span class="flex items-center gap-3">
                                <x-phosphor-cooking-pot class="size-4 text-zinc-500" /> Breakfast & Dairy
                            </span>
                            <x-phosphor-plus class="size-3.5 text-zinc-400" />
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-between py-3 hover:text-[#629D23] transition-colors">
                            <span class="flex items-center gap-3">
                                <x-phosphor-fish class="size-4 text-zinc-500" /> Meats & Seafood
                            </span>
                            <x-phosphor-plus class="size-3.5 text-zinc-400" />
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-between py-3 hover:text-[#629D23] transition-colors">
                            <span class="flex items-center gap-3">
                                <x-phosphor-cookie class="size-4 text-zinc-500" /> Breads & Bakery
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-between py-3 hover:text-[#629D23] transition-colors">
                            <span class="flex items-center gap-3">
                                <x-phosphor-popcorn class="size-4 text-zinc-500" /> Chips & Snacks
                            </span>
                            <x-phosphor-plus class="size-3.5 text-zinc-400" />
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-between py-3 hover:text-[#629D23] transition-colors">
                            <span class="flex items-center gap-3">
                                <x-phosphor-first-aid-kit class="size-4 text-zinc-500" /> Medical Healthcare
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-between py-3 hover:text-[#629D23] transition-colors">
                            <span class="flex items-center gap-3">
                                <x-phosphor-snowflake class="size-4 text-zinc-500" /> Frozen Foods
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-between py-3 hover:text-[#629D23] transition-colors">
                            <span class="flex items-center gap-3">
                                <x-phosphor-basket class="size-4 text-zinc-500" /> Grocery & Staples
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        {{-- Panel Footer: Account Actions & Contact Info Card --}}
        <div class="p-5 mt-auto space-y-4">
            
            {{-- Account / Auth Buttons --}}
            @guest
                <div class="grid grid-cols-2 gap-2">
                    <button 
                        @click="$dispatch('open-auth-drawer', { mode: 'login' }); mobileMenuOpen = false" 
                        type="button" 
                        class="py-2.5 px-3 rounded-lg border border-zinc-200 text-zinc-800 hover:bg-zinc-50 text-xs font-bold flex items-center justify-center gap-2 transition-colors cursor-pointer">
                        <x-phosphor-user class="size-4 text-zinc-600" />
                        Sign In
                    </button>
                    <button 
                        @click="$dispatch('open-auth-drawer', { mode: 'register' }); mobileMenuOpen = false" 
                        type="button" 
                        class="py-2.5 px-3 rounded-lg bg-[#629D23] hover:bg-[#53861d] text-white text-xs font-bold flex items-center justify-center gap-2 transition-colors cursor-pointer">
                        <x-phosphor-user-plus-bold class="size-4" />
                        Register
                    </button>
                </div>
            @endguest

            @auth
                <div class="flex items-center justify-between p-3 rounded-xl bg-zinc-50 border border-zinc-200">
                    <div class="flex items-center gap-3">
                        <div class="size-9 rounded-full bg-[#2C3C28] text-white flex items-center justify-center font-bold text-sm">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                        <div class="overflow-hidden">
                            <p class="text-[10px] text-zinc-400 uppercase font-bold tracking-wider leading-none">Logged in</p>
                            <p class="text-sm font-bold text-zinc-800 truncate">{{ auth()->user()->name }}</p>
                        </div>
                    </div>

                    <button 
                        @click="document.getElementById('logout-form').submit()" 
                        type="button" 
                        class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors cursor-pointer"
                        title="Log Out">
                        <x-phosphor-sign-out class="size-5" />
                    </button>
                </div>
            @endauth

            {{-- Contact Info Box --}}
            <div class="border border-zinc-200 rounded-xl p-4 space-y-3 bg-white">
                <div class="flex items-center gap-3 text-zinc-700 font-bold text-sm">
                    <x-phosphor-headset class="size-5 text-[#629D23]" />
                    <span>02345697871</span>
                </div>
                <div class="flex items-center gap-3 text-zinc-700 font-bold text-sm">
                    <x-phosphor-envelope-simple class="size-5 text-[#629D23]" />
                    <span>02345697871</span>
                </div>
            </div>

        </div>

    </div>
</div>
</header>