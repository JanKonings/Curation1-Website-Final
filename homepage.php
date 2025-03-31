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

    <!-- Firebase SDK (using module imports) -->
    <script type="module">
        import { initializeApp } from 'https://www.gstatic.com/firebasejs/9.6.1/firebase-app.js';
        import { getFirestore, collection, addDoc } from 'https://www.gstatic.com/firebasejs/9.6.1/firebase-firestore.js';
        import { getAuth } from 'https://www.gstatic.com/firebasejs/9.6.1/firebase-auth.js';

        // Firebase configuration
        const firebaseConfig = {
            apiKey: "AIzaSyCR727DLmBrBtJXZkGLpa1AxR2sia46ZhM",
            authDomain: "curation1.firebaseapp.com",
            projectId: "curation1",
            storageBucket: "curation1.firebasestorage.app",
            messagingSenderId: "379839801859",
            appId: "1:379839801859:web:d5fff7482523f7e5b77c36",
            measurementId: "G-D2BXZYQEP4"
        };

        // Initialize Firebase
        const app = initializeApp(firebaseConfig);
        const db = getFirestore(app);  // Firestore database reference
        const auth = getAuth(app);     // Authentication reference

        // Handle form submission
        document.getElementById("signupForm").addEventListener("submit", async function (e) {
            e.preventDefault();  // Prevent form from reloading the page

            // Get user input
            const email = document.getElementById("email").value;
            const phone = document.getElementById("phone").value;

            // Add user data to Firestore
            try {
                await addDoc(collection(db, "users"), {
                    email: email,
                    phone: phone
                });
                console.log("User data saved to Firestore!");
                alert("Thanks for signing up! You'll receive a welcome message soon.");
            } catch (error) {
                console.error("Error saving user data:", error);
            }
        });
    </script>
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
                <img src="Images/EarlyAccessImg.png" id="sideImg">
            </div>
            <form id="signupForm">
                <h1 id="curationHead">Curation1</h1>
                <!-- <label for="email">Email:</label> -->
                <input type="email" id="email" required placeholder="Email Address"/>

                <!-- <label for="phone">Phone Number:</label> -->
                <input type="tel" id="phone" required placeholder="Phone Number"/>

                <div class="checkMessage">
                    <input type="checkbox" id="check" required>
                    <h2 id="checkMsg">Receive offers via Email</h2>
                </div>

                <p id="userAgreement">By checking this box, I consent to receive marketing emails through an automatic email sending system at the email provided. Consent is not a condition to purchase. Check our privacy policy here</p>

                <button id="earlyAccessButton" type="submit">SUBSCRIBE</button>
            </form>
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

            if (!earlyAccessForm.contains(event.target) && event.target !== earlyAccessToggle) {
                document.querySelector(".earlyAccess").style.display = "none";
            }
        });
    </script>
</body>
</html>
