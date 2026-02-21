<?php include __DIR__ . '/../includes/session.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png?v=3">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png?v=3">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png?v=3">
    <link rel="stylesheet" type="text/css" href="/assets/css/tokens.css?v=1">
    <link rel="stylesheet" type="text/css" href="/assets/css/homepageCSS.css?v=7">
    <link rel="stylesheet" type="text/css" href="/assets/css/header.css?v=7">
    <link rel="stylesheet" type="text/css" href="/assets/css/earlyAccess.css?v=8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=La+Belle+Aurore&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&family=Cormorant:ital,wght@0,300..700;1,300..700&family=Geist:wght@100..900&family=Hind:wght@300;400;500;600;700&family=La+Belle+Aurore&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Outfit:wght@100..900&family=Yantramanav:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="/assets/js/cartUtils.js?v=6"></script>
    <script src="/assets/js/earlyAccessSubmit.js?v=4"></script>
  
</head>
<body>
    <?php include __DIR__ . '/../includes/header.php'; ?>

    <div class="imgHolder">
        <svg id="LogoWrap">
            <defs>
                <path id="upperCurve" d="M 0,185 A 130,130 0 0,1 300,185"/>
                <path id="lowerCurve" d="M 0,210 A 163,130 0 0,0 300,195"/>
            </defs>
        
            <!-- <image id="Logo" href="/assets/images/logo.png?v=1" /> -->
            <image id="Logo" href="/assets/images/logoBlack.png?v=3" />

            <text>
                <textPath class="logoText" href="#upperCurve" startOffset="50%">
                    curation1
                </textPath>
            </text>
        
            <text>
                <textPath class="logoText" href="#lowerCurve" startOffset="50%">
                    for the perceivers
                </textPath>
            </text>
        </svg>
    </div>

    <ul id="homepageNav">
        <li><a href="/pages/shop.php">Shop</a></li>
        <li><a href="/pages/about.php">About Us</a></li>
        <h2 id="earlyAccessToggle">E-LIST</h2>
        <!-- <button onclick="window.location.href='/pages/logout.php'">Logout</button> -->
    </ul>

    <?php include __DIR__ . '/../includes/early-access.php'; ?>
    <script src="/assets/js/homepage.js?v=3"></script>
</body>
</html>
