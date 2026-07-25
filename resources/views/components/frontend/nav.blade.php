<nav class="bg-[#2C3C28] text-white font-medium sticky top-0 z-40" x-data="{ categoryOpen: false }">
    <div class="max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-14">

            {{-- Left: All Categories Button & Dropdown Menu --}}
            <div class="relative flex items-center h-full">
                
                {{-- Category Button --}}
                <button 
                    @click="categoryOpen = !categoryOpen"
                    @click.away="categoryOpen = false"
                    type="button"
                    class="h-full px-6 bg-[#629D23] hover:bg-[#53861d] transition-colors flex items-center gap-8 text-white font-bold cursor-pointer select-none">
                    <span class="text-xl">All Categories</span>
                    {{-- Changed :class to x-bind:class so Blade ignores it --}}
                    <x-phosphor-caret-down-bold class="size-4 transition-transform duration-200" x-bind:class="categoryOpen ? 'rotate-180' : ''" />
                </button>

                {{-- Categories Vertical Menu (Drawer) --}}
                <div 
                    x-show="categoryOpen"
                    x-transition:enter="transition ease-out duration-150"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-100"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    class="absolute top-full left-0 w-57 bg-white text-zinc-800 border border-[#629D23] shadow-xl rounded-b-lg overflow-hidden py-2 z-50"
                    x-cloak>
                    
                    <ul class="text-sm font-semibold divide-y divide-zinc-100">
                        <li>
                            <a href="#" class="flex items-center justify-between px-5 py-2.5 hover:bg-zinc-50 hover:text-[#629D23] transition-colors">
                                <span class="flex items-center gap-3">
                                    <x-phosphor-cooking-pot class="size-4 text-zinc-500" /> Breakfast & Dairy
                                </span>
                                <x-phosphor-plus class="size-3 text-zinc-400" />
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-between px-5 py-2.5 hover:bg-zinc-50 hover:text-[#629D23] transition-colors">
                                <span class="flex items-center gap-3">
                                    <x-phosphor-fish class="size-4 text-zinc-500" /> Meats & Seafood
                                </span>
                                <x-phosphor-plus class="size-3 text-zinc-400" />
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-between px-5 py-2.5 hover:bg-zinc-50 hover:text-[#629D23] transition-colors">
                                <span class="flex items-center gap-3">
                                    <x-phosphor-cookie class="size-4 text-zinc-500" /> Breads & Bakery
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-between px-5 py-2.5 hover:bg-zinc-50 hover:text-[#629D23] transition-colors">
                                <span class="flex items-center gap-3">
                                    <x-phosphor-popcorn class="size-4 text-zinc-500" /> Chips & Snacks
                                </span>
                                <x-phosphor-plus class="size-3 text-zinc-400" />
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-between px-5 py-2.5 hover:bg-zinc-50 hover:text-[#629D23] transition-colors">
                                <span class="flex items-center gap-3">
                                    <x-phosphor-first-aid-kit class="size-4 text-zinc-500" /> Medical Healthcare
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-between px-5 py-2.5 hover:bg-zinc-50 hover:text-[#629D23] transition-colors">
                                <span class="flex items-center gap-3">
                                    <x-phosphor-snowflake class="size-4 text-zinc-500" /> Frozen Foods
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-between px-5 py-2.5 hover:bg-zinc-50 hover:text-[#629D23] transition-colors">
                                <span class="flex items-center gap-3">
                                    <x-phosphor-basket class="size-4 text-zinc-500" /> Grocery & Staples
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>

            {{-- Center: Navigation Links --}}
            <div class="hidden lg:flex items-center gap-8 text-sm font-semibold tracking-wide ml-8">
                <a href="{{ route('home') }}" class="hover:text-[#629D23] transition-colors">Home</a>
                <a href="#" class="hover:text-[#629D23] transition-colors">About</a>
                <a href="#" class="hover:text-[#629D23] transition-colors">Shop</a>
                <a href="#" class="hover:text-[#629D23] transition-colors">Vendors</a>
                <a href="#" class="hover:text-[#629D23] transition-colors">Pages</a>
                <a href="#" class="hover:text-[#629D23] transition-colors">Blog</a>
                <a href="#" class="hover:text-[#629D23] transition-colors">Contact</a>
            </div>

            {{-- Right: Promotional Banner --}}
            <div class="hidden md:flex items-center gap-2 text-xs font-bold tracking-wider ml-auto">
                <span class="text-zinc-200">Get 30% Discount Now</span>
                <span class="bg-[#629D23] text-white px-2.5 py-1 rounded-full text-[10px] font-black uppercase">SALE</span>
            </div>

        </div>
    </div>
</nav>