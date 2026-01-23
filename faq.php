<?php include 'includes/header.php'; ?>

<!-- Breadcrumbs -->
<div class="bg-gray-50 py-4">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex text-sm text-gray-500">
            <a href="/" class="hover:text-black transition-colors">Home</a>
            <span class="mx-2">/</span>
            <span class="text-gray-900 font-medium">FAQs</span>
        </nav>
    </div>
</div>

<section class="py-16 md:py-24 bg-white">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-black text-brand-black mb-4 uppercase tracking-tight">Frequently Asked
                Questions</h1>
            <p class="text-gray-500 text-lg">Have questions? We're here to help.</p>
        </div>

        <div class="space-y-4" id="faq-accordion">
            <!-- FAQ Item 1 -->
            <div class="border border-gray-200 rounded-2xl overflow-hidden">
                <button
                    class="w-full flex justify-between items-center p-6 bg-white hover:bg-gray-50 transition-colors focus:outline-none"
                    onclick="$(this).next().slideToggle(); $(this).find('svg').toggleClass('rotate-180')">
                    <span class="font-bold text-lg text-brand-black">What is your return policy?</span>
                    <svg class="w-6 h-6 transform transition-transform duration-300" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div class="hidden bg-gray-50 p-6 border-t border-gray-200">
                    <p class="text-gray-600 leading-relaxed">We offer a 30-day return policy for all unused and unworn
                        items. If you are not completely satisfied with your purchase, you can return it for a full
                        refund or exchange. Please keep the original tags attached.</p>
                </div>
            </div>

            <!-- FAQ Item 2 -->
            <div class="border border-gray-200 rounded-2xl overflow-hidden">
                <button
                    class="w-full flex justify-between items-center p-6 bg-white hover:bg-gray-50 transition-colors focus:outline-none"
                    onclick="$(this).next().slideToggle(); $(this).find('svg').toggleClass('rotate-180')">
                    <span class="font-bold text-lg text-brand-black">How long does shipping take?</span>
                    <svg class="w-6 h-6 transform transition-transform duration-300" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div class="hidden bg-gray-50 p-6 border-t border-gray-200">
                    <p class="text-gray-600 leading-relaxed">Standard shipping typically takes 3-5 business days.
                        Expedited shipping options are available at checkout for 1-2 day delivery.</p>
                </div>
            </div>

            <!-- FAQ Item 3 -->
            <div class="border border-gray-200 rounded-2xl overflow-hidden">
                <button
                    class="w-full flex justify-between items-center p-6 bg-white hover:bg-gray-50 transition-colors focus:outline-none"
                    onclick="$(this).next().slideToggle(); $(this).find('svg').toggleClass('rotate-180')">
                    <span class="font-bold text-lg text-brand-black">Do you ship internationally?</span>
                    <svg class="w-6 h-6 transform transition-transform duration-300" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div class="hidden bg-gray-50 p-6 border-t border-gray-200">
                    <p class="text-gray-600 leading-relaxed">Yes, we ship to most countries worldwide. International
                        shipping rates and times vary depending on the destination. You can calculate shipping costs at
                        checkout.</p>
                </div>
            </div>

            <!-- FAQ Item 4 -->
            <div class="border border-gray-200 rounded-2xl overflow-hidden">
                <button
                    class="w-full flex justify-between items-center p-6 bg-white hover:bg-gray-50 transition-colors focus:outline-none"
                    onclick="$(this).next().slideToggle(); $(this).find('svg').toggleClass('rotate-180')">
                    <span class="font-bold text-lg text-brand-black">How can I track my order?</span>
                    <svg class="w-6 h-6 transform transition-transform duration-300" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div class="hidden bg-gray-50 p-6 border-t border-gray-200">
                    <p class="text-gray-600 leading-relaxed">Once your order has shipped, you will receive an email with
                        a tracking number. You can also track your order directly on our <a href="track-order.php"
                            class="text-indigo-600 font-bold hover:underline">Track Order</a> page.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>