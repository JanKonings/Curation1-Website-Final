document.addEventListener("DOMContentLoaded", function () {
    updateCartCount();

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
        hr.style.border = '1px solid #000000ff';
        hr.style.margin = '10px 0';
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
                    <img src="/assets/images/cartPants.png" id="cartItemImg">
                    <div class="cartItemInfo">
                        <h1>YOKED MIDNIGHT DENIM</h1>
                        <h3 class="modeTag">(${item.mode === "preorder" ? "PREORDER" : "PREMADE"})</h3>
                        <h2>waist: ${item.waist}</h2>
                        <h2>inseam: ${item.inseam}</h2>
                        <h2>$${subtotal}</h2>
                    </div>
                </div>
                <div class="edits">
                    <h1>
                        <button class="qtyBtn" data-index="${index}" data-action="decrease">−</button>
                        ${item.quantity}
                        <button class="qtyBtn" data-index="${index}" data-action="increase">+</button>
                    </h1>
                    <h3 id="killID${index}">REMOVE</h3>
                </div>
            </div>
        `;
    });

    shopItemsContainer.innerHTML = cartHTML;
    subtotalDiv.innerHTML = `<h2>Subtotal: $${totalPrice}</h2>`;

    // quantity buttons
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

    // remove buttons
    cartItems.forEach((item, index) => {
        const killEl = document.getElementById(`killID${index}`);
        if (killEl) {
            killEl.addEventListener('click', () => {
                cartItems.splice(index, 1);
                localStorage.setItem('cartItems', JSON.stringify(cartItems));
                location.reload();
            });
        }
    });

    // CHECKOUT HANDLER (premade + preorder logic)
    document.getElementById("checkout").addEventListener("click", async function () {
        const cartItems = JSON.parse(localStorage.getItem("cartItems")) || [];
        const accessToken = "152c935098af7d620d360cc0eebcec78"; // Storefront access token
        const shopifyDomain = "y8hkdv-yg.myshopify.com";

        if (cartItems.length === 0) return;

        this.disabled = true;
        this.innerText = "Redirecting...";

        // Premade variant map (same as shop page)
        const PREMADE_VARIANT_MAP = {
            "28-30": "gid://shopify/ProductVariant/49386435870953",
            "28-32": "gid://shopify/ProductVariant/49386435903721",
            "30-30": "gid://shopify/ProductVariant/49386435936489",
            "30-32": "gid://shopify/ProductVariant/49386435838185",
            "32-30": "gid://shopify/ProductVariant/49386435969257",
            "32-32": "gid://shopify/ProductVariant/49386436002025",
            "34-30": "gid://shopify/ProductVariant/49386436034793",
            "34-32": "gid://shopify/ProductVariant/49386436067561",
        };

        // Single preorder variant
        const PREORDER_VARIANT_ID = "gid://shopify/ProductVariant/48356125376745"; 

        // Convert each item into Storefront API format
        const storefrontItems = cartItems.map(item => {
            const key = `${item.waist}-${item.inseam}`;
            const mode = item.mode || "premade"; // default premade if old items

            if (mode === "preorder") {
                // PREORDER MODE: always single variant + attributes
                return {
                    quantity: item.quantity,
                    merchandiseId: PREORDER_VARIANT_ID,
                    attributes: [
                        { key: "Waist", value: item.waist },
                        { key: "Inseam", value: item.inseam }
                    ]
                };
            } else {
                // PREMADE MODE: use size-specific variant
                const variantId = PREMADE_VARIANT_MAP[key];

                if (!variantId) {
                    console.error("No variantId for combo:", key);
                    return null; // filtered out below
                }

                return {
                    quantity: item.quantity,
                    merchandiseId: variantId,
                    attributes: [
                        { key: "Waist", value: item.waist },
                        { key: "Inseam", value: item.inseam }
                    ]
                };
            }
        }).filter(Boolean);

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
            console.log("Full Shopify API Response:", data);

            if (data.data?.cartCreate?.cart?.checkoutUrl) {
                console.log("Shopify Checkout URL:", data.data.cartCreate.cart.checkoutUrl);
                localStorage.removeItem("cartItems");
                window.location.href = data.data.cartCreate.cart.checkoutUrl;
            } else {
                alert("Something went wrong creating the cart.");

                const userErrors = data.data?.cartCreate?.userErrors;
                const topErrors = data.errors;

                if (userErrors && userErrors.length > 0) {
                    console.error("Shopify userErrors:", userErrors);
                } else if (topErrors && topErrors.length > 0) {
                    console.error("Shopify GraphQL top-level errors:", topErrors);
                } else {
                    console.error("Unknown Shopify error:", data);
                }
            }
        } catch (error) {
            console.error("Network or parsing error:", error);
            alert("Network error when trying to contact Shopify.");
        }
    });
});



// document.addEventListener("DOMContentLoaded", function () {
//     updateCartCount();

//     const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
//     const cartStatus = document.querySelector('.cartStatus');
//     const shopItemsContainer = document.querySelector('.shopItems');
//     const checkoutBox = document.querySelector('.finalize');
//     const subtotalDiv = document.querySelector('.subtotal'); 


//     if (cartItems.length === 0) {
//         cartStatus.innerHTML = `<h1>nothing in your cart</h1>`;
//         return;
//     } else {
//         const header = document.getElementById('cartHeader');
//         const hr = document.createElement('hr');
//         hr.style.border = '1px solid #000000ff';  // This makes it visible
//         hr.style.margin = '10px 0';              // Adds space above and below the <hr>
//         header.insertAdjacentElement('afterend', hr);

//         checkoutBox.style.display = 'flex';
//     }


//     let cartHTML = '';
//     let totalItems = 0;
//     let totalPrice = 0;
    
//     cartItems.forEach((item, index) => {
//         const subtotal = 200 * item.quantity;
//         totalItems += item.quantity;
//         totalPrice += subtotal;
//         cartHTML += `
//             <div class="cartItem" id="cartItem${index}">
//                 <div class="wrapper">
//                     <img src="Images/cartPantsv1.png" id="cartItemImg">
//                     <div class="cartItemInfo">
//                         <h1>YOKED DENIM</h1>
//                         <h2>waist: ${item.waist}</h2>
//                         <h2>inseam: ${item.inseam}</h2>
//                         <h2>$${subtotal}</h2>
//                     </div>
//                 </div>
//                 <div class="edits">
//                     <h1><button class="qtyBtn" data-index="${index}" data-action="decrease">−</button>${item.quantity}
//                     <button class="qtyBtn" data-index="${index}" data-action="increase">+</button></h1>
//                     <h3 id="killID${index}">REMOVE</h3>
//                 </div>
//             </div>
//         `;
//     });


//     shopItemsContainer.innerHTML = cartHTML;

//     subtotalDiv.innerHTML = `<h2>Subtotal: $${totalPrice}</h2>`;


//     document.querySelectorAll('.qtyBtn').forEach(btn => {
//         btn.addEventListener('click', function () {
//             const index = parseInt(this.getAttribute('data-index'));
//             const action = this.getAttribute('data-action');

//             if (action === 'increase') {
//                 cartItems[index].quantity += 1;
//             } else if (action === 'decrease' && cartItems[index].quantity > 1) {
//                 cartItems[index].quantity -= 1;
//             }

//             localStorage.setItem('cartItems', JSON.stringify(cartItems));
//             location.reload(); 
//         });
//     });

//     cartItems.forEach((item, index) => {
//         document.getElementById(`killID${index}`).addEventListener('click', () => {
//             cartItems.splice(index, 1);
//             localStorage.setItem('cartItems', JSON.stringify(cartItems));
//             location.reload();
//         });
//     });

//     document.getElementById("checkout").addEventListener("click", async function () {
//         const cartItems = JSON.parse(localStorage.getItem("cartItems")) || [];
//         const accessToken = "152c935098af7d620d360cc0eebcec78"; // Replace with your Storefront access token
//         const shopifyDomain = "y8hkdv-yg.myshopify.com"; // Your Shopify .myshopify.com domain

//         if (cartItems.length === 0) return;

//         this.disabled = true;
//         this.innerText = "Redirecting...";

//         const VARIANT_MAP = {
//         "28-30": "gid://shopify/ProductVariant/49386435870953",
//         "28-32": "gid://shopify/ProductVariant/49386435903721",
//         "30-30": "gid://shopify/ProductVariant/49386435936489",
//         "30-32": "gid://shopify/ProductVariant/49386435838185",
//         "32-30": "gid://shopify/ProductVariant/49386435969257",
//         "32-32": "gid://shopify/ProductVariant/49386436002025",
//         "34-30": "gid://shopify/ProductVariant/49386436034793",
//         "34-32": "gid://shopify/ProductVariant/49386436067561",
//         };

//         // Convert each item into Storefront API format
//         const storefrontItems = cartItems.map(item => {
//             const key = `${item.waist}-${item.inseam}`;
//             const variantId = VARIANT_MAP[key];

//             if (!variantId) {
//                 console.error("No variantId for combo:", key);
//                 return null; // or filter it out
//             }

//             return {
//                 quantity: item.quantity,
//                 merchandiseId: variantId,
//                 attributes: [
//                     { key: "Waist", value: item.waist },
//                     { key: "Inseam", value: item.inseam }
//                 ]
//             };
//         }).filter(Boolean); // remove nulls just in case


//         try {
//             const response = await fetch(`https://${shopifyDomain}/api/2023-10/graphql.json`, {
//             method: "POST",
//             headers: {
//                 "Content-Type": "application/json",
//                 "X-Shopify-Storefront-Access-Token": accessToken
//             },
//             body: JSON.stringify({
//                 query: `
//                 mutation cartCreate($input: CartInput!) {
//                     cartCreate(input: $input) {
//                     cart {
//                         checkoutUrl
//                     }
//                     userErrors {
//                         field
//                         message
//                     }
//                     }
//                 }
//                 `,
//                 variables: {
//                 input: {
//                     lines: storefrontItems
//                 }
//                 }
//             })
//             });

//             const data = await response.json();

//             // Log the full response
//             console.log("Full Shopify API Response:", data);

//             // If successful, redirect to checkout
//             if (data.data?.cartCreate?.cart?.checkoutUrl) {
//             console.log("Shopify Checkout URL:", data.data.cartCreate.cart.checkoutUrl);
//             localStorage.removeItem("cartItems");
//             window.location.href = data.data.cartCreate.cart.checkoutUrl;
//             } else {
//             alert("Something went wrong creating the cart.");

//             const userErrors = data.data?.cartCreate?.userErrors;
//             const topErrors = data.errors;

//             if (userErrors && userErrors.length > 0) {
//                 console.error("Shopify userErrors:", userErrors);
//             } else if (topErrors && topErrors.length > 0) {
//                 console.error("Shopify GraphQL top-level errors:", topErrors);
//             } else {
//                 console.error("Unknown Shopify error:", data);
//             }
//             }
//         } catch (error) {
//             console.error("Network or parsing error:", error);
//             alert("Network error when trying to contact Shopify.");
//         }
//     });
// });