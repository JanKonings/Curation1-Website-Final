<?php
    include('validSessionCheck.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="CSS/header.css">
    <link rel="stylesheet" type="text/css" href="CSS/cart.css">
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
    <div class="cartContainer">
        <div class="shopItems"></div>
        <div class="checkout">
        </div>
        <button type="button" id="clearCart">Clear Cart</button>
        <button type="button" id="checkout">Ceckout</button>
    </div>
    

    <script>
        window.onload = function() {
            // Get cart data from localStorage
            const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
            
            const cartContainer = document.querySelector('.cartContainer');
            const shopItemsContainer = document.querySelector('.shopItems');
            const checkoutContainer = document.querySelector('.checkout');

            if (cartItems.length === 0) {
                // Display if the cart is empty
                shopItemsContainer.innerHTML = `<h1 id="product">Your cart is empty.</h1>`;
                checkoutContainer.innerHTML = `<h1 id="total">Total Price: $0</h1>`; 
                return;
            }

            // We will dynamically create the HTML for cart items
            let cartHTML = '';
            let i = 0;
            cartItems.forEach((item, index) => {
                var subtotal = (220) * (item.quantity);
                cartHTML += `
                    <div class="cartItem" id="cartItem${index}">
                        <h1>Product: Denim Jeans</h1>
                        <h2>Size: ${item.size}</h2>
                        <h2>Quantity: ${item.quantity}</h2>
                        <h2>Subtotal: $${subtotal}</h2>
                        <h3 class="removeItem" id="killID${index}">X</h3>
                    </div>
                `;
                i++;
            });

            // Insert the cart item HTML into the cart container
            shopItemsContainer.innerHTML = cartHTML;

            // Find the total number of items in the cart
            let totalItems = cartItems.reduce((count, item) => {
                return count + item.quantity;
            }, 0);

            var totalPrice = totalItems * 220;
            checkoutContainer.innerHTML = `<h1 id="total">Total Price: $${totalPrice}</h1>`;

            // Add event listeners to "X" buttons
            cartItems.forEach((item, index) => {
                const removeButton = document.getElementById(`killID${index}`);
                removeButton.addEventListener('click', function() {
                    // Remove the item from the cartItems array
                    cartItems.splice(index, 1);

                    // Update localStorage with the new cart
                    localStorage.setItem('cartItems', JSON.stringify(cartItems));

                    // Remove the cart item element from the DOM
                    const cartItemElement = document.getElementById(`cartItem${index}`);
                    cartItemElement.remove();

                    // Update the total price
                    updateTotalPrice();
                    
                    // If cart is empty, show the "empty" message
                    if (cartItems.length === 0) {
                        shopItemsContainer.innerHTML = `<h1 id="product">Your cart is empty.</h1>`;
                        checkoutContainer.innerHTML = `<h1 id="total">Total Price: $0</h1>`;
                    }
                });
            });

            // Clear cart functionality
            document.getElementById('clearCart').addEventListener('click', function() {
                // Clear localStorage
                localStorage.removeItem('cartItems');

                // Update the inline HTML to show an empty cart
                shopItemsContainer.innerHTML = `<h1 id="product">Your cart is empty.</h1>`;
                checkoutContainer.innerHTML = `<h1 id="total">Total Price: $0</h1>`;
            });

            // Function to update the total price
            function updateTotalPrice() {
                let totalItems = cartItems.reduce((count, item) => {
                    return count + item.quantity;
                }, 0);

                var totalPrice = totalItems * 220;
                checkoutContainer.innerHTML = `<h1 id="total">Total Price: $${totalPrice}</h1>`;
            }

            document.getElementById('checkout').addEventListener('click', function() {
                // Create the Shopify cart URL
                let cartURL = 'https://y8hkdv-yg.myshopify.com/cart/';

                // Loop through each item and add the variantId and quantity to the URL
                let cartItemsString = cartItems.map(item => `${item.variantId}:${item.quantity}`).join(',');
                cartURL += cartItemsString;

                // Redirect to the Shopify cart
                window.location.href = cartURL;
            });
        };
    </script>


    </div>
</body>
</html>