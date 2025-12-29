// Map waist/inseam -> Shopify variant ID
const VARIANT_MAP = {
    "28-30": "gid://shopify/ProductVariant/49386435870953",
    "28-32": "gid://shopify/ProductVariant/49386435903721",
    "30-30": "gid://shopify/ProductVariant/49386435936489",
    "30-32": "gid://shopify/ProductVariant/49386435838185",
    "32-30": "gid://shopify/ProductVariant/49386435969257",
    "32-32": "gid://shopify/ProductVariant/49386436002025",
    "34-30": "gid://shopify/ProductVariant/49386436034793",
    "34-32": "gid://shopify/ProductVariant/49386436067561",
};

const PREORDER_VARIANT_ID = "gid://shopify/ProductVariant/48356125376745"; 

let isPreorderMode = false;

function activateSoldOutUI() {
    const btn = document.getElementById("addToCart");
    if (btn) {
        btn.disabled = true;
        btn.textContent = "Sold Out";
        btn.classList.add("sold-out");   
    }
}

$(document).ready(async function () {
    const accessToken = "152c935098af7d620d360cc0eebcec78"; // your Storefront token
    const shopifyDomain = "y8hkdv-yg.myshopify.com";

    const variantIds = [
        ...Object.values(VARIANT_MAP),   // spread the values
        PREORDER_VARIANT_ID
    ];

    const query = `
    query ($ids: [ID!]!) {
        nodes(ids: $ids) {
        ... on ProductVariant {
            id
            availableForSale
            quantityAvailable
        }
        }
    }
    `;

    try {
        const response = await fetch(`https://${shopifyDomain}/api/2023-10/graphql.json`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-Shopify-Storefront-Access-Token": accessToken
            },
            body: JSON.stringify({
                query,
                variables: { ids: variantIds }
            })
        });

        const result = await response.json();
        console.log("Variant availability response:", result);

        let availability = {};        
        let preorderAvailable = null; 

        if (result.data && result.data.nodes) {
            result.data.nodes.forEach(node => {
                if (node) {
                    // normal variants
                    availability[node.id] = node.availableForSale;

                    // preorder variant special logic
                    if (node.id === PREORDER_VARIANT_ID) {
                        const qty = typeof node.quantityAvailable === "number"
                            ? node.quantityAvailable
                            : 999999; 

                        preorderAvailable = node.availableForSale && qty > 0;
                    }
                }
            });
        }

        // after we know stock, wire up the size UI
        // initSizeAvailability(availability);

        // 👉 check if ANY premade variant is still in stock
        const premadeIds = Object.values(VARIANT_MAP);
        const anyInStock = premadeIds.some(id => availability[id]);

        if (anyInStock) {
            console.log("Premade mode: at least one size in stock");
            isPreorderMode = false;
            initSizeAvailability(availability);   // use normal per-size availability
        } else {
            console.log("All premade variants sold out");

            if (preorderAvailable) {
                console.log("Preorder variant in stock – switch to PREORDER mode");
                isPreorderMode = true;
                activatePreorderUI();             // change headers/button text etc.
                initSizeAvailability(null);       // allow all sizes, no disabling
            } else {
                console.log("Preorder also sold out – fully sold out");
                isPreorderMode = false;
                activateSoldOutUI();              // 👈 new function below
            }
        }

    } catch (err) {
        console.error("❌ Error checking Shopify stock:", err);
        // If API fails, fail “open”: just treat as premade mode with no availability filtering
        isPreorderMode = false;
        initSizeAvailability(null);
    }
});

function initSizeAvailability(availability) {
    const waistRadios  = document.querySelectorAll('input[name="waist"]');
    const inseamRadios = document.querySelectorAll('input[name="inseam"]');

    function updateWaistOptions() {
        const selectedInseamInput = document.querySelector('input[name="inseam"]:checked');
        const selectedInseam = selectedInseamInput ? selectedInseamInput.value : null;

        waistRadios.forEach(radio => {
            const label = document.querySelector(`label[for="${radio.id}"]`);

            // No inseam selected yet: allow waist selection but don’t gray anything
            if (!selectedInseam || !availability) {
                radio.disabled = false;
                if (label) label.classList.remove("sold-out");
                return;
            }

            const key = `${radio.value}-${selectedInseam}`;
            const variantId = VARIANT_MAP[key];
            const isAvailable = variantId && availability[variantId];

            if (!variantId || !isAvailable) {
                radio.disabled = true;
                radio.checked = false;
                if (label) label.classList.add("sold-out");
            } else {
                radio.disabled = false;
                if (label) label.classList.remove("sold-out");
            }
        });
    }

    // whenever inseam changes, recompute which waists are allowed
    inseamRadios.forEach(radio => {
        radio.addEventListener("change", updateWaistOptions);
    });

    // initial state
    updateWaistOptions();
}

function activatePreorderUI() {
    // 🔥 EDIT THESE SELECTORS / TEXTS TO MATCH YOUR HTML 🔥

    // Example: main product title
    const titleEl = document.getElementById("currProduct");
    if (titleEl) {
        titleEl.textContent = "(PREORDER)";
    }

    // Example: subtitle / description line
    const subtitleEl = document.getElementById("purchaseInfo");
    if (subtitleEl) {
        subtitleEl.innerHTML = "14.5oz black bull selvedge denim <br> fabric and trims sourced from japan <br> wide leg, slight flare, made in NYC <br> preorder, please allow 7 - 9 weeks to ship";
    }

    // Add WAIST SIZE 36 for preorder
    const sizeContainer = document.querySelector('.sizeOptions');

    // Only add it once
    if (!document.getElementById("36")) {
        const input = document.createElement("input");
        input.type = "radio";
        input.name = "waist";
        input.id = "36";
        input.className = "customRadio";
        input.value = "36";

        const label = document.createElement("label");
        label.setAttribute("for", "36");
        label.textContent = "36";

        sizeContainer.appendChild(input);
        sizeContainer.appendChild(label);
    }
}

$(document).ready(function() {
    // Check for existing cart items on page load
    updateCartCount();

    // const images = [
    //     'Images/indigo1v1.png',
    //     'Images/indigo2v1.png',
    //     'Images/indigo3v1.png',
    //     'Images/indigo4v1.png'
    //     // 'Images/indigo5.png',
    //     // 'Images/indigo6.png'
    // ];

    const images = [
        'Images/midnight1.png',
        'Images/midnight2.png',
        'Images/midnight3.png',
        'Images/midnight4.png'
    ];

    const preloadedImages = [];

    images.forEach(src => {
        const img = new Image();
        img.src = src;
        preloadedImages.push(img);
    });
    
    let currentImageIndex = 0;
    const shopImg = document.getElementById('shopImg');
    
    function updateImage() {
        shopImg.src = images[currentImageIndex];
    }

    function nextImage() {
        currentImageIndex = (currentImageIndex + 1) % images.length; // Loop to the first image
        updateImage();
    }

    function prevImage() {
        currentImageIndex = (currentImageIndex - 1 + images.length) % images.length; // Loop to the last image
        updateImage();
    }

    // Ensure the next and prev buttons are functioning
    document.querySelector('.nextButton').addEventListener('click', function() {
        nextImage();
    });

    document.querySelector('.prevButton').addEventListener('click', function() {
        prevImage();
    });

    // Touch events for swipe
    document.querySelector('.imageContainer').addEventListener('touchstart', e => {
        touchStartX = e.changedTouches[0].screenX;
    });

    document.querySelector('.imageContainer').addEventListener('touchend', e => {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipe();
    });

    function handleSwipe() {
        const swipeThreshold = 50;
        if (touchEndX < touchStartX - swipeThreshold) {
            nextImage();
        }
        if (touchEndX > touchStartX + swipeThreshold) {
            prevImage();
        }
    }


    document.getElementById("addToCart").addEventListener("click", function () {
        const selectedWaistSize = document.querySelector('input[name="waist"]:checked');
        const selectedInseamSize = document.querySelector('input[name="inseam"]:checked');

        if (!selectedWaistSize || !selectedInseamSize) {
            alert("Please select both waist and inseam sizes.");
            return;
        }

        const waist = selectedWaistSize.value;
        const inseam = selectedInseamSize.value;

        // Load existing cart or start new
        let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

        // Check if item with same waist + inseam exists
        const existingItemIndex = cartItems.findIndex(item => item.waist === waist && item.inseam === inseam);

        if (existingItemIndex !== -1) {
            // If item exists, just increase quantity
            cartItems[existingItemIndex].quantity += 1;
        } else {
            // Otherwise, add new item
            cartItems.push({
                waist: waist,
                inseam: inseam,
                quantity: 1,
                mode: isPreorderMode ? "preorder" : "premade"
            });
        }

        // Save back to localStorage
        localStorage.setItem('cartItems', JSON.stringify(cartItems));

        // Update cart count
        updateCartCount();

        const itemAdded = document.querySelector('.itemAdded');
        const letters = itemAdded.querySelectorAll('.diagonal-text span');
        var audio = document.getElementById("straw");

        const isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);

        if (window.animationTimeouts) {
            window.animationTimeouts.forEach(timeout => clearTimeout(timeout));
        }
        window.animationTimeouts = [];

        letters.forEach(letter => {
            letter.style.opacity = '0';
        });

        itemAdded.classList.add('visible');

        function playAudio() {
            if (!isMobile) {
                audio.currentTime = 0;
                audio.play();
            }
        }

        letters.forEach((letter, index) => {
            const timeout = setTimeout(() => {
                letter.style.opacity = '1';
                playAudio();
            }, index * 50);
            window.animationTimeouts.push(timeout);
        });

        const hideTimeout = setTimeout(() => {
            letters.forEach((letter, index) => {
                const timeout = setTimeout(() => {
                    letter.style.opacity = '0';
                    playAudio();
                }, (letters.length * 50) + (letters.length - index) * 50);
                window.animationTimeouts.push(timeout);
            });
        }, 750);
        window.animationTimeouts.push(hideTimeout);

        const finalTimeout = setTimeout(() => {
            itemAdded.classList.remove('visible');
        }, (letters.length * 200) + 500);
        window.animationTimeouts.push(finalTimeout);
    });

});