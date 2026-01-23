<?php include 'includes/header.php'; ?>

<section class="py-12 md:py-20 bg-white">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-brand-black mb-8">Sitemap</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <div>
                <h3 class="text-lg font-bold mb-4 text-indigo-600">Main Pages</h3>
                <ul class="space-y-2 text-gray-600">
                    <li><a href="/" class="hover:text-black">Home</a></li>
                    <li><a href="cart.php" class="hover:text-black">Shopping Cart</a></li>
                    <li><a href="wishlist.php" class="hover:text-black">Wishlist</a></li>
                    <li><a href="contact.php" class="hover:text-black">Contact</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-lg font-bold mb-4 text-indigo-600">Categories</h3>
                <ul class="space-y-2 text-gray-600">
                    <li><a href="category.php?cat=men" class="hover:text-black">Men's Apparel</a></li>
                    <li><a href="category.php?cat=women" class="hover:text-black">Women's Fashion</a></li>
                    <li><a href="category.php?cat=kids" class="hover:text-black">Kids</a></li>
                    <li><a href="category.php?cat=sports" class="hover:text-black">Activewear</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-lg font-bold mb-4 text-indigo-600">Customer Service</h3>
                <ul class="space-y-2 text-gray-600">
                    <li><a href="track-order.php" class="hover:text-black">Track Order</a></li>
                    <li><a href="shipping-returns.php" class="hover:text-black">Shipping & Returns</a></li>
                    <li><a href="size-guide.php" class="hover:text-black">Size Guide</a></li>
                    <li><a href="faq.php" class="hover:text-black">FAQs</a></li>
                    <li><a href="wholesale.php" class="hover:text-black">Wholesale Policy</a></li>
                    <li><a href="privacy.php" class="hover:text-black">Privacy Policy</a></li>
                    <li><a href="terms.php" class="hover:text-black">Terms of Service</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>