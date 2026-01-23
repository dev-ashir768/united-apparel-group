$(document).ready(function () {
  // Initialize AOS
  AOS.init({
    duration: 800,
    easing: "ease-out-cubic",
    once: true,
    offset: 50,
  });

  // Mobile Menu Toggle
  $("#mobile-menu-btn").click(function () {
    $("#mobile-menu").toggleClass("hidden");
  });

  // Products data is loaded from data.js file
  // No hardcoded products here - all managed via admin panel

  // Initialize Tippy
  tippy("[data-tippy-content]", {
    animation: "scale",
    theme: "light",
  });

  // --- STATE MANAGEMENT ---
  let cart = JSON.parse(localStorage.getItem("cart")) || [];
  // SANITIZE CART: Ensure IDs are numbers
  cart = cart.map((item) => ({
    ...item,
    id: parseInt(item.id),
    quantity: parseInt(item.quantity),
  }));

  let wishlist = JSON.parse(localStorage.getItem("wishlist")) || [];
  console.log("Main.js Loaded v2.1 - Cart:", cart);

  // --- HELPER FUNCTIONS ---
  function saveCart() {
    localStorage.setItem("cart", JSON.stringify(cart));
    updateCartCount();
    // Re-render all cards to update their state (Add to Cart vs Counter)
    if (typeof products !== "undefined") {
      // Re-render visible sections.
      // Note: Full re-render might be heavy, ideally we update specific DOM elements.
      // For simplicity and correctness, we will re-render swipers where needed.
      // But doing full re-init of swiper is bad UX (resets position).
      // Better: Find the specific card elements and update their button area.
      updateAllProductCardsUI();
      updateProductDetailUI(); // Update single product detail page if active
    }
  }

  function saveWishlist() {
    localStorage.setItem("wishlist", JSON.stringify(wishlist));
    updateWishlistCount();
  }

  function updateCartCount() {
    const count = cart.reduce((acc, item) => acc + item.quantity, 0);
    // Update both desktop and mobile badges
    const badges = $("#header-cart-count, #mobile-cart-count");
    badges.text(count);
    if (count > 0) {
      badges.removeClass("hidden").addClass("animate-bounce");
    } else {
      badges.addClass("hidden");
    }
    setTimeout(() => badges.removeClass("animate-bounce"), 1000);
  }

  function updateWishlistCount() {
    const count = wishlist.length;
    // Update both desktop and mobile badges
    const badges = $("#header-wishlist-count, #mobile-wishlist-count");
    badges.text(count);
    if (count > 0) {
      badges.removeClass("hidden");
    } else {
      badges.addClass("hidden");
    }
  }

  function getProductById(id) {
    if (typeof products === "undefined") return null;
    // Flatten all products
    return Object.values(products)
      .flat()
      .find((p) => p.id == id);
  }

  // --- RENDER FUNCTIONS ---

  // Create HTML for a single Product Card
  function createProductCard(product) {
    const isWishlisted = wishlist.includes(product.id);
    const cartItem = cart.find((item) => item.id == product.id);
    const quantity = cartItem ? cartItem.quantity : 0;

    const oldPriceHtml = product.oldPrice
      ? `<span class="text-gray-400 text-sm line-through">$${product.oldPrice.toFixed(2)}</span>`
      : "";
    const badgeHtml = product.badge
      ? `<span class="absolute top-4 left-4 text-white text-[10px] font-bold px-2 py-1 rounded uppercase tracking-wide z-10 ${product.badgeColor || "bg-brand-black"}">${product.badge}</span>`
      : "";
    const heartClass = isWishlisted
      ? "text-red-500 fill-current"
      : "text-gray-400 hover:text-red-500";

    // Dynamic Action Area: Button or Counter
    let actionHtml = "";
    if (quantity > 0) {
      actionHtml = `
        <div class="flex items-center justify-between bg-gray-900 rounded-lg shadow-lg w-full text-white overflow-hidden">
            <button class="px-4 py-3 hover:bg-gray-700 transition-colors font-bold card-qty-btn" data-action="decrease" data-id="${product.id}">-</button>
            <span class="font-bold text-sm bg-gray-800 h-full flex items-center px-3">${quantity}</span>
            <button class="px-4 py-3 hover:bg-gray-700 transition-colors font-bold card-qty-btn" data-action="increase" data-id="${product.id}">+</button>
        </div>`;
    } else {
      actionHtml = `
        <button class="w-full bg-brand-black text-white py-3 rounded-lg text-sm font-semibold hover:bg-gray-900 transition-colors shadow-lg add-to-cart-btn" data-id="${product.id}">
            Add to Cart
        </button>`;
    }

    return `
            <div class="swiper-slide h-auto" data-product-id="${product.id}">
                <div class="bg-white rounded-xl overflow-hidden group shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 h-full flex flex-col relative">
                    <button class="absolute top-4 right-4 z-20 p-2 bg-white rounded-full shadow-md wishlist-btn transition-transform hover:scale-110" data-id="${product.id}">
                        <svg class="w-5 h-5 ${heartClass}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                    </button>
                    
                    <div class="relative aspect-[3/4] overflow-hidden bg-gray-100">
                        ${badgeHtml}
                        <a href="product.php?id=${product.id}" class="block w-full h-full">
                            <img src="${product.image}" alt="${product.name}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        </a>
                        <!-- Bottom Action Area -->
                        <div class="absolute inset-x-0 bottom-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 z-10 action-container">
                            ${actionHtml}
                        </div>
                    </div>
                    <div class="p-5 flex-1 flex flex-col">
                        <p class="text-xs text-gray-500 mb-1">${product.category}</p>
                        <h3 class="font-bold text-lg mb-2 text-brand-black hover:text-indigo-600 transition-colors line-clamp-2"><a href="product.php?id=${product.id}">${product.name}</a></h3>
                        <div class="flex items-center space-x-2 mt-auto">
                            <span class="text-indigo-600 font-bold">$${product.price.toFixed(2)}</span>
                            ${oldPriceHtml}
                        </div>
                    </div>
                </div>
            </div>
        `;
  }

  // New Function to update UI without destroying Swiper or Grid
  function updateAllProductCardsUI() {
    // Select any container with data-product-id, whether it's a swiper slide or a grid item
    $("[data-product-id]").each(function () {
      const id = parseInt($(this).data("product-id"));
      const cartItem = cart.find((item) => item.id == id);
      const quantity = cartItem ? cartItem.quantity : 0;
      const container = $(this).find(".action-container");

      // Only update html if state changed to prevent layout thrashing (simple check)

      // But since we don't track prev state easily, allow re-write.
      let actionHtml = "";
      if (quantity > 0) {
        actionHtml = `
              <div class="flex items-center justify-between bg-gray-900 rounded-lg shadow-lg w-full text-white overflow-hidden">
                  <button class="px-4 py-3 hover:bg-gray-700 transition-colors font-bold card-qty-btn" data-action="decrease" data-id="${id}">-</button>
                  <span class="font-bold text-sm bg-gray-800 h-full flex items-center px-3">${quantity}</span>
                  <button class="px-4 py-3 hover:bg-gray-700 transition-colors font-bold card-qty-btn" data-action="increase" data-id="${id}">+</button>
              </div>`;
      } else {
        actionHtml = `
              <button class="w-full bg-brand-black text-white py-3 rounded-lg text-sm font-semibold hover:bg-gray-900 transition-colors shadow-lg add-to-cart-btn" data-id="${id}">
                  Add to Cart
              </button>`;
      }
      container.html(actionHtml);
    });
  }

  // Update Detail Page UI specifically
  function updateProductDetailUI() {
    const wrapper = $("#detail-actions-wrapper");
    if (!wrapper.length) return;

    const urlParams = new URLSearchParams(window.location.search);
    const id = urlParams.get("id");
    if (!id) return;

    const cartItem = cart.find((item) => item.id == id);
    let actionButtonsHtml = "";

    if (cartItem) {
      // If item is ALREADY in cart, show the big counter INSTEAD of "Add to Cart"
      actionButtonsHtml = `
              <div class="flex-1 flex items-center justify-between bg-gray-900 rounded-xl shadow-lg w-full text-white h-[60px] overflow-hidden border-2 border-brand-black">
                   <button class="h-full px-6 hover:bg-gray-700 transition-colors font-bold text-xl detail-pro-qty-btn" onclick="updateDetailCartQty(${id}, -1)">-</button>
                   <span class="font-bold text-xl">${cartItem.quantity} <span class="text-xs font-normal text-gray-400 ml-1">in cart</span></span>
                   <button class="h-full px-6 hover:bg-gray-700 transition-colors font-bold text-xl detail-pro-qty-btn" onclick="updateDetailCartQty(${id}, 1)">+</button>
              </div>
           `;
    } else {
      // Not in cart: Show Add Button Only (User Request: No Qty Input initially)
      actionButtonsHtml = `
                  <button class="flex-1 bg-brand-black text-white h-[60px] rounded-xl font-bold uppercase tracking-wider hover:bg-gray-800 transition-all shadow-lg transform hover:-translate-y-1 add-to-cart-btn" data-id="${id}" data-type="detail">
                      Add to Cart
                  </button>
           `;
    }
    wrapper.html(actionButtonsHtml);
  }

  // Populate a Swiper container
  function renderProductSwiper(data, containerId) {
    if (!$(containerId).length) return;
    const container = $(containerId).find(".swiper-wrapper");
    container.empty();
    data.forEach((product) => {
      container.append(createProductCard(product));
    });
  }

  // Initialize Swiper Instance
  function initProductSwiper(selector) {
    if (!$(selector).length) return;
    return new Swiper(selector, {
      slidesPerView: 1,
      spaceBetween: 24,
      loop: false, // Loop false to make it easier to manage state updates (no duplicate slides)
      autoplay: false, // user might be interacting
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      breakpoints: {
        640: { slidesPerView: 2 },
        768: { slidesPerView: 3 },
        1024: { slidesPerView: 4 },
      },
    });
  }

  // Render Wishlist Grid
  function renderWishlistPage() {
    const container = $("#wishlist-container");
    if (container.length) {
      container.empty();
      if (wishlist.length === 0) {
        container.html(`
                    <div class="col-span-full text-center py-20 text-gray-400">
                        <p>Your wishlist is empty.</p>
                        <a href="/" class="inline-block mt-4 text-indigo-600 font-semibold hover:underline">Explore Collection</a>
                    </div>
                 `);
        return;
      }

      wishlist.forEach((id) => {
        const product = getProductById(id);
        if (product) {
          let card = createProductCard(product).replace(
            "swiper-slide h-auto",
            "col-span-1",
          );
          // Remove the Swiper class if present in replacement
          container.append(card);
        }
      });
    }
  }

  // Render Cart Table
  function renderCartPage() {
    const container = $("#cart-container");
    if (container.length) {
      container.empty();
      if (cart.length === 0) {
        container.html(`
                    <div class="p-12 text-center text-gray-500">
                        <p class="mb-4">Your cart is currently empty.</p>
                        <a href="/" class="text-indigo-600 font-semibold hover:underline">Continue Shopping</a>
                    </div>
                `);
        $("#summary-subtotal").text("$0.00");
        $("#summary-tax").text("$0.00");
        $("#summary-total").text("$0.00");
        $("#summary-shipping").text("Calculated at checkout");
        $("#free-shipping-bar").addClass("hidden");
        return;
      }

      let html = '<div class="divide-y divide-gray-100">';
      let subtotal = 0;

      cart.forEach((item) => {
        const product = getProductById(item.id);
        if (product) {
          const total = product.price * item.quantity;
          subtotal += total;
          html += `
                        <div class="p-6 flex items-center flex-col sm:flex-row text-center sm:text-left">
                            <img src="${product.image}" class="w-20 h-24 object-cover rounded-md border border-gray-200 mx-auto sm:mx-0" alt="${product.name}">
                            <div class="mt-4 sm:ml-6 sm:mt-0 flex-1">
                                <h4 class="font-bold text-brand-black">${product.name}</h4>
                                <p class="text-xs text-gray-500 mb-2">${product.category}</p>
                                <span class="text-indigo-600 font-bold">$${product.price.toFixed(2)}</span>
                            </div>
                            <div class="mt-4 sm:mt-0 flex items-center justify-center space-x-4">
                                <!-- Premium Quantity Selector -->
                                <div class="flex items-center border border-gray-300 rounded-md w-24">
                                    <button class="w-8 py-1 text-gray-600 hover:bg-gray-100 hover:text-brand-black font-bold cart-qty-btn" data-action="decrease" data-id="${item.id}">-</button>
                                    <input type="text" value="${item.quantity}" class="w-8 text-center border-none text-gray-900 font-medium focus:ring-0 bg-transparent p-0" readonly>
                                    <button class="w-8 py-1 text-gray-600 hover:bg-gray-100 hover:text-brand-black font-bold cart-qty-btn" data-action="increase" data-id="${item.id}">+</button>
                                </div>
                                
                                <button class="text-red-500 hover:text-red-700 cart-remove-btn p-2" data-id="${item.id}" data-tippy-content="Remove Item">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </div>
                        </div>
                    `;
        }
      });
      html += "</div>";
      html += "</div>";
      container.html(html);

      // --- UPDATE SUMMARIES ---
      updateOrderAndModalTotals(subtotal);
    }
  }

  // Calculate and Update Totals
  function updateOrderAndModalTotals(subtotal) {
    const taxRate = 0.05; // 5%
    const tax = subtotal * taxRate;
    const freeShippingThreshold = 100.0;

    // Default Shipping Estimate (for sidebar)
    let shippingSidebar = "Calculated at checkout";
    let shippingCost = 0; // Default 0 for basic total view until checkout interaction

    // Logic for Sidebar Progress Bar
    const remaining = freeShippingThreshold - subtotal;
    const progress = Math.min(100, (subtotal / freeShippingThreshold) * 100);

    if (subtotal >= freeShippingThreshold) {
      $("#free-shipping-bar").removeClass("hidden");
      $("#free-shipping-bar .bg-indigo-600").css("width", "100%");
      $("#free-shipping-text").text("You have unlocked FREE Shipping!");
      $("#free-shipping-text")
        .addClass("text-green-600")
        .removeClass("text-indigo-600");
      shippingSidebar = "Free";
    } else {
      $("#free-shipping-bar").removeClass("hidden");
      $("#free-shipping-bar .bg-indigo-600").css("width", `${progress}%`);
      $("#free-shipping-text").text(
        `Spend $${remaining.toFixed(2)} more for Free Shipping`,
      );
      $("#free-shipping-text")
        .addClass("text-indigo-600")
        .removeClass("text-green-600");
    }

    // Sidebar DOM Updates
    $("#summary-subtotal").text(`$${subtotal.toFixed(2)}`);
    $("#summary-tax").text(`$${tax.toFixed(2)}`);
    $("#summary-shipping").text(shippingSidebar);

    // For sidebar Total, we assume shipping is 0 until checkout, or use a base rate?
    // Let's keep it as Subtotal + Tax for now, explaining shipping is next.
    let displayTotal = subtotal + tax;
    $("#summary-total").text(`$${displayTotal.toFixed(2)}`);

    // --- MODAL UPDATES (Live) ---
    // Get currently selected country to calc actual shipping
    const country = $("#checkout-country").val();
    let realShipping = 0;

    if (subtotal >= freeShippingThreshold) {
      realShipping = 0;
    } else {
      // Simple Shipping Rates Table
      if (country === "PK")
        realShipping = 5.0; // Local
      else if (country === "US" || country === "UK" || country === "CA")
        realShipping = 25.0; // Major Int'l
      else if (country)
        realShipping = 35.0; // Rest of World
      else realShipping = 0; // Not selected yet
    }

    const modalTotal = subtotal + tax + realShipping;

    $("#modal-subtotal").text(`$${subtotal.toFixed(2)}`);
    $("#modal-tax").text(`$${tax.toFixed(2)}`);
    $("#modal-shipping").text(
      realShipping === 0 && subtotal >= freeShippingThreshold
        ? "Free"
        : country
          ? `$${realShipping.toFixed(2)}`
          : "--",
    );
    $("#modal-total").text(`$${modalTotal.toFixed(2)}`);

    return { subtotal, tax, shipping: realShipping, total: modalTotal }; // Return for Confirm Order
  }

  // Listener for Country Change in Modal
  $(document).on("change", "#checkout-country", function () {
    // Re-calculate based on current cart state.
    // We need to fetch subtotal again.
    const subtotal = cart.reduce((acc, item) => {
      const p = getProductById(item.id);
      return p ? acc + p.price * item.quantity : acc;
    }, 0);
    updateOrderAndModalTotals(subtotal);
  });

  // Render Category GRID
  function renderCategoryPage() {
    const urlParams = new URLSearchParams(window.location.search);
    const category = urlParams.get("cat");
    const searchQuery = urlParams.get("search");
    const container = $("#category-grid");
    const sortType = $("#sort-select").val();

    if (container.length) {
      let items = [];
      let title = "Best Sellers";

      if (category && products[category]) {
        items = [...products[category]];
        title = `${category.charAt(0).toUpperCase() + category.slice(1)}'s Collection`;
      } else if (searchQuery) {
        // FLAT FILTER: Search across all categories
        const allProducts = [
          ...products.men,
          ...products.women,
          ...products.kids,
          ...products.sports,
          ...products.bestSellers,
        ];
        // Deduplicate by ID
        const uniqueProducts = Array.from(
          new Map(allProducts.map((item) => [item.id, item])).values(),
        );

        items = uniqueProducts.filter(
          (p) =>
            p.name.toLowerCase().includes(searchQuery.toLowerCase()) ||
            p.category.toLowerCase().includes(searchQuery.toLowerCase()),
        );
        title = `Search Results for "${searchQuery}"`;
      } else if (!category) {
        items = [...products.bestSellers];
      } else {
        items = [];
        title = "Category Not Found";
      }

      // Sorting Logic
      // We need to bind the sort dropdown change to re-render
      // For now, let's just sort if items exist

      // Note: In a real app, we'd listen to 'change' on the select and re-call this or a sort function.
      // Here we assume simple re-render.

      $("#category-title").text(title);
      container.empty();

      if (items.length > 0) {
        items.forEach((product) => {
          let card = createProductCard(product).replace(
            "swiper-slide h-auto",
            "col-span-1",
          );
          container.append(card);
        });
        $("#product-count").text(`${items.length} Products`);
      } else {
        container.html(
          '<div class="col-span-full text-center py-20 text-gray-400">No products found.</div>',
        );
        $("#product-count").text("0 Products");
      }
    }
  }

  // Attach Sort Listener
  $(document).on("change", ".sort-select", function () {
    const sortVal = $(this).val();
    const urlParams = new URLSearchParams(window.location.search);
    const category = urlParams.get("cat");
    let items =
      category && products[category]
        ? [...products[category]]
        : [...products.bestSellers];

    if (sortVal === "price-low") {
      items.sort((a, b) => a.price - b.price);
    } else if (sortVal === "price-high") {
      items.sort((a, b) => b.price - a.price);
    }

    const container = $("#category-grid");
    container.empty();
    items.forEach((product) => {
      let card = createProductCard(product).replace(
        "swiper-slide h-auto",
        "col-span-1",
      );
      container.append(card);
    });
  });

  // Render Single Product Detail
  function renderProductDetail() {
    if (!$("#product-detail-container").length) return;

    const urlParams = new URLSearchParams(window.location.search);
    const id = urlParams.get("id");
    const container = $("#product-detail-container");

    if (!id) {
      return;
    } // Already handled errors previously or handle gracefully

    const product = getProductById(id);
    if (!product) {
      return;
    }

    // Update Breadcrumbs & Title
    $("#breadcrumb-category")
      .text(product.category)
      .attr(
        "href",
        `category.php?cat=${product.category.split("'")[0].toLowerCase()}`,
      );
    $("#breadcrumb-product").text(product.name);
    document.title = `${product.name} - United Apparel Group`;

    // Check Cart State
    const isWishlisted = wishlist.includes(product.id);
    const cartItem = cart.find((item) => item.id === product.id);
    const quantity = cartItem ? cartItem.quantity : 1; // Default 1 for input

    const heartClass = isWishlisted
      ? "text-red-500 fill-current"
      : "text-gray-400 hover:text-red-500";

    // Action Button Logic: If in cart, show "Update" or just text?
    // User asked: "is button ki gaja or increae or decrease wale aya ga" (Instead of this button, inc/dec should appear)

    let actionButtonsHtml = "";

    if (cartItem) {
      // If item is ALREADY in cart, show the big counter INSTEAD of "Add to Cart"
      actionButtonsHtml = `
                <div class="flex-1 flex items-center justify-between bg-gray-900 rounded-xl shadow-lg w-full text-white h-[60px] overflow-hidden border-2 border-brand-black">
                     <button class="h-full px-6 hover:bg-gray-700 transition-colors font-bold text-xl detail-pro-qty-btn" onclick="updateDetailCartQty(${product.id}, -1)">-</button>
                     <span class="font-bold text-xl">${cartItem.quantity} <span class="text-xs font-normal text-gray-400 ml-1">in cart</span></span>
                     <button class="h-full px-6 hover:bg-gray-700 transition-colors font-bold text-xl detail-pro-qty-btn" onclick="updateDetailCartQty(${product.id}, 1)">+</button>
                </div>
             `;
    } else {
      // Not in cart: Show Add Button Only
      actionButtonsHtml = `
                  <button class="flex-1 bg-brand-black text-white h-[60px] rounded-xl font-bold uppercase tracking-wider hover:bg-gray-800 transition-all shadow-lg transform hover:-translate-y-1 add-to-cart-btn" data-id="${product.id}" data-type="detail">
                      Add to Cart
                  </button>
           `;
    }

    // Build the full HTML with Bulk Order button
    const detailHtml = `
            <!-- Image Gallery -->
            <div class="product-image rounded-2xl overflow-hidden bg-gray-100 shadow-sm relative group h-[500px]">
                <img src="${product.image}" alt="${product.name}" class="w-full h-full object-cover">
                ${product.badge ? `<span class="absolute top-6 left-6 px-4 py-2 bg-red-500 text-white text-xs font-bold rounded-lg uppercase shadow-md">${product.badge}</span>` : ""}
            </div>

            <!-- Product Info -->
            <div class="flex flex-col justify-center pl-0 md:pl-8">
                <span class="text-indigo-600 font-bold tracking-wider uppercase text-sm mb-3">${product.category}</span>
                <h1 class="text-4xl md:text-5xl font-black text-brand-black mb-6 leading-tight">${product.name}</h1>
                
                <div class="flex items-center space-x-6 mb-8 border-b border-gray-100 pb-8">
                    <span class="text-3xl font-bold text-gray-900">$${product.price.toFixed(2)}</span>
                    ${product.oldPrice ? `<span class="text-xl text-gray-400 line-through">$${product.oldPrice.toFixed(2)}</span>` : ""}
                </div>

                <p class="text-gray-600 text-lg mb-8 leading-relaxed">
                    ${product.description || "No description available for this product. High quality material and premium finish."}
                </p>

                <!-- Actions Container -->
                <div class="flex flex-col sm:flex-row gap-4 mb-10 h-[60px]">
                  <div id="detail-actions-wrapper" class="flex-1 flex">
                    ${actionButtonsHtml}
                  </div>
                  <!-- Wishlist -->
                    <button class="w-[60px] h-[60px] border-2 border-gray-200 rounded-xl hover:border-red-200 hover:bg-red-50 transition-colors wishlist-btn flex items-center justify-center" data-id="${product.id}">
                        <svg class="w-6 h-6 ${heartClass}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                    </button>
                </div>
                
                <!-- Features -->
                <div class="grid grid-cols-2 gap-y-4 gap-x-8 text-sm font-medium text-gray-500">
                    <div class="flex items-center"><svg class="w-5 h-5 mr-3 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> In Stock</div>
                    <div class="flex items-center"><svg class="w-5 h-5 mr-3 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Free Shipping</div>
                </div>
                
                <!-- Bulk Order Button -->
                <div class="mt-6 pt-6 border-t border-gray-100">
                    <a href="bulk-purchase" class="inline-flex items-center justify-center px-6 py-3 border-2 border-brand-black text-brand-black font-bold uppercase tracking-wider hover:bg-brand-black hover:text-white transition-all rounded-xl">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                        Request Bulk Order
                    </a>
                    <p class="text-xs text-gray-500 mt-2">Need 50+ units? Get special wholesale pricing!</p>
                </div>
            </div>
        `;

    container.html(detailHtml);

    // Related Products
    const related = products.bestSellers.slice(0, 4);
    renderProductSwiper(related, "#related-products-swiper");
    initProductSwiper("#related-products-swiper");
  }

  // Helper for Detail Page Direct Updates
  window.updateDetailCartQty = function (id, change) {
    const item = cart.find((i) => i.id === id);
    if (item) {
      item.quantity += change;
      if (item.quantity <= 0) {
        cart = cart.filter((i) => i.id !== id);
      }
      saveCart();
      renderProductDetail(); // Re-render to might switch back to "Add to Cart" or update number
    }
  };

  // Global function for the onclick handler in HTML string
  window.updateDetailQty = function (change) {
    const input = $("#detail-qty-input");
    let val = parseInt(input.val());
    val += change;
    if (val < 1) val = 1;
    input.val(val);
  };

  // --- EXECUTION ---
  if (typeof products !== "undefined") {
    renderProductSwiper(products.bestSellers, "#best-sellers-swiper");
    initProductSwiper("#best-sellers-swiper");

    renderProductSwiper(products.men, "#men-product-swiper");
    initProductSwiper("#men-product-swiper");

    renderProductSwiper(products.women, "#women-product-swiper");
    initProductSwiper("#women-product-swiper");

    renderProductSwiper(products.kids, "#kids-product-swiper");
    initProductSwiper("#kids-product-swiper");

    renderCategoryPage();
    renderWishlistPage();
    renderCartPage();
    renderProductDetail();
    updateCartCount();
    updateWishlistCount();
  }

  // --- CONTACT FORM HANDLER ---
  $("#contact-form").on("submit", function (e) {
    e.preventDefault();

    // Basic Validation
    const firstName = $("#firstName").val().trim();
    const lastName = $("#lastName").val().trim();
    const email = $("#email").val().trim();
    const subject = $("#subject").val();
    const message = $("#message").val().trim();

    if (!firstName || !lastName || !email || !subject || !message) {
      Swal.fire({
        icon: "error",
        title: "Missing Fields",
        text: "Please fill in all the required fields.",
        confirmButtonColor: "#0F172A",
      });
      return;
    }

    // Email Format Check
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
      Swal.fire({
        icon: "error",
        title: "Invalid Email",
        text: "Please enter a valid email address.",
        confirmButtonColor: "#0F172A",
      });
      return;
    }

    // Success Mockup
    Swal.fire({
      icon: "success",
      title: "Message Sent!",
      text: "Thank you for contacting United Apparel Group. We will get back to you shortly.",
      confirmButtonColor: "#0F172A",
    }).then(() => {
      this.reset(); // Reset Form
    });
  });

  // --- EVENT LISTENERS ---

  // Add to Cart (Initial Click)
  $(document).on("click", ".add-to-cart-btn", function (e) {
    e.preventDefault();
    const id = parseInt($(this).data("id"));
    const type = $(this).data("type");

    // Get product details
    const product = getProductById(id);
    if (!product) {
      console.error("Product not found:", id);
      return;
    }

    const quantityToAdd = type === "detail" ? 1 : 1;

    const existingItem = cart.find((item) => item.id === id);
    if (existingItem) {
      existingItem.quantity += quantityToAdd;
    } else {
      // Store complete product information
      cart.push({
        id: id,
        name: product.name,
        price: product.price,
        image: product.image,
        quantity: quantityToAdd,
      });
    }

    saveCart();

    if (type === "detail") {
      Swal.fire({
        icon: "success",
        title: "Added to Cart",
        text: `${quantityToAdd} item(s) added successfully!`,
        showConfirmButton: false,
        timer: 1500,
        toast: true,
        position: "top-end",
      });
    }
    // For card buttons, the UI automatically updates via saveCart -> updateAllProductCardsUI
  });

  // Smart Card Counter (+ / -)
  $(document).on("click", ".card-qty-btn", function (e) {
    e.preventDefault();
    e.stopPropagation(); // prevent link click
    const id = parseInt($(this).data("id"));
    const action = $(this).data("action");
    const item = cart.find((i) => i.id === id);

    if (item) {
      if (action === "increase") {
        item.quantity++;
      } else if (action === "decrease") {
        item.quantity--;
        if (item.quantity <= 0) {
          cart = cart.filter((i) => i.id !== id);
        }
      }
      saveCart();
      // UI updates automatically via saveCart
    }
  });

  // Toggle Wishlist
  $(document).on("click", ".wishlist-btn", function (e) {
    e.preventDefault();
    const id = parseInt($(this).data("id"));
    const index = wishlist.indexOf(id);
    const icon = $(this).find("svg");

    if (index === -1) {
      wishlist.push(id);
      icon.addClass("text-red-500 fill-current").removeClass("text-gray-400");
      Swal.fire({
        icon: "success",
        title: "Added to Wishlist",
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 1500,
      });
    } else {
      wishlist.splice(index, 1);
      icon.removeClass("text-red-500 fill-current").addClass("text-gray-400");
      // Optimistic removal if on wishlist page
      if ($("#wishlist-container").length) {
        $(this)
          .closest(".col-span-1")
          .fadeOut(300, function () {
            $(this).remove();
            if (wishlist.length === 0) renderWishlistPage();
          });
      }
      Swal.fire({
        icon: "info",
        title: "Removed from Wishlist",
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 1500,
      });
    }
    saveWishlist();
  });

  // Cart Increase/Decrease
  $(document).on("click", ".cart-qty-btn", function () {
    const id = parseInt($(this).data("id"));
    const action = $(this).data("action");
    const item = cart.find((i) => i.id === id);

    if (item) {
      if (action === "increase") {
        item.quantity++;
      } else if (action === "decrease") {
        item.quantity--;
        if (item.quantity <= 0) {
          cart = cart.filter((i) => i.id !== id);
        }
      }
      saveCart();
      renderCartPage();
    }
  });

  // Cart Remove
  $(document).on("click", ".cart-remove-btn", function () {
    const id = parseInt($(this).data("id"));
    cart = cart.filter((i) => i.id !== id);
    saveCart();
    renderCartPage();
  });

  // Checkout Modal Logic
  $("#checkout-btn").click(function () {
    if (cart.length === 0) {
      Swal.fire("Your cart is empty!", "Add some products first.", "info");
      return;
    }
    $("#checkout-modal").removeClass("hidden");
  });

  $("#close-modal-btn, #checkout-overlay").click(function () {
    $("#checkout-modal").addClass("hidden");
  });

  $("#confirm-order-btn").click(function () {
    // Validation
    const name = $("#checkout-name").val().trim();
    const email = $("#checkout-email").val().trim();
    const address = $("#checkout-address").val().trim();
    const city = $("#checkout-city").val().trim();
    const country = $("#checkout-country").val();

    if (!name || !email || !address || !city || !country) {
      Swal.fire({
        icon: "error",
        title: "Missing Information",
        text: "Please fill in all required fields marked with *",
        confirmButtonColor: "#111827",
      });
      return;
    }

    if (!validateEmail(email)) {
      Swal.fire({
        icon: "error",
        title: "Invalid Email",
        text: "Please enter a valid email address.",
        confirmButtonColor: "#111827",
      });
      return;
    }

    Swal.fire({
      title: "Processing Order...",
      html: "Please wait while we secure your inventory.",
      timer: 2000,
      timerProgressBar: true,
      didOpen: () => {
        Swal.showLoading();
      },
    }).then((result) => {
      /* Read more about handling dismissals below */
      if (result.dismiss === Swal.DismissReason.timer) {
        Swal.fire({
          title: "Order Placed Successfully!",
          text: `Thank you, ${name}! Your order will be shipped to ${city}, ${country}.`,
          icon: "success",
          confirmButtonColor: "#111827",
        }).then((result) => {
          if (result.isConfirmed) {
            cart = [];
            saveCart();
            renderCartPage();
            $("#checkout-modal").addClass("hidden");
            window.location.href = "index.php";
          }
        });
      }
    });
  });

  function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
  }

  // FAQ Accordion
  $(".faq-toggle").click(function () {
    $(".faq-toggle")
      .not(this)
      .removeClass("active")
      .find("svg")
      .removeClass("rotate-180");
    $(".faq-toggle").not(this).next(".faq-content").slideUp(300);
    $(this).toggleClass("active");
    $(this).find("svg").toggleClass("rotate-180");
    $(this).next(".faq-content").slideToggle(300);
  });

  // Scroll Header
  $(window).scroll(function () {
    if ($(this).scrollTop() > 50) {
      $("#main-header").addClass("shadow-sm");
    } else {
      $("#main-header").removeClass("shadow-sm");
    }
  });
  // --- FILTER BUTTON HANDLER (Native Dropdown) ---
  $(document).on("click", "#filter-btn", function (e) {
    e.stopPropagation();
    $("#filter-dropdown").toggleClass("hidden");
  });

  $(document).on("click", function () {
    $("#filter-dropdown").addClass("hidden");
  });

  $(document).on("click", "#filter-dropdown", function (e) {
    e.stopPropagation();
  });

  // --- SIZE GUIDE TABS ---
  $(document).on("click", ".size-tab-btn", function (e) {
    e.preventDefault();

    // Remove active class from all buttons
    $(".size-tab-btn")
      .removeClass("bg-brand-black text-white")
      .addClass("bg-white text-gray-700");

    // Add active class to clicked button
    $(this)
      .removeClass("bg-white text-gray-700")
      .addClass("bg-brand-black text-white");

    // Hide all contents
    $(".size-tab-content").addClass("hidden");

    // Show target content
    const target = $(this).data("target");
    $(target).removeClass("hidden").addClass("animate-fade-in-up");
  });

  // --- CHECKOUT FORM SUBMISSION ---
  $(document).on("click", "#confirm-order-btn", function (e) {
    e.preventDefault();

    // Get form data
    const name = $("#checkout-name").val().trim();
    const email = $("#checkout-email").val().trim();
    const address = $("#checkout-address").val().trim();
    const country = $("#checkout-country").val();
    const phone = $("#checkout-phone").val().trim();
    const city = $("#checkout-city").val().trim();
    const zip = $("#checkout-zip").val().trim();

    // Validation
    if (!name || !email || !address || !country || !phone || !city || !zip) {
      Swal.fire({
        icon: "error",
        title: "Missing Information",
        text: "Please fill in all required fields.",
        confirmButtonColor: "#000",
      });
      return;
    }

    // Email validation
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
      Swal.fire({
        icon: "error",
        title: "Invalid Email",
        text: "Please enter a valid email address.",
        confirmButtonColor: "#000",
      });
      return;
    }

    // Get cart items
    if (cart.length === 0) {
      Swal.fire({
        icon: "error",
        title: "Empty Cart",
        text: "Your cart is empty. Please add items before placing an order.",
        confirmButtonColor: "#000",
      });
      return;
    }

    // Calculate totals
    const subtotal = cart.reduce(
      (sum, item) => sum + item.price * item.quantity,
      0,
    );
    const tax = subtotal * 0.1;
    const shipping = subtotal > 100 ? 0 : 10;
    const total = subtotal + tax + shipping;

    // Prepare order data
    const orderData = {
      name: name,
      email: email,
      address: address,
      country: country,
      phone: phone,
      city: city,
      zip: zip,
      items: cart,
      subtotal: subtotal,
      tax: tax,
      shipping: shipping,
      total: total,
    };

    // Show loading
    Swal.fire({
      title: "Processing Order...",
      text: "Please wait while we process your order.",
      allowOutsideClick: false,
      didOpen: () => {
        Swal.showLoading();
      },
    });

    // Send order via AJAX
    $.ajax({
      url: "actions/process-order.php",
      type: "POST",
      contentType: "application/json",
      data: JSON.stringify(orderData),
      dataType: "json",
      success: function (response) {
        if (response.success) {
          Swal.fire({
            icon: "success",
            title: "Order Placed Successfully!",
            html:
              `<strong>Order ID:</strong> ${response.orderId}<br><br>` +
              `Confirmation emails have been sent to:<br>` +
              `• Your email: <strong>${email}</strong><br>` +
              `• Our team for processing<br><br>` +
              `We will contact you within 24 hours to confirm your order.`,
            confirmButtonColor: "#000",
          }).then(() => {
            // Clear cart
            cart = [];
            saveCart();
            updateCartCount();
            updateAllProductCardsUI();
            renderCartPage(); // Refresh cart page to show empty state
            // Close modal and reset form
            $("#checkout-modal").addClass("hidden");
            $("#checkout-form")[0].reset();
            // Clear all input values manually
            $("#checkout-name").val("");
            $("#checkout-email").val("");
            $("#checkout-address").val("");
            $("#checkout-country").val("");
            $("#checkout-phone").val("");
            $("#checkout-city").val("");
            $("#checkout-zip").val("");

            // Update order summary to show $0.00
            $("#summary-subtotal").text("$0.00");
            $("#summary-tax").text("$0.00");
            $("#summary-total").text("$0.00");
            $("#summary-shipping").text("Calculated at checkout");

            // Redirect to home page after 2 seconds
            setTimeout(() => {
              window.location.href = "/";
            }, 2000);
          });
        } else {
          Swal.fire({
            icon: "error",
            title: "Order Failed",
            text:
              response.message || "Failed to place order. Please try again.",
            confirmButtonColor: "#000",
          });
        }
      },
      error: function (xhr, status, error) {
        console.error("Order submission error:", error);
        console.error("XHR:", xhr);
        console.error("Status:", status);
        console.error("Response Text:", xhr.responseText);
        Swal.fire({
          icon: "error",
          title: "Server Error",
          text: "Unable to process your order. Please try again later or contact us directly.",
          confirmButtonColor: "#000",
        });
      },
    });
  });
});
