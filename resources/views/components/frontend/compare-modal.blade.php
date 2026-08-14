<div x-show="showCompareModal" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60" x-cloak>

    <div @click.away="showCompareModal = false"
        class="bg-white rounded-xl max-w-6xl w-full relative shadow-2xl overflow-hidden max-h-[90vh] flex flex-col">

        <!-- Modal Header -->
        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200 bg-white">
            <h3 class="text-xl sm:text-2xl font-bold text-[#2C3C28]">Products Compare</h3>
            <button @click="showCompareModal = false" type="button"
                class="text-gray-400 hover:text-gray-700 transition-colors p-1 text-lg">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- Comparison Table Container -->
        <div class="p-6 overflow-x-auto overflow-y-auto">
            <template x-if="compareItems.length > 0">
                <table class="w-full border-collapse text-sm text-left border border-gray-200">
                    <tbody>

                        <!-- 1. Preview (Images) -->
                        <tr class="border-b border-gray-200">
                            <td
                                class="w-36 min-w-[140px] p-4 font-semibold text-gray-500 bg-gray-50/50 border-r border-gray-200 text-center">
                                Preview
                            </td>
                            <template x-for="(item, index) in compareItems" :key="item.id">
                                <td class="p-4 border-r border-gray-200 min-w-[200px] text-center relative group">
                                    <!-- Remove Item Button -->
                                    <button @click="removeFromCompare(index)"
                                        class="absolute top-2 right-2 w-6 h-6 bg-red-100 text-red-600 rounded-full flex items-center justify-center text-xs opacity-0 group-hover:opacity-100 transition-opacity"
                                        title="Remove item">
                                        <i class="fas fa-times"></i>
                                    </button>

                                    <div class="h-36 flex items-center justify-center p-2">
                                        <img :src="item.image ? '{{ asset('storage') }}/' + item.image : ''"
                                            :alt="item.name" class="max-h-full max-w-full object-contain">
                                    </div>
                                </td>
                            </template>
                        </tr>

                        <!-- 2. Name -->
                        <tr class="border-b border-gray-200">
                            <td
                                class="p-4 font-semibold text-gray-500 bg-gray-50/50 border-r border-gray-200 text-center">
                                Name
                            </td>
                            <template x-for="item in compareItems" :key="'name-' + item.id">
                                <td class="p-4 border-r border-gray-200 text-center font-bold text-gray-700 text-sm">
                                    <span x-text="item.name"></span>
                                </td>
                            </template>
                        </tr>

                        <!-- 3. Price -->
                        <tr class="border-b border-gray-200">
                            <td
                                class="p-4 font-semibold text-gray-500 bg-gray-50/50 border-r border-gray-200 text-center">
                                Price
                            </td>
                            <template x-for="item in compareItems" :key="'price-' + item.id">
                                <td class="p-4 border-r border-gray-200 text-center">
                                    <span class="text-xl font-bold text-[#629D23]"
                                        x-text="'$' + parseFloat(item.sale_price ?? item.price ?? 0).toFixed(2)">
                                    </span>
                                </td>
                            </template>
                        </tr>

                        <!-- 4. Description -->
                        <tr class="border-b border-gray-200">
                            <td
                                class="p-4 font-semibold text-gray-500 bg-gray-50/50 border-r border-gray-200 text-center">
                                Description
                            </td>
                            <template x-for="item in compareItems" :key="'desc-' + item.id">
                                <td
                                    class="p-4 border-r border-gray-200 text-center text-xs text-gray-500 leading-relaxed">
                                    <p class="line-clamp-3"
                                        x-text="item.description ?? 'Lorem ipsum is simply dummy text of the printing and typesetting industry.'">
                                    </p>
                                </td>
                            </template>
                        </tr>

                        <!-- 5. Rating -->
                        <tr class="border-b border-gray-200">
                            <td
                                class="p-4 font-semibold text-gray-500 bg-gray-50/50 border-r border-gray-200 text-center">
                                Rating
                            </td>
                            <template x-for="item in compareItems" :key="'rating-' + item.id">
                                <td class="p-4 border-r border-gray-200 text-center">
                                    <div class="flex items-center justify-center gap-1 text-amber-400 text-xs">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <span class="text-gray-500 font-medium ml-1"
                                            x-text="'(' + (item.reviews_count ?? 25) + ')'"></span>
                                    </div>
                                </td>
                            </template>
                        </tr>

                        <!-- 6. Weight / Unit -->
                        <tr class="border-b border-gray-200">
                            <td
                                class="p-4 font-semibold text-gray-500 bg-gray-50/50 border-r border-gray-200 text-center">
                                Weight
                            </td>
                            <template x-for="item in compareItems" :key="'weight-' + item.id">
                                <td class="p-4 border-r border-gray-200 text-center text-xs text-gray-600 font-medium">
                                    <span x-text="item.unit ?? '320 gram'"></span>
                                </td>
                            </template>
                        </tr>

                        <!-- 7. Stock status -->
                        <tr class="border-b border-gray-200">
                            <td
                                class="p-4 font-semibold text-gray-500 bg-gray-50/50 border-r border-gray-200 text-center">
                                Stock status
                            </td>
                            <template x-for="item in compareItems" :key="'stock-' + item.id">
                                <td class="p-4 border-r border-gray-200 text-center">
                                    <span
                                        :class="(item.stock_status === 'out_of_stock' || item.quantity === 0) ?
                                        'bg-red-600 text-white' : 'bg-emerald-100 text-emerald-600'"
                                        class="text-[11px] font-bold px-2.5 py-1 rounded inline-block">
                                        <span
                                            x-text="(item.stock_status === 'out_of_stock' || item.quantity === 0) ? 'Out Of Stock' : 'In Stock'"></span>
                                    </span>
                                </td>
                            </template>
                        </tr>

                        <!-- 8. Buy Now -->
                        <tr>
                            <td
                                class="p-4 font-semibold text-gray-500 bg-gray-50/50 border-r border-gray-200 text-center">
                                Buy Now
                            </td>
                            <template x-for="item in compareItems" :key="'buynow-' + item.id">
                                <td class="p-4 border-r border-gray-200 text-center">
                                    <button type="button"
                                        class="bg-[#629D23] hover:bg-[#52841d] text-white font-bold text-xs px-4 py-2 rounded-md transition-colors inline-flex items-center gap-2">
                                        <span>Add To Cart</span>
                                        <i class="fas fa-shopping-cart text-xs"></i>
                                    </button>
                                </td>
                            </template>
                        </tr>

                    </tbody>
                </table>
            </template>

            <!-- Empty State -->
            <template x-if="compareItems.length === 0">
                <div class="py-12 text-center text-gray-400">
                    <i class="fas fa-sync-alt text-4xl mb-3 block"></i>
                    <p class="font-semibold text-gray-600">No products added for comparison.</p>
                </div>
            </template>
        </div>

    </div>
</div>
