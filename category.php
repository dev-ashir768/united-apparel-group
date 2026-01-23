<?php include 'includes/header.php'; ?>

<!-- Category Hero -->
<section class="relative bg-gray-50 py-16 md:py-24">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span
            class="text-indigo-600 font-bold tracking-wider uppercase text-sm mb-4 block animate-fade-in-up">Collection</span>
        <h1 class="text-4xl md:text-6xl font-black text-brand-black mb-6 capitalize animate-fade-in-up"
            id="category-title" style="animation-delay: 0.1s;">Loading...</h1>
        <p class="text-gray-500 max-w-2xl mx-auto text-lg animate-fade-in-up" style="animation-delay: 0.2s;">
            Discover our latest collection designed for comfort and style.
        </p>
    </div>
</section>

<!-- Filter & Sort Bar (Static UI) -->
<section class="border-y border-gray-200 bg-white sticky top-0 z-30">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8 mb-8">
        <div class="flex flex-col md:flex-row md:items-center justify-between py-6 border-b border-gray-100">
            <div class="relative">
                <button id="filter-btn"
                    class="flex items-center space-x-2 text-sm font-bold text-gray-500 hover:text-brand-black transition-colors border border-gray-200 px-4 py-2 rounded-full hover:border-brand-black shadow-sm bg-white">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4">
                        </path>
                    </svg>
                    <span>Filter & Sort</span>
                </button>

                <!-- Expanded Filter Dropdown -->
                <div id="filter-dropdown"
                    class="hidden absolute top-full left-0 mt-3 w-64 bg-white border border-gray-100 rounded-2xl shadow-xl z-20 p-4 animate-fade-in-up">

                    <!-- Categories -->
                    <div class="mb-4">
                        <div class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Category</div>
                        <div class="grid grid-cols-2 gap-2">
                            <a href="category?cat=men"
                                class="text-center px-3 py-2 text-sm text-gray-700 bg-gray-50 hover:bg-brand-black hover:text-white rounded-lg transition-colors font-medium">Men</a>
                            <a href="category?cat=women"
                                class="text-center px-3 py-2 text-sm text-gray-700 bg-gray-50 hover:bg-brand-black hover:text-white rounded-lg transition-colors font-medium">Women</a>
                            <a href="category?cat=kids"
                                class="text-center px-3 py-2 text-sm text-gray-700 bg-gray-50 hover:bg-brand-black hover:text-white rounded-lg transition-colors font-medium">Kids</a>
                            <a href="category?cat=sports"
                                class="text-center px-3 py-2 text-sm text-gray-700 bg-gray-50 hover:bg-brand-black hover:text-white rounded-lg transition-colors font-medium">Sports</a>
                        </div>
                    </div>

                    <!-- Sizes (Visual Only for now) -->
                    <div class="mb-4">
                        <div class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Size</div>
                        <div class="flex flex-wrap gap-2">
                            <button
                                class="w-8 h-8 flex items-center justify-center text-xs font-bold border border-gray-200 rounded hover:border-brand-black hover:bg-brand-black hover:text-white transition-all">S</button>
                            <button
                                class="w-8 h-8 flex items-center justify-center text-xs font-bold border border-gray-200 rounded hover:border-brand-black hover:bg-brand-black hover:text-white transition-all">M</button>
                            <button
                                class="w-8 h-8 flex items-center justify-center text-xs font-bold border border-gray-200 rounded hover:border-brand-black hover:bg-brand-black hover:text-white transition-all">L</button>
                            <button
                                class="w-8 h-8 flex items-center justify-center text-xs font-bold border border-gray-200 rounded hover:border-brand-black hover:bg-brand-black hover:text-white transition-all">XL</button>
                        </div>
                    </div>

                    <!-- Sort Options (Integrated) -->
                    <div class="mb-2">
                        <div class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Sort By</div>
                        <select
                            class="w-full bg-gray-50 border border-gray-200 text-sm rounded-lg p-2 focus:outline-none sort-select">
                            <option value="featured">Featured</option>
                            <option value="price-low">Price: Low to High</option>
                            <option value="price-high">Price: High to Low</option>
                        </select>
                    </div>

                    <div class="border-t border-gray-100 my-2 pt-2"></div>
                    <a href="category.php"
                        class="block text-center px-3 py-2 text-sm text-red-500 hover:bg-red-50 rounded-lg transition-colors font-bold">Clear
                        All Filters</a>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <div class="h-4 w-px bg-gray-300"></div>
                <span class="text-sm text-gray-500" id="product-count">Loading...</span>
            </div>
        </div>
    </div>
</section>

<!-- Product Grid -->
<section class="py-12 bg-white min-h-[50vh]">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        <div id="category-grid" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-x-6 md:gap-y-10">
            <!-- Content Injected via JS -->
            <div class="col-span-full text-center py-20 text-gray-400">
                <div class="animate-pulse">Loading products...</div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>