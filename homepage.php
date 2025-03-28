<?php
    include('validSessionCheck.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/homepageCSS.css">
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
            <li><text>Pre - Order Coming soon!</text></li>
        </ul>

        <a id="cart" href="cart.php">
            <img id="cartIMG" src="Images/cart.png" />
        </a>
    </div>

    <div class="imgHolder">
        <svg id="LogoWrap">
            <defs>
                <path id="upperCurve" d="M 0,185 A 130,130 0 0,1 300,185"/>
                <path id="lowerCurve" d="M 0,210 A 170,130 0 0,0 300,210"/>
            </defs>
        
            <image id="Logo" href="Images/HomePageLogo.JPG" />

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
        <li><a href="Shop.php">Shop</a></li>
        <li><a href="AboutUs.php">About Us</a></li>
        <li><a href="Contact.html">Contact</a></li>
    </ul>
</body>
</html>
