document.addEventListener("DOMContentLoaded", function() {
    updateCartCount();
});

function updateCartCount() {
    const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
    const totalItems = cartItems.reduce((sum, item) => sum + item.quantity, 0);
    const headerCartCount = document.getElementById("headerCartCount");

    if (headerCartCount) {
        headerCartCount.textContent = totalItems;
        headerCartCount.style.display = totalItems > 0 ? "flex" : "none";
    }
}