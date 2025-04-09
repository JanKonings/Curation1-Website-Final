<?php
    include('validSessionCheck.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" type="text/css" href="CSS/homepageCSS.css">
    <link rel="stylesheet" type="text/css" href="CSS/header.css">
    <link rel="stylesheet" type="text/css" href="CSS/earlyAccess.css">
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
        <li><a href="preShop.php">Shop</a></li>
        <li><a href="AboutUs.php">About Us</a></li>
        <li><a href="Contact.html">Contact</a></li>
    </ul>

    <!-- Sign Up Form -->
    <div class="earlyAccess">
        <div class="earlyAccessForm">
            <div id="sideImgBox">
                <!-- <img src="Images/EarlyAccessImg.png" id="sideImg"> -->
                <img src="Images/HomePageLogo.JPG" id="sideImg">
            </div>
            <!-- <form id="signupForm">
                <h1 id="curationHead">curation1</h1>
                <h2 id="close">X</h2>
                <input type="email" id="email" required placeholder="Email Address"/>

                <input type="tel" id="phone" required placeholder="Phone Number"/>

                <div class="checkMessage">
                    <input type="checkbox" id="check" required>
                    <h2 id="checkMsg">Receive offers via Email</h2>
                </div>

                <p id="userAgreement">By checking this box, I consent to receive marketing emails through an automatic email sending system at the email provided. Consent is not a condition to purchase. Check our privacy policy here</p>

                <button id="earlyAccessButton" type="submit">SUBSCRIBE</button>
            </form> -->
            <form id="signupForm"
                action="https://curation1.us14.list-manage.com/subscribe/post?u=7fb68a2e05e7a1ddaf719bfcf&amp;id=b11ffa7b7d&amp;f_id=00b8b4e5f0"
                method="post"
                target="_blank"
                novalidate>
            
            <h1 id="curationHead">curation1</h1>
            <h2 id="close">X</h2>

            <input type="email" name="EMAIL" id="email" required placeholder="Email Address" />

            <input type="tel" name="PHONE" id="phone" required placeholder="Phone Number" />

            <div class="checkMessage">
                <input type="checkbox" id="check" required>
                <h2 id="checkMsg">Receive offers via Email</h2>
            </div>

            <p id="userAgreement">By checking this box, I consent to receive marketing emails...</p>

            <!-- Honeypot field to prevent spam bots -->
            <div style="position: absolute; left: -5000px;" aria-hidden="true">
                <input type="text" name="b_7fb68a2e05e7a1ddaf719bfcf_b11ffa7b7d" tabindex="-1" value="">
            </div>

            <button id="earlyAccessButton" type="submit">SUBSCRIBE</button>
            </form>
            
            <script>
                document.getElementById('signupForm').addEventListener('submit', function (e) {
                    e.preventDefault(); // Stop the default redirect
                    const form = e.target;
                    const formData = new FormData(form);

                    fetch(form.action, {
                    method: form.method,
                    mode: 'no-cors', // Prevents CORS errors (but limits response)
                    body: formData
                    }).then(() => {
                    alert('Thank you for subscribing!');
                    form.reset(); // Optional: clears form inputs
                    }).catch((err) => {
                    console.error('Submission error:', err);
                    alert('Oops! Something went wrong.');
                    });
                });
            </script>

        </div>
    </div>
    <div class="getEarlyAccess">
        <h2 id="earlyAccessToggle">Early Access</h2>
    </div>

    <script>
        document.getElementById("earlyAccessToggle").addEventListener("click", function () {
            document.querySelector(".earlyAccess").style.display = "flex";
        });

        document.addEventListener("click", function (event) {
            const earlyAccessForm = document.querySelector(".earlyAccessForm");
            const earlyAccessToggle = document.getElementById("earlyAccessToggle");
            const closeButton = document.getElementById("close");

            if (!earlyAccessForm.contains(event.target) && event.target !== earlyAccessToggle || event.target === closeButton) {
                document.querySelector(".earlyAccess").style.display = "none";
            }
        });
    </script>
</body>
</html>
