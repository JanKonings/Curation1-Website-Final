<?php
    session_start();

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
        header("Location: /pages/homepage.php");
        exit;
    }

  

    // Initialize error message variable
    $error_message = "";

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Check if the password key exists in the POST array
        if (isset($_POST['password'])) {
            // Get the submitted password
            $submitted_password = $_POST['password'];

            // Check if the password is correct
            if ($submitted_password === $correct_password) {
                // Set session variable to indicate the user is logged in
                $_SESSION['loggedin'] = true;
                // Set the last activity time to ensure valid session
                $_SESSION['LAST_ACTIVITY'] = time();

                // Redirect to the homepage
                header("Location: /pages/homepage.php");
                exit;
            } else {
                // Set error message if the password is incorrect
                $error_message = "incorrect";
            }
        }
    }
?>



<!DOCTYPE html>
<html>
<head>
    <title>Shop Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="/assets/css/tokens.css?v=1">
    <link rel="stylesheet" type="text/css" href="/assets/css/password.css?v=2">
    <link rel="stylesheet" type="text/css" href="/assets/css/earlyAccess.css?v=6">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="/assets/js/earlyAccessSubmit.js?v=4" defer></script>
    <script src="/assets/js/password.js?v=4" defer></script>



    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&family=Cormorant:ital,wght@0,300..700;1,300..700&family=Geist:wght@100..900&family=Hind:wght@300;400;500;600;700&family=La+Belle+Aurore&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Outfit:wght@100..900&family=Yantramanav:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="screen">
        <!-- <img src="/assets/images/HomePageLogo.JPG" id="Logo"/> -->
         <img src="/assets/images/logoBlack.png?v=3" id="Logo"/>
        <form action="/pages/password.php" method="POST">
            <img src="/assets/images/cursorBlack.png?v=3" id="cursor"/>
            <input type="password" id="password" name="password" required>

            <!-- <button type="submit">Login</button> -->
            <?php if (!empty($error_message)) : ?>
                <p class="error"><?php echo $error_message; ?></p>
            <?php endif; ?>
             <div class="getEarlyAccess">
                <h2 id="earlyAccessToggle">E-LIST</h2>
            </div>
        </form>
    </div>

    <?php include __DIR__ . '/../includes/early-access.php'; ?>
</body>
</html>
