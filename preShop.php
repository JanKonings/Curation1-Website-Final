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

    <audio id="crackSizzle">
        <source src="Images/eggDrop/sizzleFade.mp3" type="audio/mpeg">
    </audio>    

    <audio id="crack">
        <source src="Images/eggDrop/crack.mp3" type="audio/mpeg">
    </audio> 

    <div id="countdown">
        <div class="eggDrop">
            <div id="eggClick"></div>
            <img id="animation" src="Images/eggDrop/Untitled_Artwork-1-Picsart-BackgroundRemover.jpeg">
            <div id="timer">
                <span id="countdownTimer" class="time"></span>
            </div>

        </div>  

        
    </div>

    <script>
        window.onload = function () {
            let clickCount = 0; // Track number of clicks
            const animationImg = document.getElementById("animation");
            const imagePaths = [];
            const totalFrames = 14;
            
            for (let i = 1; i <= totalFrames; i++) {
                imagePaths.push(`Images/eggDrop/Untitled_Artwork-${i}-Picsart-BackgroundRemover.jpeg`);
            }

            document.getElementById("eggClick").addEventListener("click", function () {
                clickCount++;

                // First click: Change the image once
                if (clickCount === 1) {
                    animationImg.src = imagePaths[1]; // Show first frame
                    var audio = document.getElementById("crack");
                    audio.play();
                    return; // Stop further execution
                }

                // Second click: Start the animation and play audio
                if (clickCount === 2) {
                    animationImg.dataset.clicked = "true"; // Prevent further clicks
                    var audio = document.getElementById("crackSizzle");
                    audio.play();

                    let frameIndex = 1;

                    function updateImageSource() {
                        animationImg.src = imagePaths[frameIndex]; // Update image
                        frameIndex++;

                        if (frameIndex >= imagePaths.length) {
                            clearInterval(animationInterval); // Stop slideshow

                            // Start countdown
                            const targetDate = new Date().getTime() + 5000;
                            const countdownFunction = setInterval(function () {
                                const now = new Date().getTime();
                                const remainingTime = targetDate - now;

                                const hours = Math.floor((remainingTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                const minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
                                const seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);

                                document.getElementById("countdownTimer").innerText = 
                                    `${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;

                                if (remainingTime < 0) {
                                    clearInterval(countdownFunction);
                                    document.getElementById("countdownTimer").innerText = "00:00:00";
                                    window.location.href = "Shop.php";
                                }
                            }, 200);
                        }
                    }

                    // Start animation
                    const frameRate = 80;
                    let animationInterval = setInterval(updateImageSource, frameRate);
                }
            });
        };

    </script>
</body>
</html>