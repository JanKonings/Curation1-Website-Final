<?php include __DIR__ . '/../includes/session.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>About Us</title>
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png?v=3">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png?v=3">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png?v=3">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="/assets/css/tokens.css?v=1">
    <link rel="stylesheet" type="text/css" href="/assets/css/aboutUs.css?v=9">
    <link rel="stylesheet" type="text/css" href="/assets/css/header.css?v=7">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&family=La+Belle+Aurore&display=swap" rel="stylesheet">
    <script src="/assets/js/cartUtils.js?v=6"></script>
    <script src="/assets/js/aboutUs.js?v=4"></script>
</head>
<body>
    <?php include __DIR__ . '/../includes/header.php'; ?>

    <div class="letterContainer">
        <div class="letterBox"></div>
        <img src="/assets/images/Untitled_Artwork-1.png?v=3" id="letterImg">
    </div>
    <div class="aboutUsModal">
        <div class="aboutUsModalContent">
                        <div class="paperclip"></div>

            <button class="modalClose">&times;</button>

            <div class="letterLines">

                <p>
                    curation1 is a Boston based brand striving to
                    create high quality garments with elegant yet
                    subtle design aspects. We pride ourselves on
                    the close attention to detail we give every
                    design, allowing us to create pieces that are
                    timeless in both style and durability. Our goal
                    is to create pieces that fit within the average
                    everyday wardrobe to seamlessly blend our
                    design aesthetics with the unique style of
                    every customer.
                </p>
            </div>
        </div>
    </div>
</body>
</html>

