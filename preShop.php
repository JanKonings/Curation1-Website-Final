<?php
    include('validSessionCheck.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shop Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="CSS/preShop.css">
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
    </div>

    <div id="countdown">
        <div class="eggDrop">
            <img id="animation" src="Images/eggDrop/Untitled_Artwork-17.jpeg">
        </div>  

        <div id="timer">
        <span id="countdownTimer" class="time"></span>
        </div>
    </div>

    <script>
        window.onload = function() {
            const animationImg = document.getElementById('animation');
            let frameIndex = 1;

            // Array of image filenames (Untitled_Artwork-17.jpeg to Untitled_Artwork-44.jpeg)
            const totalFrames = 21;
            const imagePaths = [];
            for (let i = 1; i <= totalFrames; i++) {
                imagePaths.push(`Images/eggDrop/Untitled_Artwork-${i}.jpeg`);  // Assuming images are in the Images folder
            }

            // Function to update the src attribute of the img element to the next frame
            function updateImageSource() {
                animationImg.src = imagePaths[frameIndex - 1];
                
                // Move to the next frame
                frameIndex++;
                if (frameIndex > imagePaths.length) {
                    clearInterval(animationInterval); // Stop the animation when the last frame is reached
                }
            }

            // Start changing the image source every 100 milliseconds (adjust speed as needed)
            const frameRate = 80;  
            let animationInterval = setInterval(updateImageSource, frameRate);





            const targetDate = new Date().getTime() + 5000; // 10 seconds from now
        

            const countdownFunction = setInterval(function() {
                const now = new Date().getTime();
                const remainingTime = targetDate - now;

                const hours = Math.floor((remainingTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)); // hours
                const minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60)); // minutes
                const seconds = Math.floor((remainingTime % (1000 * 60)) / 1000); // seconds

                const formattedHours = String(hours).padStart(2, '0');
                const formattedMinutes = String(minutes).padStart(2, '0');
                const formattedSeconds = String(seconds).padStart(2, '0');

                document.getElementById("countdownTimer").innerText = `${formattedHours}:${formattedMinutes}:${formattedSeconds}`;

                if (remainingTime < 0) {
                    clearInterval(countdownFunction);
                    window.location.href = "Shop.php";
                }
            }, 1); // Update every millisecond
        };
    </script>
</body>
</html>