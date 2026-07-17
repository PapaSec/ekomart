<div class="w-full max-w-[520px] relative" 
     x-data="{ isOpen: false }" 
     x-on:click.outside="isOpen = false">

    <form wire:submit="search">
        <div class="flex items-center bg-[#F3F4F6] rounded-[6px] p-1 h-12 border border-transparent focus-within:border-[#629D23] focus-within:bg-white focus-within:ring-1 focus-within:ring-[#629D23] transition-all">
            
            
            <input 
                type="text" 
                wire:model.live.debounce.300ms="query" 
                @focus="isOpen = true"
                @input="isOpen = true"
                placeholder="Search for products, categories..."
                autocomplete="off" 
                class="flex-1 h-full bg-transparent px-3 text-sm text-gray-700 placeholder-gray-400 border-0 focus:ring-0 focus:outline-none"
            >
            
            <button 
                type="submit" 
                class="h-full px-5 bg-[#629D23] hover:bg-[#54871d] text-white rounded-[4px] flex items-center gap-1.5 font-bold text-sm transition-colors duration-150 shrink-0"
            >
                <span>Search</span>
                <x-phosphor-magnifying-glass class="size-4" />
            </button>
        </div>
    </form>

    {{-- Livewire Search Results Dropdown --}}
    <!-- 3. Added x-show="isOpen" so Alpine controls the visibility instantly -->
    <div x-show="isOpen && $wire.query" 
         x-transition
         class="absolute left-0 right-0 mt-2 bg-white rounded-lg border border-gray-100 shadow-xl z-50 max-h-96 overflow-y-auto"
         style="display: none;">
         
         <div class="p-2">
             <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider px-3 py-1">Products</p>
             <!-- Your results loop here -->
         </div>
    </div>

</div>