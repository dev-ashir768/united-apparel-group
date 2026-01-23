<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>United Apparel Group | Global Manufacturing & Supply Partner</title>

    <!-- Tailwind CSS (Play CDN for Development) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Tailwind Config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            black: '#000000',
                            dark: '#111111',
                            gray: '#f5f5f5',
                            accent: '#333333'
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css?v=<?php echo time(); ?>">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

</head>

<body class="bg-white text-brand-black">

    <!-- Header -->
    <header class="fixed w-full top-0 z-50 bg-white border-b border-gray-100 transition-all duration-300 shadow-sm"
        id="main-header">

        <!-- Announcement Bar -->
        <div class="bg-gray-900 text-white text-[11px] font-bold text-center py-2 tracking-widest uppercase">
            Worldwide Shipping Available • Free Shipping on Orders Over $100
        </div>

        <!-- Top Bar: Logo, Search, Actions -->
        <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Top Bar -->
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <a href="/" class="flex-shrink-0">
                    <img src="assets/img/logo.png" alt="United Apparel Group" class="h-16 w-auto object-contain">
                </a>

                <!-- Search Bar (Desktop) -->
                <div class="hidden md:flex flex-1 max-w-lg mx-12">
                    <form action="category" method="GET" class="relative w-full">
                        <input type="text" name="search" placeholder="Search for products..."
                            class="w-full bg-gray-50 border border-gray-200 rounded-full py-2.5 px-6 text-sm focus:outline-none focus:border-brand-black transition-colors">
                        <button type="submit"
                            class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-brand-black">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                    </form>
                </div>

                <!-- Icons (Desktop) -->
                <div class="hidden md:flex items-center space-x-6">
                    <!-- Wishlist -->
                    <a href="wishlist.php" class="text-gray-600 hover:text-brand-black transition-colors relative group"
                        aria-label="Wishlist" data-tippy-content="View Wishlist">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                            </path>
                        </svg>
                        <!-- Wishlist Badge -->
                        <span id="header-wishlist-count"
                            class="absolute -top-1 -right-1 bg-red-500 text-white text-[10px] font-bold w-4 h-4 rounded-full flex items-center justify-center hidden">0</span>
                    </a>

                    <!-- Cart -->
                    <a href="cart.php" class="text-gray-600 hover:text-brand-black transition-colors relative group"
                        aria-label="Cart" data-tippy-content="View Cart">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                        <!-- Cart Badge -->
                        <span id="header-cart-count"
                            class="absolute -top-1 -right-1 bg-brand-black text-white text-[10px] font-bold w-4 h-4 rounded-full flex items-center justify-center hidden">0</span>
                    </a>
                </div>

                <!-- Mobile Menu Button + Icons -->
                <div class="md:hidden flex items-center space-x-4">
                    <!-- Mobile Wishlist -->
                    <a href="wishlist" class="text-gray-600 hover:text-brand-black transition-colors relative">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                            </path>
                        </svg>
                        <span id="mobile-wishlist-count"
                            class="absolute -top-1 -right-1 bg-red-500 text-white text-[10px] font-bold w-4 h-4 rounded-full flex items-center justify-center hidden">0</span>
                    </a>

                    <!-- Mobile Cart -->
                    <a href="cart" class="text-gray-600 hover:text-brand-black transition-colors relative">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                        <span id="mobile-cart-count"
                            class="absolute -top-1 -right-1 bg-brand-black text-white text-[10px] font-bold w-4 h-4 rounded-full flex items-center justify-center hidden">0</span>
                    </a>

                    <!-- Hamburger Menu -->
                    <button id="mobile-menu-btn" class="text-brand-black focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Bottom Bar: Navigation (Desktop) - Adjusted for Full Width Look -->
        <div class="hidden md:block bg-brand-black text-white w-full">
            <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
                <nav class="flex items-center justify-center h-12 space-x-12">
                    <?php
                    $currentPage = basename($_SERVER['PHP_SELF']);
                    $navItems = [
                        ['link' => 'index', 'title' => 'Home'],
                        ['link' => 'category?cat=men', 'title' => "Men's"],
                        ['link' => 'category?cat=women', 'title' => "Women's"],
                        ['link' => 'category?cat=kids', 'title' => "Kids"],
                        ['link' => 'category?cat=sports', 'title' => "Sports"],
                        ['link' => 'bulk-purchase', 'title' => "Bulk Purchase"],
                        ['link' => 'about', 'title' => "About"],
                        ['link' => 'contact', 'title' => "Contact"]
                    ];

                    foreach ($navItems as $item):
                        $link = $item['link'];
                        $cleanLink = str_replace('.php', '', $link); // Simple check
                        $uri = $_SERVER['REQUEST_URI'];
                        // Basic active check (can be improved)
                        $isActive = (strpos($uri, $cleanLink) !== false || ($item['title'] == 'Home' && ($uri == '/' || $uri == '/index')))
                            ? 'text-white border-b-2 border-white'
                            : 'text-gray-300 hover:text-white';
                        ?>
                        <a href="<?= $link ?>"
                            class="text-sm font-medium uppercase tracking-wider transition-all py-1 hover:text-white <?= $isActive ?>"><?= $item['title'] ?></a>
                    <?php endforeach; ?>
                </nav>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu"
            class="hidden md:hidden absolute top-full left-0 w-full bg-white border-b border-gray-100 shadow-xl z-50">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="/"
                    class="block px-3 py-3 text-sm font-bold text-gray-800 uppercase hover:bg-gray-50 border-b border-gray-50">Home</a>
                <a href="category?cat=men"
                    class="block px-3 py-3 text-sm font-bold text-gray-800 uppercase hover:bg-gray-50 border-b border-gray-50">Men's</a>
                <a href="category?cat=women"
                    class="block px-3 py-3 text-sm font-bold text-gray-800 uppercase hover:bg-gray-50 border-b border-gray-50">Women's</a>
                <a href="category?cat=kids"
                    class="block px-3 py-3 text-sm font-bold text-gray-800 uppercase hover:bg-gray-50 border-b border-gray-50">Kids</a>
                <a href="category?cat=sports"
                    class="block px-3 py-3 text-sm font-bold text-gray-800 uppercase hover:bg-gray-50 border-b border-gray-50">Sports</a>
                <a href="track-order"
                    class="block px-3 py-3 text-sm font-bold text-gray-800 uppercase hover:bg-gray-50 border-b border-gray-50">Track
                    Order</a>
                <a href="about"
                    class="block px-3 py-3 text-sm font-bold text-gray-800 uppercase hover:bg-gray-50 border-b border-gray-50">About</a>
                <a href="contact"
                    class="block px-3 py-3 text-sm font-bold text-gray-800 uppercase hover:bg-gray-50">Contact</a>
            </div>
        </div>
    </header>

    <!-- Main Content Wrapper to push content below fixed header -->
    <!-- Height adjusted for Header (Approx 120px Mobile / 160px Desktop) -->
    <main class="pt-[120px] md:pt-[160px]">