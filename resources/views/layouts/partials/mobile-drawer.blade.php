<div x-cloak>
    {{-- Dark Backdrop Overlay --}}
    <div
        x-show="mobileMenuOpen"
        x-transition:enter="transition opacity ease-out duration-300" 
        x-transition:enter-start="opacity-0"
        x-transitiion:enter-end="opacity-100"
        x-transition:leave="transition opacity ease-in duration-200"
        x-trasnstion:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @click="mobileMenuOpen = false"
        class="fixed inset-0 bg-black/60 z-50 lg:hidden">
    </div>

    {{-- Slide over Panel --}}
    <div
        x-show="mobileMenuOpen"
        x-transition:enter="transition transform ease-out duration-300" 
        x-transition:enter-start="translate-x-full"
        x-transitiion:enter-end="translate-x-0"
        x-transition:leave="transition transform ease-in duration-200"
        x-trasnstion:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
        @-data="{ activeTab: 'menu'}"
        class="fixed inset-y-0 right-0 w-[360px] mx-w-[90vw] bg-white z-50 shadow-2xl flex flex-col justify-between overflow-y-auto lg:hidden">

        <div>
            {{-- Close Button --}}  
            <div class="flex items-center justify-between">
                <button
                @click="mobileMenuOpen = false"
                type="button"
                class="size-11 bg-[#629D23] hover:bg-[#53861d] text-white flex items-center justify-center transition-colors cursor-pointer"
                aria-label="Close Menu">
                    <x-phosphor-x-bold class="size-6" />
                </button>
            </div>
        </div>
    </div>
</div>