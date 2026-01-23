<?php include 'includes/header.php'; ?>

<!-- Contact Hero -->
<section class="relative bg-brand-black text-white py-20">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4" data-aos="fade-up">Contact Us</h1>
        <p class="text-gray-400 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">
            Whether you’re looking for bulk apparel production, low MOQ orders, or worldwide shipping solutions, our
            team is ready to assist you.
        </p>
    </div>
</section>

<!-- Contact Content -->
<section class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8 py-20">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">

        <!-- Form Section -->
        <div data-aos="fade-right">
            <h2 class="text-2xl font-bold mb-8 text-brand-black">Send us a message</h2>
            <form class="space-y-6" id="contact-form">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="relative">
                        <input type="text" id="firstName"
                            class="peer w-full border-b-2 border-gray-200 bg-transparent py-2.5 placeholder-transparent focus:border-brand-black focus:outline-none transition-colors"
                            placeholder="First Name" />
                        <label for="firstName"
                            class="absolute left-0 -top-3.5 text-sm text-gray-500 transition-all peer-placeholder-shown:top-2.5 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:-top-3.5 peer-focus:text-sm peer-focus:text-brand-black">First
                            Name</label>
                    </div>
                    <div class="relative">
                        <input type="text" id="lastName"
                            class="peer w-full border-b-2 border-gray-200 bg-transparent py-2.5 placeholder-transparent focus:border-brand-black focus:outline-none transition-colors"
                            placeholder="Last Name" />
                        <label for="lastName"
                            class="absolute left-0 -top-3.5 text-sm text-gray-500 transition-all peer-placeholder-shown:top-2.5 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:-top-3.5 peer-focus:text-sm peer-focus:text-brand-black">Last
                            Name</label>
                    </div>
                </div>

                <div class="relative">
                    <input type="email" id="email"
                        class="peer w-full border-b-2 border-gray-200 bg-transparent py-2.5 placeholder-transparent focus:border-brand-black focus:outline-none transition-colors"
                        placeholder="Email Address" />
                    <label for="email"
                        class="absolute left-0 -top-3.5 text-sm text-gray-500 transition-all peer-placeholder-shown:top-2.5 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:-top-3.5 peer-focus:text-sm peer-focus:text-brand-black">Email
                        Address</label>
                </div>

                <div class="relative">
                    <select id="subject"
                        class="peer w-full border-b-2 border-gray-200 bg-transparent py-2.5 text-brand-black focus:border-brand-black focus:outline-none transition-colors">
                        <option value="" disabled selected>Select Subject</option>
                        <option value="wholesale">Wholesale Inquiry</option>
                        <option value="manufacturing">Manufacturing / OEM</option>
                        <option value="support">Customer Support</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <div class="relative">
                    <textarea id="message" rows="4"
                        class="peer w-full border-b-2 border-gray-200 bg-transparent py-2.5 placeholder-transparent focus:border-brand-black focus:outline-none transition-colors resize-none"
                        placeholder="Message"></textarea>
                    <label for="message"
                        class="absolute left-0 -top-3.5 text-sm text-gray-500 transition-all peer-placeholder-shown:top-2.5 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:-top-3.5 peer-focus:text-sm peer-focus:text-brand-black">Message</label>
                </div>

                <button type="submit"
                    class="bg-brand-black text-white px-8 py-4 rounded-lg font-bold uppercase tracking-wider hover:bg-gray-800 transition-colors shadow-lg">Send
                    Message</button>
            </form>
        </div>

        <!-- Info / Map Section -->
        <div data-aos="fade-left">
            <h2 class="text-2xl font-bold mb-8 text-brand-black">Headquarters</h2>
            <div class="bg-gray-50 p-8 rounded-2xl mb-8">
                <div class="space-y-6">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-bold text-brand-black">Address</h3>
                            <p class="text-gray-600 mt-1">400 Iroquois Shore Rd,<br>Oakville, ON L6H 1M3</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-bold text-brand-black">Email</h3>
                            <p class="text-gray-600 mt-1">info@unitedapparelgroup.com</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                </path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-bold text-brand-black">Phone</h3>
                            <p class="text-gray-600 mt-1">437-757-1044</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Map Placeholder -->
            <div class="w-full h-64 bg-gray-200 rounded-2xl overflow-hidden relative">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.15830869428!2d-74.119763973046!3d40.69766374874431!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY!5e0!3m2!1sen!2sus!4v1645564658428!5m2!1sen!2sus"
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</section>

<script src="assets/js/contact-form.js"></script>

<?php include 'includes/footer.php'; ?>