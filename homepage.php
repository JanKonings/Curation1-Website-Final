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
            <h2 id="close">X</h2>
            <div id="sideImgBox">
                <!-- <img src="Images/EarlyAccessImg.png" id="sideImg"> -->
                <img src="Images/HomePageLogo.JPG" id="sideImg">
            </div>
            <form id="signupForm">
                <h1 id="curationHead">curation1</h1>
                <!-- <h2 id="close">X</h2> -->
                <input type="email" id="email" required placeholder="Email Address"/>

                <div id="phoneWrapper">
                    <!-- Country Code Dropdown -->
                    <select id="countryCode" required>
                        <option value="+1" data-country="USA">+1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(USA)</option>
                        <option value="+44" data-country="UK">+44&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(UK)</option>
                        <option value="+91" data-country="India">+91&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(India)</option>
                        <option value="+61" data-country="Australia">+61&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Australia)</option>
                        <option value="+33" data-country="France">+33&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(France)</option>
                        <option value="+49" data-country="Germany">+49&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Germany)</option>
                        <option value="+55" data-country="Brazil">+55&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Brazil)</option>
                        <option value="+81" data-country="Japan">+81&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Japan)</option>
                        <option value="+34" data-country="Spain">+34&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Spain)</option>
                        <option value="+7" data-country="Russia">+7&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Russia)</option>
                        <option value="+226" data-country="Burkina Faso">+226&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Burkina Faso)</option>
                        <option value="+213" data-country="Algeria">+213&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Algeria)</option>
                        <option value="+54" data-country="Argentina">+54&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Argentina)</option>
                        <option value="+375" data-country="Belarus">+375&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Belarus)</option>
                        <option value="+359" data-country="Bulgaria">+359&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Bulgaria)</option>
                        <option value="+387" data-country="Bosnia and Herzegovina">+387&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Bosnia and Herzegovina)</option>
                        <option value="+1-246" data-country="Barbados">+1-246&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Barbados)</option>
                        <option value="+254" data-country="Kenya">+254&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Kenya)</option>
                        <option value="+1-242" data-country="Bahamas">+1-242&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Bahamas)</option>
                        <option value="+506" data-country="Costa Rica">+506&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Costa Rica)</option>
                        <option value="+855" data-country="Cambodia">+855&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Cambodia)</option>
                        <option value="+225" data-country="Ivory Coast">+225&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Ivory Coast)</option>
                        <option value="+57" data-country="Colombia">+57&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Colombia)</option>
                        <option value="+255" data-country="Tanzania">+255&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Tanzania)</option>
                        <option value="+233" data-country="Ghana">+233&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Ghana)</option>
                        <option value="+1-767" data-country="Dominica">+1-767&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Dominica)</option>
                        <option value="+1-59" data-country="Saint Lucia">+1-59&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Saint Lucia)</option>


                        <!-- Add more country codes as needed -->
                    </select>
                    <!-- Phone Number Input -->
                    <input type="tel" id="phone" required placeholder="Phone Number" pattern="^\d{1,14}$" title="Phone number should only contain digits" />
                </div>

                <!-- <input type="tel" id="phone" required placeholder="Phone Number"/> -->

                <div class="checkMessage">
                    <input type="checkbox" id="check" required>
                    <h2 id="checkMsg">Receive offers via Email</h2>
                </div>

                <p id="userAgreement">By checking this box, I consent to receive marketing emails through an automatic email sending system at the email provided. Consent is not a condition to purchase. Check our privacy policy here</p>

                <button id="earlyAccessButton" type="submit">SUBSCRIBE</button>
            </form>

            <script>
                $(document).ready(function () {
                    $("#signupForm").on("submit", function (e) {
                        e.preventDefault();

                        const email = $("#email").val();
                        const countryCode = $("#countryCode").val(); // Get selected country code from dropdown
                        const phone = $("#phone").val();

                        // Validate phone number format
                        const phonePattern = /^\d{1,14}$/; // Allow only digits, up to 14 characters
                        if (!phonePattern.test(phone)) {
                            alert("Please enter a valid phone number (only digits, no spaces or special characters).");
                            return;
                        }

                        // Concatenate country code and phone number
                        const fullPhone = countryCode + phone; // This is the full phone number to send
                        console.log("Full Phone Number: ", fullPhone); // Debugging line
                        console.log("Email: ", email); // Debugging line
                        $.ajax({
                            type: "POST",
                            url: "signupToBrevo.php",
                            data: {
                                email: email,
                                phone: fullPhone // Send the concatenated phone number
                            },
                            success: function (response) {
                                alert("You're subscribed!");
                                $("#signupForm")[0].reset();
                            },
                            error: function () {
                                alert("Something went wrong. Please try again.");
                            }
                        });
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
