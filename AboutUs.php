<?php include 'validSessionCheck.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="CSS/aboutUs.css?v=4">
    <link rel="stylesheet" type="text/css" href="CSS/header.css?v=4">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&family=La+Belle+Aurore&display=swap" rel="stylesheet">
    <script src="Javascript/cartUtils.js?v=1"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            updateCartCount();
        });
    </script>
</head>
<body>
    <div class="header">
        <a href="homepage.php"><img src="Images/logo.png" id="headerLogo"></a>

        <ul id="nav">
            <li><a href="Shop.php">shop</a></li>
            <li><a href="AboutUs.php">about us</a></li>
        </ul>

        <a id="cart" href="cart.php">
            <img id="cartIMG" src="Images/cart.png?v=1" />
            <div id="headerCartCount">0</div>
        </a>
    </div>

    <div class="letterContainer">
        <img src="Images/letter.png?v=1" id="letterImg">
    </div>

    <script>
        // $(document).ready(function () {
        //     let animationStarted = false;

        //     const $letterImg = $('#letterImg');

        //     $('.letterBox').hover(
        //         function () {
        //             if (!animationStarted) {
        //                 $letterImg.attr('src', 'Images/Untitled_Artwork-2.png');
        //             }
        //         },
        //         function () {
        //             if (!animationStarted) {
        //                 $letterImg.attr('src', 'Images/Untitled_Artwork-1.png');
        //             }
        //         }
        //     );

        //     $('.letterBox').on('click', function () {
        //         if (animationStarted) return;
        //         animationStarted = true;

        //         const totalFrames = 11;
        //         let currentFrame = 3;
        //         const interval = 150;

        //         const animate = () => {
        //             if (currentFrame > totalFrames) return;

        //             $letterImg.attr('src', `Images/Untitled_Artwork-${currentFrame}.png`);
        //             currentFrame++;

        //             if (currentFrame <= totalFrames) {
        //                 setTimeout(animate, interval);
        //             }
        //         };

        //         animate();
        //     });
        // });
    </script>



        
</body>
</html>

