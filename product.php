<?php include 'includes/header.php'; ?>

<!-- Breadcrumbs -->
<div class="bg-gray-50 py-4">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex text-sm text-gray-500">
            <a href="/" class="hover:text-black transition-colors">Home</a>
            <span class="mx-2">/</span>
            <a href="#" id="breadcrumb-category" class="hover:text-black transition-colors">Category</a>
            <span class="mx-2">/</span>
            <span class="text-gray-900 font-medium" id="breadcrumb-product">Product Name</span>
        </nav>
    </div>
</div>

<!-- Product Detail Section -->
<section class="py-12 bg-white">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 lg:gap-16" id="product-detail-container">
            <!-- Loader -->
            <div class="col-span-full h-96 flex items-center justify-center text-gray-400">
                Loading product details...
            </div>
            <!-- Action Buttons (Add to Cart / Quantity) -->
            <div class="flex gap-4 items-center" id="detail-actions-wrapper">
                <!-- JS Injected Buttons -->
            </div>

            <!-- Bulk Order Button -->
            <div class="mt-4">
                <a href="bulk-purchase"
                    class="inline-flex items-center justify-center px-6 py-3 border-2 border-brand-black text-brand-black font-bold uppercase tracking-wider hover:bg-brand-black hover:text-white transition-all rounded-xl">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                    Request Bulk Order
                </a>
                <p class="text-xs text-gray-500 mt-2">Need 50+ units? Get special wholesale pricing!</p>
            </div>
        </div>
    </div>
</section>

<!-- Related Products -->
<section class="py-16 bg-gray-50">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-brand-black mb-8">You May Also Like</h2>
        <div class="swiper product-swiper relative group" id="related-products-swiper">
            <div class="swiper-wrapper">
                <!-- Injected via JS -->
            </div>
            <!-- Pagination -->
            <div class="swiper-pagination !bottom-0"></div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>