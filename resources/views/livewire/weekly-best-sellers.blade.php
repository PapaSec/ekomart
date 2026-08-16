<section class="py-10 bg-[#f3f4f6]">
    <div class="max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-xl p-6 sm:p-8 shadow-sm border border-gray-100">
            
            <!-- Header & Dynamic Category Navigation Tabs -->
            <div class="flex flex-col md:flex-row md:items-center justify-between pb-4 mb-6 border-b border-gray-200/80 gap-4">
                <h3 class="text-2xl sm:text-3xl font-bold text-[#2C3C28]">Weekly Best Selling Groceries</h3>

                <div class="flex items-center gap-2 overflow-x-auto no-scrollbar pb-1">
                    <!-- All Items Tab -->
                    <button type="button"
                            wire:click="selectCategory('all')"
                            class="px-4 py-1.5 rounded-full text-sm transition-colors whitespace-nowrap {{ $selectedCategory === 'all' ? 'bg-[#629D23] text-white font-semibold' : 'text-gray-600 hover:text-[#629D23] font-medium' }}">
                        All Items
                    </button>

                    <!-- Dynamic Category Tabs -->
                    @foreach($categories as $category)
                        <button type="button"
                                wire:click="selectCategory({{ $category->id }})"
                                class="px-4 py-1.5 rounded-full text-sm transition-colors whitespace-nowrap {{ $selectedCategory == $category->id ? 'bg-[#629D23] text-white font-semibold' : 'text-gray-600 hover:text-[#629D23] font-medium' }}">
                            {{ $category->name }}
                        </button>
                    @endforeach
                </div>
            </div>

            <!-- Product Grid (6 Columns, Max 12 Items) -->
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4" wire:loading.class="opacity-60 transition-opacity duration-200">
                @forelse($products as $product)
                    <x-frontend.product-card :product="$product" :key="'weekly-'.$product->id" />
                @empty
                    <div class="col-span-full py-12 text-center text-gray-400">
                        <i class="fas fa-box-open text-3xl mb-2"></i>
                        <p class="text-sm">No best sellers found in this category.</p>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</section>