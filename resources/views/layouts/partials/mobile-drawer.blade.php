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
        class="fixed inset-0 bg-black/60 z-50 lg:hidden">
    </div>

    {{-- Slide-over Panel --}}
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
            {{-- Close Button --}}
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

            {{-- Tab Switcher --}}
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

            {{-- Menu Tab --}}
            <div x-show="activeTab === 'menu'" class="px-5 divide-y divide-zinc-100 text-zinc-700 font-semibold text-sm">
                <div class="flex items-center justify-between py-3">
                    <a href="{{ route('home') }}" class="hover:text-[#629D23] transition-colors">Home</a>
                </div>
                <div class="flex items-center justify-between py-3">
                    <a href="#" class="hover:text-[#629D23] transition-colors">About</a>
                </div>
                <div class="flex items-center justify-between py-3">
                    <a href="#" class="hover:text-[#629D23] transition-colors">Pages</a>
                    <button type="button" class="size-7 bg-[#629D23] text-white flex items-center justify-center rounded-xs hover:bg-[#53861d] transition-colors cursor-pointer">
                        <x-phosphor-caret-down-bold class="size-3.5" />
                    </button>
                </div>
                <div class="flex items-center justify-between py-3">
                    <a href="#" class="hover:text-[#629D23] transition-colors">Shop</a>
                    <button type="button" class="size-7 bg-[#629D23] text-white flex items-center justify-center rounded-xs hover:bg-[#53861d] transition-colors cursor-pointer">
                        <x-phosphor-caret-down-bold class="size-3.5" />
                    </button>
                </div>
                <div class="flex items-center justify-between py-3">
                    <a href="#" class="hover:text-[#629D23] transition-colors">Blog</a>
                    <button type="button" class="size-7 bg-[#629D23] text-white flex items-center justify-center rounded-xs hover:bg-[#53861d] transition-colors cursor-pointer">
                        <x-phosphor-caret-down-bold class="size-3.5" />
                    </button>
                </div>
                <div class="flex items-center justify-between py-3">
                    <a href="#" class="hover:text-[#629D23] transition-colors">Contact Us</a>
                </div>
            </div>

            {{-- Category Tab --}}
            <div x-show="activeTab === 'category'" class="px-5 text-sm font-semibold text-zinc-700" x-cloak>
                <ul class="divide-y divide-zinc-100">
                    <li>
                        <a href="#" class="flex items-center justify-between py-3 hover:text-[#629D23] transition-colors">
                            <span class="flex items-center gap-3">
                                <x-phosphor-cooking-pot class="size-4 text-zinc-500" /> Breakfast & Dairy
                            </span>
                            <x-phosphor-plus class="size-3.5 text-zinc-400 bg-gray-100 rounded-full" />
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-between py-3 hover:text-[#629D23] transition-colors">
                            <span class="flex items-center gap-3">
                                <x-phosphor-fish class="size-4 text-zinc-500" /> Meats & Seafood
                            </span>
                            <x-phosphor-plus class="size-3.5 text-zinc-400 bg-gray-100 rounded-full" />
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
                            <x-phosphor-plus class="size-3.5 text-zinc-400 bg-gray-100 rounded-full" />
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

        {{-- Footer Section --}}
        <div class="p-5 mt-auto space-y-4">
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