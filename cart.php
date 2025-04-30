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
        <div class="checkout"></div>
        <button type="button" id="clearCart">Clear Cart</button>
        <button type="button" id="checkout">Checkout</button>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
            const shopItemsContainer = document.querySelector('.shopItems');
            const checkoutContainer = document.querySelector('.checkout');

            if (cartItems.length === 0) {
                shopItemsContainer.innerHTML = `<h1 id="product">Your cart is empty.</h1>`;
                checkoutContainer.innerHTML = `<h1 id="total">Total Price: $0</h1>`;
                return;
            }

            let cartHTML = '';
            let totalItems = 0;
            cartItems.forEach((item, index) => {
                const subtotal = 220 * item.quantity;
                totalItems += item.quantity;
                cartHTML += `
                    <div class="cartItem" id="cartItem${index}">
                        <h1>Product: Denim Jeans</h1>
                        <h2>Size: ${item.size}</h2>
                        <h2>Quantity: ${item.quantity}</h2>
                        <h2>Subtotal: $${subtotal}</h2>
                        <h3 class="removeItem" id="killID${index}">X</h3>
                    </div>
                `;
            });

            shopItemsContainer.innerHTML = cartHTML;
            checkoutContainer.innerHTML = `<h1 id="total">Total Price: $${totalItems * 220}</h1>`;

            cartItems.forEach((item, index) => {
                document.getElementById(`killID${index}`).addEventListener('click', () => {
                    cartItems.splice(index, 1);
                    localStorage.setItem('cartItems', JSON.stringify(cartItems));
                    location.reload();
                });
            });

            document.getElementById('clearCart').addEventListener('click', () => {
                localStorage.removeItem('cartItems');
                location.reload();
            });

            // document.getElementById('checkout').addEventListener('click', () => {
            //     const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
            //     if (cartItems.length === 0) return;

            //     // Build line items with `properties` for Shopify
            //     const formData = cartItems.map(item => {
            //         return {
            //             id: "48356125376745", // your only variant ID
            //             quantity: item.quantity,
            //             properties: {
            //                 Size: item.size
            //             }
            //         };
            //     });

            //     fetch("https://y8hkdv-yg.myshopify.com/cart/add.js", {
            //         method: "POST",
            //         headers: {
            //             "Content-Type": "application/json"
            //         },
            //         body: JSON.stringify(formData[0]) // Shopify only allows 1 item per add.js call
            //     })
            //     .then(response => {
            //         if (!response.ok) throw new Error("Add to cart failed");
            //         return response.json();
            //     })
            //     .then(() => {
            //         window.location.href = "https://y8hkdv-yg.myshopify.com/cart";
            //     })
            //     .catch(err => {
            //         console.error("Error:", err);
            //         alert("Could not start checkout");
            //     });
            // });
            document.getElementById('checkout').addEventListener('click', () => {
                const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
                if (cartItems.length === 0) return;

                const parts = cartItems.map(item => {
                    const props = encodeURIComponent(`properties[Size]=${item.size}`);
                    return `updates[48356125376745]=${item.quantity}&${props}`;
                });

                const checkoutUrl = `https://y8hkdv-yg.myshopify.com/cart?${parts.join('&')}`;
                window.location.href = checkoutUrl;
            });


        });
    </script>
</body>
</html>
