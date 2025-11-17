<?php include 'validSessionCheck.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Shop Page</title>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="CSS/shop.css?v=1">
    <link rel="stylesheet" type="text/css" href="CSS/header.css?v=1">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&family=La+Belle+Aurore&display=swap" rel="stylesheet">
    <script src="Javascript/cartUtils.js?v=1"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            updateCartCount();
        });
    </script>
</head>
<body>
    <div class="header">
        <a href="homepage.php"><img src="Images/logo.png" id="headerLogo"></a>

        <ul id="nav">
            <li><a href="Shop.php">shop</a></li>
            <li><a href="AboutUs.php">about us</a></li>
        </ul>

        <a id="cart" href="cart.php">
            <img id="cartIMG" src="Images/cart.png?v=1" />
            <div id="headerCartCount">0</div>
        </a>
    </div>

    <audio id="straw" preload="auto">
            <source src="straw.mp3" type="audio/mp3">
    </audio>

    <div id="shopContainer">
        <div class="imageContainer">
            <img id="shopImg" src="Images/indigo1v1.png" alt="Product Image">
            <button class="navButton prevButton">
                <img src="Images/arrowLeft.svg" alt="Previous" />
            </button>
            <button class="navButton nextButton">
                <img src="Images/arrowRight.svg" alt="Next" />
            </button>
            <div class="itemAdded">
                <div class="diagonal-text">
                    <span>A</span>
                    <span>D</span>
                    <span>D</span>
                    <span>E</span>
                    <span>D</span>
                    <span class="space"></span>
                    <span>T</span>
                    <span>O</span>
                    <span class="space"></span>
                    <span>C</span>
                    <span>A</span>
                    <span>R</span>
                    <span>T</span>
                </div>
            </div>
        </div>
        
        <form id="shopForm">
            <h1 id="yokedDenim">YOKED DENIM</h1>
            <h2 id="price">$200 USD</h2>
            <h3 id="waist">waist</h3>
            <div class="sizeOptions">
                <input type="radio" name="waist" id="28" class="customRadio" value="28">
                <label for="28">28</label>
                <input type="radio" name="waist" id="30" class="customRadio" value="30">
                <label for="30">30</label>
                <input type="radio" name="waist" id="32" class="customRadio" value="32">
                <label for="32">32</label>
                <input type="radio" name="waist" id="34" class="customRadio" value="34">
                <label for="34">34</label>
                <input type="radio" name="waist" id="36" class="customRadio" value="36">
                <label for="36">36</label>
            </div>
            <h3 id="inseam">inseam</h3> 
            <div class="sizeOptions">
                <input type="radio" name="inseam" id="inseam30" class="customRadio" value="30">
                <label for="inseam30">30</label>
                <input type="radio" name="inseam" id="inseam32" class="customRadio" value="32">
                <label for="inseam32">32</label>
            </div>

            <button type="button" id="addToCart">ADD TO CART</button>
            <p id="purchaseInfo">12oz indigo denim <br> fabric and trims sourced from japan <br> wide leg, slight flare, made in NYC <br> preorder, please expect shipping after 5 - 7 weeks</p>
        </form>

        <!-- <img src="Images/logo.png" id="cornerImg"> -->
        <script>
            $(document).ready(async function () {
                const accessToken = "152c935098af7d620d360cc0eebcec78"; // 🔐 Replace with your Storefront token
                const shopifyDomain = "y8hkdv-yg.myshopify.com";
                const variantId = "gid://shopify/ProductVariant/48356125376745"; // Replace with your actual variant GID

                const query = `
                    query {
                    node(id: "${variantId}") {
                        ... on ProductVariant {
                        availableForSale
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
                    body: JSON.stringify({ query })
                    });

                    const result = await response.json();
                    const available = result?.data?.node?.availableForSale;

                    if (!available) {
                    const addToCartBtn = document.getElementById("addToCart");
                    addToCartBtn.disabled = true;
                    addToCartBtn.innerText = "SOLD OUT";
                    addToCartBtn.style.backgroundColor = "#ccc"; // optional: gray it out
                    addToCartBtn.style.cursor = "not-allowed";
                    }
                } catch (err) {
                    console.error("❌ Error checking Shopify stock:", err);
                }
            });

            $(document).ready(function() {
                // Check for existing cart items on page load
                updateCartCount();

                const images = [
                    'Images/indigo1v1.png',
                    'Images/indigo2v1.png',
                    'Images/indigo3v1.png',
                    'Images/indigo4v1.png'
                    // 'Images/indigo5.png',
                    // 'Images/indigo6.png'
                ];
                
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
                            quantity: 1
                        });
                    }

                    // Save back to localStorage
                    localStorage.setItem('cartItems', JSON.stringify(cartItems));

                    // Update cart count
                    updateCartCount();

                    // --- Play animation (your existing logic follows) ---
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

        </script>
    </div>
</body>
</html>