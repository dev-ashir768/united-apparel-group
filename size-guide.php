<?php include 'includes/header.php'; ?>

<!-- Size Guide CSS Specifics -->
<style>
    .glass-panel {
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.5);
    }

    .guide-card:hover .icon-box {
        transform: scale(1.1) rotate(5deg);
    }
</style>

<!-- Hero -->
<div class="relative bg-brand-black text-white py-20 overflow-hidden">
    <div class="absolute inset-0 opacity-20 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <h1 class="text-4xl md:text-5xl font-black mb-4 tracking-tight">Find Your Perfect Fit</h1>
        <p class="text-gray-400 text-lg max-w-2xl mx-auto">Precision measurement guides for every collection. Shop with
            confidence.</p>
    </div>
</div>

<section class="py-16 bg-gradient-to-br from-indigo-50 to-white">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Measuring Instructions -->
        <div class="mb-20">
            <h2 class="text-3xl font-bold text-center mb-12">How to Measure</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Measure Chest -->
                <div
                    class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 text-center guide-card transition-all hover:shadow-2xl">
                    <div
                        class="w-16 h-16 bg-indigo-100 text-indigo-600 rounded-full flex items-center justify-center mx-auto mb-6 icon-box transition-transform duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Chest / Bust</h3>
                    <p class="text-gray-500 text-sm">Measure around the fullest part of your chest, keeping the tape
                        horizontal.</p>
                </div>
                <!-- Measure Waist -->
                <div
                    class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 text-center guide-card transition-all hover:shadow-2xl">
                    <div
                        class="w-16 h-16 bg-indigo-100 text-indigo-600 rounded-full flex items-center justify-center mx-auto mb-6 icon-box transition-transform duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Waist</h3>
                    <p class="text-gray-500 text-sm">Measure around the narrowest part of your waist (typically the
                        small of your back).</p>
                </div>
                <!-- Measure Hips -->
                <div
                    class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 text-center guide-card transition-all hover:shadow-2xl">
                    <div
                        class="w-16 h-16 bg-indigo-100 text-indigo-600 rounded-full flex items-center justify-center mx-auto mb-6 icon-box transition-transform duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Hips</h3>
                    <p class="text-gray-500 text-sm">Measure around the fullest part of your hips.</p>
                </div>
            </div>
        </div>

        <!-- Category Tabs -->
        <div class="flex flex-wrap justify-center gap-4 mb-16">
            <button data-target="#tab-men"
                class="size-tab-btn px-8 py-3 rounded-full shadow-sm hover:shadow-md transition-all text-sm font-bold bg-brand-black text-white">Men</button>
            <button data-target="#tab-women"
                class="size-tab-btn px-8 py-3 rounded-full shadow-sm hover:shadow-md transition-all text-sm font-bold bg-white text-gray-700 hover:bg-gray-50">Women</button>
            <button data-target="#tab-kids"
                class="size-tab-btn px-8 py-3 rounded-full shadow-sm hover:shadow-md transition-all text-sm font-bold bg-white text-gray-700 hover:bg-gray-50">Kids
                & Baby</button>
            <button data-target="#tab-active"
                class="size-tab-btn px-8 py-3 rounded-full shadow-sm hover:shadow-md transition-all text-sm font-bold bg-white text-gray-700 hover:bg-gray-50">Activewear</button>
        </div>

        <!-- Size Charts Content Area -->
        <div class="min-h-[500px]">

            <!-- Men's Section -->
            <div id="tab-men" class="size-tab-content">
                <h2 class="text-3xl font-bold mb-8 text-brand-black flex items-center justify-center">
                    Men's Clothing
                </h2>
                <p class="mb-12 text-gray-500 text-center">T-Shirts, Shirts, Hoodies, Jackets, Jeans, Formal Wear</p>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                    <div class="glass-panel p-8 rounded-3xl shadow-xl">
                        <h3 class="text-xl font-bold mb-6 border-b pb-4">Tops & Outerwear</h3>
                        <div class="overflow-x-auto rounded-xl border border-gray-200">
                            <table class="w-full text-sm text-left">
                                <thead class="bg-gray-50 text-gray-500 uppercase font-bold text-xs">
                                    <tr>
                                        <th class="px-6 py-4">Size</th>
                                        <th class="px-6 py-4">Chest (in)</th>
                                        <th class="px-6 py-4">Waist (in)</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100 bg-white">
                                    <tr>
                                        <td class="px-6 py-4 font-bold">S</td>
                                        <td class="px-6 py-4">34 - 36</td>
                                        <td class="px-6 py-4">28 - 30</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 font-bold">M</td>
                                        <td class="px-6 py-4">38 - 40</td>
                                        <td class="px-6 py-4">32 - 34</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 font-bold">L</td>
                                        <td class="px-6 py-4">42 - 44</td>
                                        <td class="px-6 py-4">36 - 38</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 font-bold">XL</td>
                                        <td class="px-6 py-4">46 - 48</td>
                                        <td class="px-6 py-4">40 - 42</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 font-bold">XXL</td>
                                        <td class="px-6 py-4">50 - 52</td>
                                        <td class="px-6 py-4">44 - 46</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="glass-panel p-8 rounded-3xl shadow-xl">
                        <h3 class="text-xl font-bold mb-6 border-b pb-4">Bottoms & Jeans</h3>
                        <div class="overflow-x-auto rounded-xl border border-gray-200">
                            <table class="w-full text-sm text-left">
                                <thead class="bg-gray-50 text-gray-500 uppercase font-bold text-xs">
                                    <tr>
                                        <th class="px-6 py-4">Size</th>
                                        <th class="px-6 py-4">Waist (in)</th>
                                        <th class="px-6 py-4">Inseam (in)</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100 bg-white">
                                    <tr>
                                        <td class="px-6 py-4 font-bold">30</td>
                                        <td class="px-6 py-4">30</td>
                                        <td class="px-6 py-4">30-32</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 font-bold">32</td>
                                        <td class="px-6 py-4">32</td>
                                        <td class="px-6 py-4">30-32</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 font-bold">34</td>
                                        <td class="px-6 py-4">34</td>
                                        <td class="px-6 py-4">32-34</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 font-bold">36</td>
                                        <td class="px-6 py-4">36</td>
                                        <td class="px-6 py-4">32-34</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Women's Section -->
            <div id="tab-women" class="size-tab-content hidden">
                <h2 class="text-3xl font-bold mb-8 text-brand-black flex items-center justify-center">
                    Women's Clothing
                </h2>
                <p class="mb-12 text-gray-500 text-center">Dresses, Tops, Casual Wear</p>
                <div class="glass-panel p-8 rounded-3xl shadow-xl max-w-4xl mx-auto">
                    <div class="overflow-x-auto rounded-xl border border-gray-200">
                        <table class="w-full text-sm text-left">
                            <thead class="bg-gray-50 text-gray-500 uppercase font-bold text-xs">
                                <tr>
                                    <th class="px-6 py-4">Size</th>
                                    <th class="px-6 py-4">Bust (in)</th>
                                    <th class="px-6 py-4">Waist (in)</th>
                                    <th class="px-6 py-4">Hips (in)</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 bg-white">
                                <tr>
                                    <td class="px-6 py-4 font-bold">XS (0-2)</td>
                                    <td class="px-6 py-4">31 - 32</td>
                                    <td class="px-6 py-4">24 - 25</td>
                                    <td class="px-6 py-4">33 - 34</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 font-bold">S (4-6)</td>
                                    <td class="px-6 py-4">33 - 34</td>
                                    <td class="px-6 py-4">26 - 27</td>
                                    <td class="px-6 py-4">35 - 36</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 font-bold">M (8-10)</td>
                                    <td class="px-6 py-4">35 - 37</td>
                                    <td class="px-6 py-4">28 - 29</td>
                                    <td class="px-6 py-4">37 - 39</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 font-bold">L (12-14)</td>
                                    <td class="px-6 py-4">38 - 40</td>
                                    <td class="px-6 py-4">30 - 32</td>
                                    <td class="px-6 py-4">40 - 42</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Kids & Baby Section -->
            <div id="tab-kids" class="size-tab-content hidden">
                <h2 class="text-3xl font-bold mb-8 text-brand-black flex items-center justify-center">
                    Kids & Baby Wear
                </h2>
                <p class="mb-12 text-gray-500 text-center">Everyday Wear, School Wear, Seasonal Collections</p>
                <div class="glass-panel p-8 rounded-3xl shadow-xl max-w-4xl mx-auto">
                    <div class="overflow-x-auto rounded-xl border border-gray-200">
                        <table class="w-full text-sm text-left">
                            <thead class="bg-gray-50 text-gray-500 uppercase font-bold text-xs">
                                <tr>
                                    <th class="px-6 py-4">Age / Size</th>
                                    <th class="px-6 py-4">Height (in)</th>
                                    <th class="px-6 py-4">Weight (lbs)</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 bg-white">
                                <tr>
                                    <td class="px-6 py-4 font-bold">2T</td>
                                    <td class="px-6 py-4">33 - 35</td>
                                    <td class="px-6 py-4">24 - 29</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 font-bold">3T</td>
                                    <td class="px-6 py-4">35 - 38</td>
                                    <td class="px-6 py-4">29 - 33</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 font-bold">4T</td>
                                    <td class="px-6 py-4">38 - 41</td>
                                    <td class="px-6 py-4">33 - 37</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 font-bold">5</td>
                                    <td class="px-6 py-4">41 - 44</td>
                                    <td class="px-6 py-4">37 - 43</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 font-bold">6</td>
                                    <td class="px-6 py-4">44 - 46</td>
                                    <td class="px-6 py-4">43 - 50</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 font-bold">8</td>
                                    <td class="px-6 py-4">50 - 53</td>
                                    <td class="px-6 py-4">55 - 65</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Activewear & Sportswear -->
            <div id="tab-active" class="size-tab-content hidden">
                <h2 class="text-3xl font-bold mb-8 text-brand-black flex items-center justify-center">
                    Activewear & Sportswear
                </h2>
                <p class="mb-12 text-gray-500 text-center">Gym Wear, Tracksuits, Performance Apparel (Unisex)</p>
                <div class="glass-panel p-8 rounded-3xl shadow-xl max-w-4xl mx-auto">
                    <div class="overflow-x-auto rounded-xl border border-gray-200">
                        <table class="w-full text-sm text-left">
                            <thead class="bg-gray-50 text-gray-500 uppercase font-bold text-xs">
                                <tr>
                                    <th class="px-6 py-4">Size</th>
                                    <th class="px-6 py-4">Chest (in)</th>
                                    <th class="px-6 py-4">Waist (in)</th>
                                    <th class="px-6 py-4">Fit Type</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 bg-white">
                                <tr>
                                    <td class="px-6 py-4 font-bold">S</td>
                                    <td class="px-6 py-4">35 - 37</td>
                                    <td class="px-6 py-4">29 - 31</td>
                                    <td class="px-6 py-4 text-gray-500">Compression / Fitted</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 font-bold">M</td>
                                    <td class="px-6 py-4">38 - 40</td>
                                    <td class="px-6 py-4">32 - 34</td>
                                    <td class="px-6 py-4 text-gray-500">Standard Fit</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 font-bold">L</td>
                                    <td class="px-6 py-4">41 - 43</td>
                                    <td class="px-6 py-4">35 - 37</td>
                                    <td class="px-6 py-4 text-gray-500">Relaxed Fit</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 font-bold">XL</td>
                                    <td class="px-6 py-4">44 - 46</td>
                                    <td class="px-6 py-4">38 - 40</td>
                                    <td class="px-6 py-4 text-gray-500">Loose Fit</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="mt-16 text-center">
        <p class="text-gray-500">Need personal assistance?</p>
        <a href="contact.php" class="inline-block mt-2 text-indigo-600 font-bold hover:underline">Contact our Fit
            Experts</a>
    </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>