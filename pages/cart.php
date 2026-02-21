<?php include __DIR__ . '/../includes/session.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png?v=3">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png?v=3">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png?v=3">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="/assets/css/tokens.css?v=1">
    <link rel="stylesheet" type="text/css" href="/assets/css/header.css?v=7">
    <link rel="stylesheet" type="text/css" href="/assets/css/cart.css?v=5">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&family=La+Belle+Aurore&display=swap" rel="stylesheet">
    <script src="/assets/js/cartUtils.js?v=6"></script>
</head>
<body>
    <?php include __DIR__ . '/../includes/header.php'; ?>

    <div class="cartContainer">
        <h1 id="cartHeader">your cart</h1>
        <div class="shopItems"></div>
        <div class="finalize">
            <div class="subtotal"></div>
            <button type="button" id="checkout">CHECKOUT</button>
        </div>
        <div class="cartStatus"></div>
    </div>

    <script src="/assets/js/cart.js?v=4"></script>
</body>
</html>
