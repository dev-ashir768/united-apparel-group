<?php include 'includes/header.php'; ?>

<!-- Breadcrumbs -->
<div class="bg-gray-50 py-4">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex text-sm text-gray-500">
            <a href="/" class="hover:text-black transition-colors">Home</a>
            <span class="mx-2">/</span>
            <span class="text-gray-900 font-medium">Track Order</span>
        </nav>
    </div>
</div>

<section class="py-16 md:py-24 bg-white relative overflow-hidden">
    <!-- Background Decor (Light Gradients) -->
    <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-white via-gray-50 to-white -z-10"></div>
    <div class="absolute top-1/4 right-0 w-96 h-96 bg-blue-50 rounded-full blur-[100px] opacity-50 -z-10"></div>

    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-black text-brand-black mb-4 uppercase tracking-tight">Track Your Order
            </h1>
            <p class="text-gray-500 text-lg">Enter your order ID to see the current status of your shipment.</p>
        </div>

        <!-- Tracking Form -->
        <div
            class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100 mb-12 transform hover:scale-[1.01] transition-transform duration-500">
            <form class="flex flex-col md:flex-row gap-4">
                <div class="flex-1 relative">
                    <input type="text" id="order-id"
                        class="peer w-full border-2 border-gray-200 rounded-xl py-4 px-6 text-brand-black focus:outline-none focus:border-brand-black transition-colors placeholder-transparent bg-transparent font-bold tracking-widest uppercase"
                        placeholder="Order ID" value="ORD-882910">
                    <label for="order-id"
                        class="absolute left-4 -top-3 bg-white px-2 text-xs font-bold text-gray-500 transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-4 peer-focus:-top-3 peer-focus:text-xs peer-focus:text-brand-black">Order
                        ID</label>
                </div>
                <button type="button"
                    class="bg-brand-black text-white px-8 py-4 rounded-xl font-bold uppercase tracking-wider hover:bg-gray-800 transition-all shadow-lg hover:shadow-xl"
                    onclick="$('#result-container').slideDown()">
                    Track
                </button>
            </form>
        </div>

        <!-- Result Container (Hidden by Default) -->
        <div id="result-container" class="hidden">
            <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 relative overflow-hidden">
                <div class="flex justify-between items-center mb-8 border-b border-gray-100 pb-6">
                    <div>
                        <p class="text-sm text-gray-500 uppercase tracking-widest mb-1">Order Status</p>
                        <h3 class="text-2xl font-black text-green-600">In Transit</h3>
                    </div>
                    <div class="text-right">
                        <p class="text-sm text-gray-500 uppercase tracking-widest mb-1">Est. Delivery</p>
                        <h3 class="text-xl font-bold text-brand-black">Jan 24, 2026</h3>
                    </div>
                </div>

                <!-- Timeline -->
                <div class="relative py-4">
                    <!-- Line -->
                    <div class="absolute left-4 md:left-8 top-0 h-full w-1 bg-gray-100">
                        <div class="absolute top-0 left-0 w-full h-2/3 bg-brand-black"></div>
                    </div>

                    <!-- Steps -->
                    <div class="space-y-8 pl-12 md:pl-20 relative">
                        <!-- Step 1 -->
                        <div class="relative">
                            <div
                                class="absolute -left-[52px] md:-left-[84px] top-1 w-9 h-9 bg-brand-black rounded-full flex items-center justify-center text-white shadow-lg z-10">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <h4 class="text-lg font-bold text-brand-black">Order Placed</h4>
                            <p class="text-sm text-gray-500">Jan 16, 2026 - 9:42 AM</p>
                        </div>

                        <!-- Step 2 -->
                        <div class="relative">
                            <div
                                class="absolute -left-[52px] md:-left-[84px] top-1 w-9 h-9 bg-brand-black rounded-full flex items-center justify-center text-white shadow-lg z-10">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <h4 class="text-lg font-bold text-brand-black">Processing</h4>
                            <p class="text-sm text-gray-500">Jan 16, 2026 - 2:00 PM</p>
                        </div>

                        <!-- Step 3 (Current) -->
                        <div class="relative">
                            <div
                                class="absolute -left-[52px] md:-left-[84px] top-1 w-9 h-9 bg-brand-black rounded-full flex items-center justify-center text-white shadow-lg ring-4 ring-gray-100 z-10 animate-pulse">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <h4 class="text-lg font-bold text-brand-black">In Transit</h4>
                            <p class="text-sm text-gray-500">Order has left the distribution center.</p>
                        </div>

                        <!-- Step 4 -->
                        <div class="relative opacity-50">
                            <div
                                class="absolute -left-[52px] md:-left-[84px] top-1 w-9 h-9 bg-gray-200 rounded-full flex items-center justify-center text-gray-400 z-10">
                                <span class="text-xs font-bold">4</span>
                            </div>
                            <h4 class="text-lg font-bold text-gray-400">Delivered</h4>
                            <p class="text-sm text-gray-400">Expected by Jan 24</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>