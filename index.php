<!DOCTYPE html>
<html>
<head>
    <title>Shop Page</title>
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png?v=3">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png?v=3">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png?v=3">
    <meta name="viewport" content="width=device-width, initial-scale=.75, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="/assets/css/tokens.css?v=1">
    <link rel="stylesheet" type="text/css" href="/assets/css/preShop.css?v=6">
    <link rel="stylesheet" type="text/css" href="/assets/css/earlyAccess.css?v=8">
    <script src="/assets/js/earlyAccessSubmit.js?v=4" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=La+Belle+Aurore&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&family=Cormorant:ital,wght@0,300..700;1,300..700&family=Geist:wght@100..900&family=Hind:wght@300;400;500;600;700&family=La+Belle+Aurore&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Outfit:wght@100..900&family=Yantramanav:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>
<body>
    <!-- <div class="header">
        <button class="hamburgerNav" id="hamburgerNav">
            <span class="line"></span>
            <span class="line"></span>
            <span class="line"></span>
        </button>

        <ul id="nav">
            <li><a href="homepage.php">
                <img id="home" src="Images/HomePageLogo.JPG" />
            </a></li>
            <li><a href="preShop.php">Shop</a></li>
            <li><a href="AboutUs.php">About Us</a></li>
            <li><a href="Contact.html">Contact</a></li>
        </ul>

        <a id="cart" href="cart.php">
            <img id="cartIMG" src="Images/cart.png" />
        </a>
    </div> -->

    <audio id="crackSizzle">
        <source src="/assets/images/eggDrop/sizzleFade.mp3" type="audio/mpeg">
    </audio>

    <audio id="crack">
        <source src="/assets/images/eggDrop/crack.mp3" type="audio/mpeg">
    </audio> 

    <div id="countdown">
        <div class="eggDrop">
            <div id="eggClick">
                <h1 class="instructions">shop now</h1>
            </div>
            <img id="animation" src="/assets/images/eggDropMidnight/IMG_0251-16.PNG?v=3" />
            <div id="timer">
                <span id="countdownTimer" class="time"></span>
            </div>

        </div>
    </div>

    <?php include __DIR__ . ‘/includes/early-access.php’; ?>
    <div class="getEarlyAccess">
        <h2 id="earlyAccessToggle">E-LIST</h2>
    </div>

    <script src="/assets/js/index.js?v=3"></script>
</body>
</html>