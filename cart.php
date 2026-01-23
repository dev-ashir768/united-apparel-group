<?php include 'includes/header.php'; ?>

<!-- Cart Hero -->
<section class="bg-gray-50 py-12">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-brand-black mb-2">Shopping Cart</h1>
        <p class="text-gray-500 text-sm">Review your selected items.</p>
    </div>
</section>

<!-- Cart Content -->
<section class="py-12 bg-white min-h-[60vh]">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

            <!-- Cart Items List -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-lg border border-gray-100 shadow-sm overflow-hidden" id="cart-container">
                    <!-- JS Injected Items -->
                    <div class="p-12 text-center text-gray-500">
                        <p class="mb-4">Your cart is currently empty.</p>
                        <a href="/" class="text-indigo-600 font-semibold hover:underline">Continue Shopping</a>
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="lg:col-span-1">
                <div class="bg-gray-50 rounded-xl p-6 sticky top-24">
                    <h3 class="text-xl font-bold text-brand-black mb-6">Order Summary</h3>

                    <div class="space-y-4 mb-6 text-sm text-gray-600">
                        <div class="flex justify-between">
                            <span>Subtotal</span>
                            <span class="font-bold text-gray-900" id="summary-subtotal">$0.00</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Shipping</span>
                            <span class="font-medium text-green-600" id="summary-shipping">Calculated at next
                                step</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Tax (Estimated 5%)</span>
                            <span class="font-bold text-gray-900" id="summary-tax">$0.00</span>
                        </div>
                        <div
                            class="border-t border-gray-200 pt-4 flex justify-between text-base font-bold text-brand-black">
                            <span>Total</span>
                            <span class="text-xl" id="summary-total">$0.00</span>
                        </div>
                    </div>

                    <!-- Free Shipping Progress -->
                    <div id="free-shipping-bar" class="mb-8 hidden">
                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                            <div class="bg-indigo-600 h-2.5 rounded-full transition-all duration-500" style="width: 0%">
                            </div>
                        </div>
                        <p class="text-xs text-indigo-600 mt-2 font-medium text-center" id="free-shipping-text">Spend $X
                            more for Free Shipping</p>
                    </div>

                    <button type="button" id="checkout-btn"
                        class="w-full bg-brand-black text-white py-4 rounded-xl font-bold uppercase tracking-wider hover:bg-gray-800 transition-colors shadow-lg shadow-indigo-500/20">
                        Proceed to Checkout
                    </button>

                    <div class="mt-6 space-y-3">
                        <div class="flex items-center text-xs text-gray-500 justify-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                </path>
                            </svg>
                            Secure Checkout
                        </div>
                        <p class="text-center text-xs text-gray-400">Worldwide Shipping Available</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Checkout Modal (Hidden by Default) -->
<div id="checkout-modal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog"
    aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <!-- Overlay -->
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"
            id="checkout-overlay"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <!-- Modal Content -->
        <div
            class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:text-left w-full">
                        <h3 class="text-lg leading-6 font-bold text-gray-900 mb-6" id="modal-title">Checkout Details
                        </h3>
                        <form id="checkout-form" class="space-y-5">
                            <!-- Personal Info -->
                            <div class="grid grid-cols-1 gap-5">
                                <div class="relative">
                                    <input type="text" id="checkout-name"
                                        class="peer w-full border-b-2 border-gray-200 bg-transparent py-2.5 placeholder-transparent focus:border-brand-black focus:outline-none transition-colors"
                                        placeholder="Full Name" required>
                                    <label for="checkout-name"
                                        class="absolute left-0 -top-3.5 text-sm text-gray-500 transition-all peer-placeholder-shown:top-2.5 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:-top-3.5 peer-focus:text-sm peer-focus:text-brand-black">Full
                                        Name <span class="text-red-500">*</span></label>
                                </div>
                                <div class="relative">
                                    <input type="email" id="checkout-email"
                                        class="peer w-full border-b-2 border-gray-200 bg-transparent py-2.5 placeholder-transparent focus:border-brand-black focus:outline-none transition-colors"
                                        placeholder="Email Address" required>
                                    <label for="checkout-email"
                                        class="absolute left-0 -top-3.5 text-sm text-gray-500 transition-all peer-placeholder-shown:top-2.5 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:-top-3.5 peer-focus:text-sm peer-focus:text-brand-black">Email
                                        Address <span class="text-red-500">*</span></label>
                                </div>
                            </div>

                            <!-- Address -->
                            <div class="relative">
                                <input type="text" id="checkout-address"
                                    class="peer w-full border-b-2 border-gray-200 bg-transparent py-2.5 placeholder-transparent focus:border-brand-black focus:outline-none transition-colors"
                                    placeholder="Shipping Address" required>
                                <label for="checkout-address"
                                    class="absolute left-0 -top-3.5 text-sm text-gray-500 transition-all peer-placeholder-shown:top-2.5 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:-top-3.5 peer-focus:text-sm peer-focus:text-brand-black">Shipping
                                    Address <span class="text-red-500">*</span></label>
                            </div>

                            <div class="grid grid-cols-2 gap-5">
                                <div class="relative">
                                    <select id="checkout-country"
                                        class="peer w-full border-b-2 border-gray-200 bg-transparent py-2.5 text-brand-black focus:border-brand-black focus:outline-none transition-colors"
                                        required>
                                        <option value="">Select Country</option>
                                        <option value="US">United States</option>
                                        <option value="PK" selected>Pakistan</option>
                                        <option value="UK">United Kingdom</option>
                                        <option value="CA">Canada</option>
                                        <option value="AU">Australia</option>
                                        <option value="AE">United Arab Emirates</option>
                                        <option value="SA">Saudi Arabia</option>
                                        <option value="DE">Germany</option>
                                        <option value="FR">France</option>
                                    </select>
                                    <label for="checkout-country"
                                        class="absolute left-0 -top-3.5 text-sm text-gray-500">Country <span
                                            class="text-red-500">*</span></label>
                                </div>
                                <div class="relative">
                                    <input type="text" id="checkout-city"
                                        class="peer w-full border-b-2 border-gray-200 bg-transparent py-2.5 placeholder-transparent focus:border-brand-black focus:outline-none transition-colors"
                                        placeholder="City" required>
                                    <label for="checkout-city"
                                        class="absolute left-0 -top-3.5 text-sm text-gray-500 transition-all peer-placeholder-shown:top-2.5 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:-top-3.5 peer-focus:text-sm peer-focus:text-brand-black">City
                                        <span class="text-red-500">*</span></label>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-5">
                                <div class="relative">
                                    <input type="tel" id="checkout-phone"
                                        class="peer w-full border-b-2 border-gray-200 bg-transparent py-2.5 placeholder-transparent focus:border-brand-black focus:outline-none transition-colors"
                                        placeholder="Phone Number" required>
                                    <label for="checkout-phone"
                                        class="absolute left-0 -top-3.5 text-sm text-gray-500 transition-all peer-placeholder-shown:top-2.5 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:-top-3.5 peer-focus:text-sm peer-focus:text-brand-black">Phone
                                        Number <span class="text-red-500">*</span></label>
                                </div>
                                <div class="relative">
                                    <input type="text" id="checkout-zip"
                                        class="peer w-full border-b-2 border-gray-200 bg-transparent py-2.5 placeholder-transparent focus:border-brand-black focus:outline-none transition-colors"
                                        placeholder="ZIP Code" required>
                                    <label for="checkout-zip"
                                        class="absolute left-0 -top-3.5 text-sm text-gray-500 transition-all peer-placeholder-shown:top-2.5 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:-top-3.5 peer-focus:text-sm peer-focus:text-brand-black">ZIP
                                        Code <span class="text-red-500">*</span></label>
                                </div>
                            </div>

                            <!-- Payment Method -->
                            <div class="pt-4 border-t border-gray-100">
                                <label
                                    class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-3">Payment
                                    Method</label>
                                <div class="grid grid-cols-2 gap-4">
                                    <label
                                        class="border-2 border-indigo-600 bg-indigo-50 rounded-lg p-4 flex flex-col items-center justify-center cursor-pointer transition-all">
                                        <input type="radio" name="payment" value="cod" class="hidden" checked>
                                        <svg class="w-6 h-6 text-indigo-600 mb-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z">
                                            </path>
                                        </svg>
                                        <span class="text-xs font-bold text-indigo-900">COD</span>
                                    </label>
                                    <label
                                        class="border border-gray-200 rounded-lg p-4 flex flex-col items-center justify-center cursor-not-allowed opacity-50 bg-gray-50">
                                        <input type="radio" name="payment" value="card" class="hidden" disabled>
                                        <svg class="w-6 h-6 text-gray-400 mb-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                                            </path>
                                        </svg>
                                        <span class="text-xs font-bold text-gray-500">Card</span>
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="button" id="confirm-order-btn"
                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Place Order
                </button>
                <button type="button" id="close-modal-btn"
                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>