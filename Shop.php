<?php
    include('validSessionCheck.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shop Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="CSS/shop.css">
    <link rel="stylesheet" type="text/css" href="CSS/header.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="Javascript/script.js" defer></script>
</head>
<body>
    <div class="header">
        <button class="hamburgerNav" id="hamburgerNav">
            <span class="line"></span>
            <span class="line"></span>
            <span class="line"></span>
        </button>

        <ul id="nav">
            <li><a href="homepage.php">
                <img id="home" src="Images/HomePageLogo.JPG" />
            </a></li>
            <li><a href="Shop.php">Shop</a></li>
            <li><a href="AboutUs.php">About Us</a></li>
            <li><a href="Contact.html">Contact</a></li>
        </ul>

        <a id="cart" href="cart.php">
            <img id="cartIMG" src="Images/cart.png" />
            <div id="headerCartCount">0</div>
        </a>
    </div>

    <audio id="straw" preload="auto">
            <source src="straw.mp3" type="audio/mp3">
    </audio>

    <div id="shopContainer">
        <div class="imageContainer">
            <img id="shopImg" src="Images/indigo1.png" alt="Product Image">
            <button class="navButton prevButton">&lt;</button>
            <button class="navButton nextButton">&gt;</button>
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
            <div class="sizeOptions">
                <input type="radio" name="size" id="28" class="customRadio" value="28">
                <label for="28">28</label>
                <input type="radio" name="size" id="30" class="customRadio" value="30">
                <label for="30">30</label>
                <input type="radio" name="size" id="32" class="customRadio" value="32">
                <label for="32">32</label>
                <input type="radio" name="size" id="34" class="customRadio" value="34">
                <label for="34">34</label>
            </div>
            <div class="quantityOptions">
                <button type="button" id="decrement">-</button>
                <div class="quantityInput">
                    1
                </div>
                <button type="button" id="increment">+</button>
            </div>
            <button type="button" id="addToCart">Add to Cart</button>
            <button type="button" id="viewCart" style="display: none;">Checkout</button>
        </form>

        <script>
            $(document).ready(function() {
                // Function to update cart count
                function updateCartCount() {
                    const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
                    const totalItems = cartItems.reduce((sum, item) => sum + item.quantity, 0);
                    const viewCartButton = document.getElementById("viewCart");
                    const headerCartCount = document.getElementById("headerCartCount");
                    
                    viewCartButton.style.display = cartItems.length > 0 ? "block" : "none";
                    
                    // Update header cart count
                    headerCartCount.textContent = totalItems;
                    headerCartCount.style.display = totalItems > 0 ? "flex" : "none";
                }

                // Check for existing cart items on page load
                updateCartCount();

                const images = [
                    'Images/indigo1.png',
                    'Images/indigo2.png',
                    'Images/indigo3.png',
                    'Images/indigo4.png',
                    'Images/indigo5.png'
                ];
                let currentImageIndex = 0;
                const shopImg = document.getElementById('shopImg');
                let touchStartX = 0;
                let touchEndX = 0;

                function updateImage() {
                    shopImg.src = images[currentImageIndex];
                }

                function nextImage() {
                    currentImageIndex = (currentImageIndex + 1) % images.length;
                    updateImage();
                }

                function prevImage() {
                    currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
                    updateImage();
                }

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

                // Navigation buttons
                document.querySelector('.nextButton').addEventListener('click', nextImage);
                document.querySelector('.prevButton').addEventListener('click', prevImage);

                $("#decrement").click(function() {
                    const quantityInput = $(".quantityInput");
                    const quantity = parseInt(quantityInput.text());
                    if (quantity > 1) {
                        quantityInput.text(quantity - 1);
                    }
                });

                $("#increment").click(function() {
                    const quantityInput = $(".quantityInput");
                    const quantity = parseInt(quantityInput.text());
                    quantityInput.text(quantity + 1);
                });

                document.getElementById("addToCart").addEventListener("click", function() {
                    const selectedSize = document.querySelector('input[name="size"]:checked');
                    const quantity = parseInt(document.querySelector(".quantityInput").textContent);
                    
                    if (!selectedSize) {
                        alert("Please select a size.");
                        return;
                    }

                    const variantId = "8921377997033"; 

                    if (!variantId) {
                        alert("Invalid size selected.");
                        return;
                    }

                    const cartData = {
                        variantId: variantId,
                        quantity: quantity,
                        size: selectedSize.value
                    };

                    // Save cart data in localStorage
                    let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
                    cartItems.push(cartData);
                    localStorage.setItem('cartItems', JSON.stringify(cartItems));
                    
                    // Update cart count and show button
                    updateCartCount();

                    // Show the diagonal text message
                    const itemAdded = document.querySelector('.itemAdded');
                    const letters = itemAdded.querySelectorAll('.diagonal-text span');
                    var audio = document.getElementById("straw");
                    
                    // Check if device is mobile
                    const isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
                    
                    // Clear any existing timeouts
                    if (window.animationTimeouts) {
                        window.animationTimeouts.forEach(timeout => clearTimeout(timeout));
                    }
                    window.animationTimeouts = [];
                    
                    // Hide all letters initially
                    letters.forEach(letter => {
                        letter.style.opacity = '0';
                    });
                    
                    itemAdded.classList.add('visible');
                    
                    // Function to play audio only on desktop
                    function playAudio() {
                        if (!isMobile) {
                            audio.currentTime = 0;
                            audio.play();
                        }
                    }
                    
                    // Show each letter with a delay
                    letters.forEach((letter, index) => {
                        const timeout = setTimeout(() => {
                            letter.style.opacity = '1';
                            playAudio();
                        }, index * 50);
                        window.animationTimeouts.push(timeout);
                    });

                    // Add a short delay before hiding letters
                    const hideTimeout = setTimeout(() => {
                        // Hide letters in reverse order
                        letters.forEach((letter, index) => {
                            const timeout = setTimeout(() => {
                                letter.style.opacity = '0';
                                playAudio();
                            }, (letters.length * 50) + (letters.length - index) * 50);
                            window.animationTimeouts.push(timeout);
                        });
                    }, 750);
                    window.animationTimeouts.push(hideTimeout);
                    
                    // Hide the message after all letters are shown and hidden
                    const finalTimeout = setTimeout(() => {
                        itemAdded.classList.remove('visible');
                    }, (letters.length * 200) + 500);
                    window.animationTimeouts.push(finalTimeout);
                });

                // Add click handler for View Cart button
                document.getElementById("viewCart").addEventListener("click", function() {
                    window.location.href = "cart.php";
                });

                document.getElementById('viewCart').addEventListener('click', function () {
                    const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

                    if (cartItems.length === 0) return;

                    // Build Shopify cart URL with line item properties
                    let cartURL = 'https://y8hkdv-yg.myshopify.com/cart';
                    let urlParts = [];

                    cartItems.forEach((item, index) => {
                        let variantAndQty = `${item.variantId}:${item.quantity}`;
                        let sizeParam = `properties[Size]=${encodeURIComponent(item.size)}`;

                        if (index === 0) {
                            urlParts.push(`${variantAndQty}?${sizeParam}`);
                        } else {
                            urlParts.push(`${variantAndQty}&${sizeParam}`);
                        }
                    });

                    cartURL += '/' + urlParts.join(',');
                    window.location.href = cartURL;
                });
            });

        </script>
    </div>
</body>
</html>