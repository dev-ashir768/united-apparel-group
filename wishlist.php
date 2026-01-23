<?php include 'includes/header.php'; ?>

<!-- Wishlist Hero -->
<section class="bg-gray-50 py-12">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-3xl font-bold text-brand-black mb-2">My Wishlist</h1>
        <p class="text-gray-500 text-sm">Save your favorites for later.</p>
    </div>
</section>

<!-- Wishlist Grid -->
<section class="py-12 bg-white min-h-[50vh]">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        <div id="wishlist-container"
            class="sm:grid grid-cols-1 sm:grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-10">
            <!-- Content Injected via JS -->
            <div class="col-span-full text-center py-20 text-gray-400">
                <p>Your wishlist is empty.</p>
                <a href="/" class="inline-block mt-4 text-indigo-600 font-semibold hover:underline">Explore
                    Collection</a>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>