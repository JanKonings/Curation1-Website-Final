<?php include __DIR__ . '/../includes/session.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Shop Page</title>
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png?v=3">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png?v=3">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png?v=3">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="/assets/css/shop.css?v=7">
    <link rel="stylesheet" type="text/css" href="/assets/css/header.css?v=7">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&family=La+Belle+Aurore&display=swap" rel="stylesheet">
    <script src="/assets/js/cartUtils.js?v=6"></script>
</head>
<body>
    <!-- <div class="midnight"> -->
        <img src="/assets/images/MIDNIGHT.svg" alt="" class="midnightIMG">
    <!-- </div> -->
    <div class="header">
        <a href="/pages/homepage.php"><img src="/assets/images/logoBlack.png?v=3" id="headerLogo"></a>

        <ul id="nav">
            <li><a href="/pages/shop.php">shop</a></li>
            <li><a href="/pages/about.php">about us</a></li>
        </ul>

        <a id="cart" href="/pages/cart.php">
            <img id="cartIMG" src="/assets/images/cart.png?v=4" />
            <div id="headerCartCount">0</div>
        </a>
    </div>

    <audio id="straw" preload="auto">
            <source src="/assets/audio/straw.mp3" type="audio/mp3">
    </audio>

    <div id="shopContainer">
        <div class="imageContainer">
            <img id="shopImg" src="/assets/images/midnight1.png?v=2" alt="Product Image">
            <button class="navButton prevButton">
                <img src="/assets/images/arrowLeft.svg" alt="Previous" />
            </button>
            <button class="navButton nextButton">
                <img src="/assets/images/arrowRight.svg" alt="Next" />
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
            <h4 id="currProduct">(PREMADE)</h4>
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
            </div>
            <h3 id="inseam">inseam</h3> 
            <div class="sizeOptions">
                <input type="radio" name="inseam" id="inseam30" class="customRadio" value="30">
                <label for="inseam30">30</label>
                <input type="radio" name="inseam" id="inseam32" class="customRadio" value="32">
                <label for="inseam32">32</label>
            </div>

            <button type="button" id="addToCart">ADD TO CART</button>
            <p id="purchaseInfo">14.5oz black bull selvedge denim <br> fabric and trims sourced from japan <br> wide leg, slight flare, made in NYC <br> premade, please allow 7 businness days to ship</p>
        </form>

        <!-- <img src="Images/logo.png" id="cornerImg"> -->
    </div>
    <script src="/assets/js/shop.js?v=6"></script>
</body>
</html>