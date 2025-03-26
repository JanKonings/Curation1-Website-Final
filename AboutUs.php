<?php
    include('validSessionCheck.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/aboutUs.css">
    <link rel="stylesheet" type="text/css" href="CSS/header.css">
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

        <a id="cart" href="cart.html">
            <img id="cartIMG" src="Images/cart.png" />
        </a>
    </div>

    <!-- <svg id="letter">
        
        <image id="videoLink" href="Images/HomePageLogo.JPG" />

        <line class="leftLetter" x1="0" y1="0" x2="200" y2="150" />
        <line class="rightLetter" x1="590" y1="0" x2="395" y2="150" />


    </svg> -->
    <div class="videoContainer">
        <!-- Diagonal Lines -->
        <img id="videoLink" src="Images/HomePageLogo.JPG" />
         <div class="diagonalLine1"></div>
         <div class="diagonalLine2"></div>
    </div>



        
</body>
</html>

