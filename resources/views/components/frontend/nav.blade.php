<nav class="bg-[#2C3C28] text-white font-bold sticky top-0 z-40" x-data="{ open: false}">
    <div class="max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-18">
            
            <!-- Left: Dropdown Category menu --> 
            <button
                @click="categoryOpen = !categoryOpen"
                @click.away="categoryOpen = false"
                type="button"
                class="h-full px-6 bg-[#629D23] hover:bg-[#53861d] transition-colors flex items-center gap-9 font-bold cursor-pointer select-none">
                <span class="text-xl">All Categories</span>
                <x-phosphor-caret-down-bold class="size-4 transition-transform duration-200" x-bind:class="categoryOpen ? 'rotate-180' : ''" />
            </button>
            
            {{-- Categories Vertical Menu (Drawer)  --}}
            <div
               x-show="categoryOpen"
                    x-transition:enter="transition ease-out duration-150"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-100"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    class="absolute top-full left-0 w-64 bg-white text-zinc-800 border border-zinc-200 shadow-xl rounded-b-lg overflow-hidden py-2 z-50"
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
                </ul>
            </div>
        </div>
    </div>

</nav>