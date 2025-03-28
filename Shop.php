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
        </a>
    </div>

    <div id="shopContainer">
        <div class="shopItem">
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
        </form>

        <script>
            $(document).ready(function() {
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
            });

            document.getElementById("addToCart").addEventListener("click", function() {
                const selectedSize = document.querySelector('input[name="size"]:checked');
                const quantity = parseInt(document.querySelector(".quantityInput").textContent);
                
                if (!selectedSize) {
                    alert("Please select a size.");
                    return;
                }

                const variantMapping = {
                    "30": "48240682303721",
                    "32": "48240682336489",
                    "34": "48240682369257",
                    "28": "48240760094953"
                };

                const variantId = variantMapping[selectedSize.value];

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

                // window.location.href = `https://y8hkdv-yg.myshopify.com/cart/${variantId}:${quantity}`;
            });
        </script>
    </div>
</body>
</html>