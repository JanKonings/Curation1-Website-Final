<?php include 'validSessionCheck.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="CSS/header.css?v=1">
    <link rel="stylesheet" type="text/css" href="CSS/cart.css?v=2">
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
        <!-- <button type="button" id="clearCart">clear</button> -->

        <a id="cart" href="cart.php">
            <img id="cartIMG" src="Images/cart.png?v=1" />
            <div id="headerCartCount">0</div>
        </a>
    </div>

    <div class="cartContainer">
        <h1 id="cartHeader">your cart</h1>
        <div class="shopItems"></div>
        <div class="finalize">
            <div class="subtotal"></div>
            <button type="button" id="checkout">CHECKOUT</button>
        </div>
        <div class="cartStatus"></div>
    </div>

    <!-- <img src="Images/logo.png" id="cornerImg"> -->


    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
            const cartStatus = document.querySelector('.cartStatus');
            const shopItemsContainer = document.querySelector('.shopItems');
            const checkoutBox = document.querySelector('.finalize');
            const subtotalDiv = document.querySelector('.subtotal'); 


            if (cartItems.length === 0) {
                cartStatus.innerHTML = `<h1>nothing in your cart</h1>`;
                return;
            } else {
                const header = document.getElementById('cartHeader');
                const hr = document.createElement('hr');
                hr.style.border = '1px solid #D1D1D1';  // This makes it visible
                hr.style.margin = '10px 0';              // Adds space above and below the <hr>
                header.insertAdjacentElement('afterend', hr);

                checkoutBox.style.display = 'flex';
            }


            let cartHTML = '';
            let totalItems = 0;
            let totalPrice = 0;
            
            cartItems.forEach((item, index) => {
                const subtotal = 200 * item.quantity;
                totalItems += item.quantity;
                totalPrice += subtotal;
                cartHTML += `
                    <div class="cartItem" id="cartItem${index}">
                        <div class="wrapper">
                            <img src="Images/cartPantsv1.png" id="cartItemImg">
                            <div class="cartItemInfo">
                                <h1>YOKED DENIM</h1>
                                <h2>waist: ${item.waist}</h2>
                                <h2>inseam: ${item.inseam}</h2>
                                <h2>$${subtotal}</h2>
                            </div>
                        </div>
                        <div class="edits">
                            <h1><button class="qtyBtn" data-index="${index}" data-action="decrease">−</button>${item.quantity}
                            <button class="qtyBtn" data-index="${index}" data-action="increase">+</button></h1>
                            <h3 id="killID${index}">REMOVE</h3>
                        </div>
                    </div>
                `;
            });


            shopItemsContainer.innerHTML = cartHTML;

            subtotalDiv.innerHTML = `<h2>Subtotal: $${totalPrice}</h2>`;


            document.querySelectorAll('.qtyBtn').forEach(btn => {
                btn.addEventListener('click', function () {
                    const index = parseInt(this.getAttribute('data-index'));
                    const action = this.getAttribute('data-action');

                    if (action === 'increase') {
                        cartItems[index].quantity += 1;
                    } else if (action === 'decrease' && cartItems[index].quantity > 1) {
                        cartItems[index].quantity -= 1;
                    }

                    localStorage.setItem('cartItems', JSON.stringify(cartItems));
                    location.reload(); 
                });
            });

            cartItems.forEach((item, index) => {
                document.getElementById(`killID${index}`).addEventListener('click', () => {
                    cartItems.splice(index, 1);
                    localStorage.setItem('cartItems', JSON.stringify(cartItems));
                    location.reload();
                });
            });

            document.getElementById("checkout").addEventListener("click", async function () {
                const cartItems = JSON.parse(localStorage.getItem("cartItems")) || [];
                const accessToken = "152c935098af7d620d360cc0eebcec78"; // Replace with your Storefront access token
                const shopifyDomain = "y8hkdv-yg.myshopify.com"; // Your Shopify .myshopify.com domain

                if (cartItems.length === 0) return;

                this.disabled = true;
                this.innerText = "Redirecting...";

                // Convert each item into Storefront API format
                const storefrontItems = cartItems.map(item => ({
                    quantity: item.quantity,
                    merchandiseId: "gid://shopify/ProductVariant/48356125376745", // Replace with your actual variant GID
                    attributes: [
                    { key: "Waist", value: item.waist },
                    { key: "Inseam", value: item.inseam }
                    ]
                }));

                try {
                    const response = await fetch(`https://${shopifyDomain}/api/2023-10/graphql.json`, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-Shopify-Storefront-Access-Token": accessToken
                    },
                    body: JSON.stringify({
                        query: `
                        mutation cartCreate($input: CartInput!) {
                            cartCreate(input: $input) {
                            cart {
                                checkoutUrl
                            }
                            userErrors {
                                field
                                message
                            }
                            }
                        }
                        `,
                        variables: {
                        input: {
                            lines: storefrontItems
                        }
                        }
                    })
                    });

                    const data = await response.json();

                    // 🔍 Log the full response
                    console.log("📦 Full Shopify API Response:", data);

                    // ✅ If successful, redirect to checkout
                    if (data.data?.cartCreate?.cart?.checkoutUrl) {
                    console.log("✅ Shopify Checkout URL:", data.data.cartCreate.cart.checkoutUrl);
                    localStorage.removeItem("cartItems");
                    window.location.href = data.data.cartCreate.cart.checkoutUrl;
                    } else {
                    alert("Something went wrong creating the cart.");

                    const userErrors = data.data?.cartCreate?.userErrors;
                    const topErrors = data.errors;

                    if (userErrors && userErrors.length > 0) {
                        console.error("❌ Shopify userErrors:", userErrors);
                    } else if (topErrors && topErrors.length > 0) {
                        console.error("❌ Shopify GraphQL top-level errors:", topErrors);
                    } else {
                        console.error("❌ Unknown Shopify error:", data);
                    }
                    }
                } catch (error) {
                    console.error("❌ Network or parsing error:", error);
                    alert("Network error when trying to contact Shopify.");
                }
                });

        });
    </script>
</body>
</html>
