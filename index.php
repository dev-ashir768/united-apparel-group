<?php include 'includes/header.php'; ?>

<!-- Hero Section Grid -->
<section class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8 py-6 md:py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 md:gap-6 h-auto lg:h-[650px]">

        <!-- Main Static Hero (Span 2) -->
        <div class="lg:col-span-2 relative h-[500px] lg:h-full rounded-2xl overflow-hidden shadow-xl group">
            <div class="relative h-full w-full">
                <img src="https://images.unsplash.com/photo-1523381210434-271e8be1f52b?auto=format&fit=crop&w=1600&q=80"
                    alt="Hero Image"
                    class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/40 to-transparent"></div>
                <div class="absolute top-1/2 left-6 md:left-16 transform -translate-y-1/2 max-w-lg z-20 pr-4">
                    <span
                        class="inline-block bg-white/20 backdrop-blur-md border border-white/30 text-white px-3 py-1 md:px-4 md:py-1.5 rounded-full text-[10px] md:text-xs font-bold uppercase tracking-wider mb-4 md:mb-6 shadow-sm"
                        data-aos="fade-up" data-aos-delay="100">Premium Collection</span>
                    <h1 class="text-4xl md:text-7xl font-black text-white mb-4 md:mb-6 leading-tight drop-shadow-lg"
                        data-aos="fade-up" data-aos-delay="200">
                        Elevate Your <br> <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-300 to-white">Style</span>
                    </h1>
                    <p class="text-sm md:text-lg text-gray-200 mb-6 md:mb-10 font-medium max-w-xs md:max-w-md leading-relaxed"
                        data-aos="fade-up" data-aos-delay="300">Discover premium heavyweight hoodies and apparel
                        designed for comfort and durability.</p>
                    <a href="category?cat=men"
                        class="inline-flex items-center px-6 py-3 md:px-8 md:py-4 bg-white text-brand-black font-bold rounded-full hover:bg-gray-100 transition-all transform hover:-translate-y-1 shadow-xl hover:shadow-2xl text-sm md:text-base"
                        data-aos="fade-up" data-aos-delay="400">
                        Shop Collection
                        <svg class="w-4 h-4 md:w-5 md:h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Right Side Banners -->
        <div class="flex flex-col sm:flex-row lg:flex-col gap-4 md:gap-6 h-auto lg:h-full mt-4 lg:mt-0">
            <!-- Top Banner -->
            <a href="category?cat=kids"
                class="relative flex-1 rounded-2xl overflow-hidden group block shadow-md h-[200px] sm:h-[250px] lg:h-auto">
                <img src="https://images.unsplash.com/photo-1519241047957-be31d7379a5d?auto=format&fit=crop&w=600&q=80"
                    alt="Kids"
                    class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-colors"></div>
                <div class="absolute inset-0 p-6 md:p-8 flex flex-col justify-end items-start z-10">
                    <span
                        class="bg-white text-brand-black text-[10px] md:text-xs font-bold uppercase tracking-widest px-2 py-1 md:px-3 rounded mb-2 md:mb-3">Kids</span>
                    <h3 class="text-2xl md:text-3xl font-bold text-white mb-1 md:mb-2 leading-tight">Little <br>Legends
                    </h3>
                    <div class="mt-1 md:mt-2 text-white font-bold text-xs md:text-sm border-b border-white pb-1">Shop
                        Now</div>
                </div>
            </a>

            <!-- Bottom Banner -->
            <a href="category?cat=sports"
                class="relative flex-1 rounded-2xl overflow-hidden group block shadow-md h-[200px] sm:h-[250px] lg:h-auto">
                <img src="https://images.unsplash.com/photo-1517836357463-d25dfeac3438?auto=format&fit=crop&w=600&q=80"
                    alt="Sports"
                    class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-black/30 group-hover:bg-black/20 transition-colors"></div>
                <div class="absolute inset-0 p-6 md:p-8 flex flex-col justify-end items-start z-10">
                    <span
                        class="bg-brand-black text-white text-[10px] md:text-xs font-bold uppercase tracking-widest px-2 py-1 md:px-3 rounded mb-2 md:mb-3">Sports</span>
                    <h3 class="text-2xl md:text-3xl font-bold text-white mb-1 md:mb-2 leading-tight">Performance
                        <br>Gear
                    </h3>
                    <div class="mt-1 md:mt-2 text-white font-bold text-xs md:text-sm border-b border-white pb-1">Shop
                        Now</div>
                </div>
            </a>
        </div>
    </div>
</section>

<!-- Value Props -->
<div class="bg-white py-12 border-b border-gray-50">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div
                class="flex items-center space-x-4 p-4 text-center md:text-left hover:shadow-sm rounded-xl transition-shadow scale-100 hover:scale-105 duration-300">
                <div class="flex-shrink-0 text-indigo-600">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg>
                </div>
                <div>
                    <h4 class="font-bold text-brand-dark">Price Match Guarantee</h4>
                    <p class="text-xs text-gray-500 mt-1">Found cheaper? We'll match it.</p>
                </div>
            </div>
            <div
                class="flex items-center space-x-4 p-4 text-center md:text-left hover:shadow-sm rounded-xl transition-shadow scale-100 hover:scale-105 duration-300">
                <div class="flex-shrink-0 text-indigo-600">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg>
                </div>
                <div>
                    <h4 class="font-bold text-brand-dark">Best Customer Support</h4>
                    <p class="text-xs text-gray-500 mt-1">24/7 dedicated support.</p>
                </div>
            </div>
            <div
                class="flex items-center space-x-4 p-4 text-center md:text-left hover:shadow-sm rounded-xl transition-shadow scale-100 hover:scale-105 duration-300">
                <div class="flex-shrink-0 text-indigo-600">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4">
                        </path>
                    </svg>
                </div>
                <div>
                    <h4 class="font-bold text-brand-dark">Free Shipping > $99</h4>
                    <p class="text-xs text-gray-500 mt-1">Fast delivery on bulk orders.</p>
                </div>
            </div>
            <div
                class="flex items-center space-x-4 p-4 text-center md:text-left hover:shadow-sm rounded-xl transition-shadow scale-100 hover:scale-105 duration-300">
                <div class="flex-shrink-0 text-indigo-600">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <h4 class="font-bold text-brand-dark">Secure Bulk Deals</h4>
                    <p class="text-xs text-gray-500 mt-1">Save more on large quantities.</p>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Categories Grid -->
<section class="py-20 md:py-32 bg-white">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold tracking-tight mb-4">Our Collections</h2>
            <div class="h-1 w-20 bg-brand-black mx-auto"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Card 1: Men -->
            <a href="category.php?cat=men" class="group block relative overflow-hidden aspect-[3/4]">
                <img src="https://images.unsplash.com/photo-1490114538077-0a7f8cb49891?auto=format&fit=crop&q=80&w=800"
                    alt="Men"
                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                <div class="absolute inset-0 bg-black/10 group-hover:bg-black/20 transition-colors"></div>
                <div class="absolute bottom-8 left-8">
                    <h3 class="text-2xl font-bold text-white mb-2">Men</h3>
                    <span
                        class="inline-block text-white text-sm uppercase tracking-wider border-b border-white pb-1 group-hover:pb-2 transition-all">View
                        Products</span>
                </div>
            </a>
            <!-- Card 2: Women -->
            <a href="category.php?cat=women" class="group block relative overflow-hidden aspect-[3/4]">
                <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?auto=format&fit=crop&q=80&w=800"
                    alt="Women"
                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                <div class="absolute inset-0 bg-black/10 group-hover:bg-black/20 transition-colors"></div>
                <div class="absolute bottom-8 left-8">
                    <h3 class="text-2xl font-bold text-white mb-2">Women</h3>
                    <span
                        class="inline-block text-white text-sm uppercase tracking-wider border-b border-white pb-1 group-hover:pb-2 transition-all">View
                        Products</span>
                </div>
            </a>
            <!-- Card 3: Activewear -->
            <a href="category.php?cat=sports" class="group block relative overflow-hidden aspect-[3/4]">
                <img src="https://images.unsplash.com/photo-1518310383802-640c2de311b2?auto=format&fit=crop&q=80&w=800"
                    alt="Activewear"
                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                <div class="absolute inset-0 bg-black/10 group-hover:bg-black/20 transition-colors"></div>
                <div class="absolute bottom-8 left-8">
                    <h3 class="text-2xl font-bold text-white mb-2">Activewear</h3>
                    <span
                        class="inline-block text-white text-sm uppercase tracking-wider border-b border-white pb-1 group-hover:pb-2 transition-all">View
                        Products</span>
                </div>
            </a>
        </div>
    </div>
</section>

<!-- Supply Services -->
<section class="py-20 bg-brand-gray/30">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <span class="text-brand-accent text-sm font-semibold uppercase tracking-wider mb-2 block">Supply
                    Services</span>
                <h2 class="text-3xl md:text-4xl font-bold mb-6">Comprehensive Manufacturing Solutions</h2>
                <p class="text-gray-600 mb-8 leading-relaxed">
                    From bulk wholesale orders to private label manufacturing, we provide end-to-end supply chain
                    solutions.
                    Our global network ensures high-quality production and reliable delivery.
                </p>

                <div class="space-y-6">
                    <div class="flex items-start">
                        <div
                            class="h-10 w-10 flex items-center justify-center bg-brand-black text-white rounded-full flex-shrink-0">
                            1</div>
                        <div class="ml-4">
                            <h4 class="text-lg font-bold">Wholesale Clothing Supply</h4>
                            <p class="text-gray-500 text-sm">Bulk orders for retailers & distributors with competitive
                                pricing.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div
                            class="h-10 w-10 flex items-center justify-center bg-brand-black text-white rounded-full flex-shrink-0">
                            2</div>
                        <div class="ml-4">
                            <h4 class="text-lg font-bold">Private Label Manufacturing</h4>
                            <p class="text-gray-500 text-sm">Custom branding, tagging, and packaging services.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div
                            class="h-10 w-10 flex items-center justify-center bg-brand-black text-white rounded-full flex-shrink-0">
                            3</div>
                        <div class="ml-4">
                            <h4 class="text-lg font-bold">Worldwide Export</h4>
                            <p class="text-gray-500 text-sm">Reliable logistics to North America, Europe, and beyond.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative h-[600px] bg-gray-200">
                <img src="assets/img/fabric-swatches.png" alt="Fabric Swatches & Materials"
                    class="w-full h-full object-cover">
                <div class="absolute -bottom-8 -left-8 bg-white p-8 shadow-xl max-w-sm hidden md:block">
                    <p class="text-3xl font-bold text-brand-black mb-1">10+</p>
                    <p class="text-gray-500 text-sm uppercase tracking-wide">Years of Experience</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Best Sellers Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-end mb-12">
            <div>
                <span class="text-indigo-600 font-bold tracking-wider uppercase text-xs mb-2 block"
                    data-aos="fade-up">Top Rated</span>
                <h2 class="text-3xl md:text-4xl font-bold text-brand-black" data-aos="fade-up" data-aos-delay="100">Best
                    Selling Products</h2>
            </div>
            <a href="category.php"
                class="hidden md:flex items-center text-sm font-semibold text-indigo-600 hover:text-indigo-800 transition-colors group"
                data-aos="fade-left">
                View All
                <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>

        <!-- Product Swiper -->
        <div class="swiper product-swiper pb-12" id="best-sellers-swiper" data-aos="fade-up" data-aos-delay="200">
            <div class="swiper-wrapper">
                <!-- JS Will Render Content Here -->
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

<!-- Men's Collection Preview used to be static grid, now dynamic or linked -->
<!-- Since user asked for "Men, Women, Kids" dynamic sections similar to Best Selling -->

<!-- Men's Products -->
<section class="py-20 bg-white border-t border-gray-100">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold mb-8" data-aos="fade-right">Men's Latest</h2>
        <div class="swiper product-swiper pb-12" id="men-product-swiper">
            <div class="swiper-wrapper"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

<!-- Women's Products -->
<section class="py-20 bg-gray-50">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold mb-8" data-aos="fade-right">Women's Trends</h2>
        <div class="swiper product-swiper pb-12" id="women-product-swiper">
            <div class="swiper-wrapper"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

<!-- Kids' Products -->
<section class="py-20 bg-white">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold mb-8" data-aos="fade-right">Kids' Favorites</h2>
        <div class="swiper product-swiper pb-12" id="kids-product-swiper">
            <div class="swiper-wrapper"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>


<!-- Features / Testimonials Section -->
<section class="py-20 bg-white">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            <!-- FAQ Section -->
            <div data-aos="fade-right">
                <span class="text-indigo-600 font-bold tracking-wider uppercase text-xs mb-2 block">Support</span>
                <h2 class="text-3xl font-bold mb-8">Frequently Asked Questions</h2>

                <div class="space-y-4">
                    <!-- FAQ Item 1 -->
                    <div class="border border-gray-200 rounded-lg overflow-hidden">
                        <button
                            class="w-full px-6 py-4 text-left bg-gray-50 hover:bg-gray-100 focus:outline-none flex justify-between items-center transition-colors faq-toggle">
                            <span class="font-semibold text-brand-black">What is the minimum order quantity
                                (MOQ)?</span>
                            <svg class="w-5 h-5 text-gray-500 transform transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div class="px-6 py-4 bg-white hidden faq-content">
                            <p class="text-gray-600 text-sm leading-relaxed">Our standard MOQ for private label
                                manufacturing is 300 pieces per style/color. For wholesale blank apparel, the MOQ is 50
                                pieces.</p>
                        </div>
                    </div>
                    <!-- FAQ Item 2 -->
                    <div class="border border-gray-200 rounded-lg overflow-hidden">
                        <button
                            class="w-full px-6 py-4 text-left bg-gray-50 hover:bg-gray-100 focus:outline-none flex justify-between items-center transition-colors faq-toggle">
                            <span class="font-semibold text-brand-black">Do you offer custom labelling and
                                packaging?</span>
                            <svg class="w-5 h-5 text-gray-500 transform transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div class="px-6 py-4 bg-white hidden faq-content">
                            <p class="text-gray-600 text-sm leading-relaxed">Yes, we offer full private label services
                                including custom woven labels, hang tags, poly bags, and specialized packaging
                                solutions.</p>
                        </div>
                    </div>
                    <!-- FAQ Item 3 -->
                    <div class="border border-gray-200 rounded-lg overflow-hidden">
                        <button
                            class="w-full px-6 py-4 text-left bg-gray-50 hover:bg-gray-100 focus:outline-none flex justify-between items-center transition-colors faq-toggle">
                            <span class="font-semibold text-brand-black">What are your shipping times
                                internationally?</span>
                            <svg class="w-5 h-5 text-gray-500 transform transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div class="px-6 py-4 bg-white hidden faq-content">
                            <p class="text-gray-600 text-sm leading-relaxed">We ship globally via DHL, FedEx, and UPS.
                                Standard air freight takes 3-7 business days, while sea freight options are available
                                for larger bulk orders (20-40 days).</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Testimonials -->
            <div class="bg-brand-black rounded-2xl p-8 md:p-12 text-white relative overflow-hidden"
                data-aos="fade-left">
                <div class="absolute top-0 right-0 p-8 opacity-10">
                    <svg class="w-32 h-32 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M14.017 21L14.017 18C14.017 16.896 14.353 16.03 15.025 15.402C15.697 14.774 16.592 14.46 17.71 14.46C18.43 14.46 19.049 14.619 19.567 14.937C20.085 15.255 20.344 15.822 20.344 16.638C20.344 17.79 19.897 18.366 19.004 18.366C18.668 18.366 18.397 18.27 18.191 18.078C17.985 17.886 17.882 17.618 17.882 17.274C17.882 16.914 18.026 16.666 18.314 16.53C18.602 16.394 18.89 16.326 19.178 16.326C19.346 16.326 19.49 16.342 19.61 16.374C19.034 15.558 18.23 15.15 17.198 15.15C16.478 15.15 15.886 15.422 15.422 15.966C14.958 16.51 14.726 17.398 14.726 18.63V21H14.017ZM5 21L5 18C5 16.896 5.336 16.03 6.008 15.402C6.68 14.774 7.575 14.46 8.693 14.46C9.413 14.46 10.032 14.619 10.55 14.937C11.068 15.255 11.327 15.822 11.327 16.638C11.327 17.79 10.88 18.366 9.987 18.366C9.651 18.366 9.38 18.27 9.174 18.078C8.968 17.886 8.865 17.618 8.865 17.274C8.865 16.914 9.009 16.666 9.297 16.53C9.585 16.394 9.873 16.326 10.161 16.326C10.329 16.326 10.473 16.342 10.593 16.374C10.017 15.558 9.213 15.15 8.181 15.15C7.461 15.15 6.869 15.422 6.405 15.966C5.941 16.51 5.709 17.398 5.709 18.63V21H5Z" />
                    </svg>
                </div>

                <div class="relative z-10 h-full flex flex-col justify-between">
                    <div>
                        <div class="flex text-yellow-500 mb-6">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        </div>
                        <blockquote class="text-xl md:text-2xl font-medium leading-relaxed mb-6">
                            "United Apparel Group helped us scale our brand from a garage startup to an international
                            label. Their quality and consistency are unmatched."
                        </blockquote>
                    </div>
                    <div>
                        <p class="font-bold text-lg">Sarah Jenkins</p>
                        <p class="text-gray-400 text-sm">Founder, Urban Ethos</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Materials / Markets Banner -->
<section class="py-20 bg-brand-black text-white text-center">
    <div class="max-w-[1440px] mx-auto px-4">
        <h2 class="text-3xl font-bold mb-12">Premium Materials</h2>
        <div class="grid grid-cols-2 md:grid-cols-5 gap-8">
            <div class="p-4 border border-white/10 hover:border-white/30 transition-colors">
                <p class="font-medium">Cotton</p>
            </div>
            <div class="p-4 border border-white/10 hover:border-white/30 transition-colors">
                <p class="font-medium">Polyester</p>
            </div>
            <div class="p-4 border border-white/10 hover:border-white/30 transition-colors">
                <p class="font-medium">Denim</p>
            </div>
            <div class="p-4 border border-white/10 hover:border-white/30 transition-colors">
                <p class="font-medium">Blended Fabrics</p>
            </div>
            <div class="p-4 border border-white/10 hover:border-white/30 transition-colors">
                <p class="font-medium">Sustainable </p>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>