<?php
    session_start();

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
        header("Location: homepage.php");
        exit;
    }

    // Set the correct password
    $correct_password = "stinkybuttnoah"; // Replace this with your actual password

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

                // Redirect to the homepage
                header("Location: homepage.php");
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
    <link rel="stylesheet" type="text/css" href="CSS/password.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="Javascript/script.js" defer></script>
</head>
<body>
    <div class="screen">
        <img src="Images/HomePageLogo.JPG" id="Logo"/>
        <form action="index.php" method="POST">
            <img src="Images/cursor.png" id="cursor"/>
            <input type="password" id="password" name="password" required>
            <!-- <button type="submit">Login</button> -->
            <?php if (!empty($error_message)) : ?>
                <p class="error"><?php echo $error_message; ?></p>
            <?php endif; ?>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const passwordInput = document.getElementById('password');

            document.addEventListener('click', function() {
                passwordInput.focus();
                const errorElement = document.querySelector('.error');
                if (errorElement) {
                    errorElement.textContent = '';
                }
            });
                        
            // Adjust input width as user types
            passwordInput.addEventListener('input', function() {
                this.style.width = Math.max(this.value.length, 1) + "ch";
                const errorElement = document.querySelector('.error');
                if (errorElement) {
                    errorElement.textContent = '';
                }
            });

            const cursorImg = document.getElementById('cursor');
            const cursorBlink = setInterval(function() {
                if (!passwordInput.matches(':focus') && passwordInput.value === '') {
                    cursorImg.style.visibility = cursorImg.style.visibility === 'hidden' ? 'visible' : 'hidden';
                }
            }, 500);

            passwordInput.addEventListener('focus', function() {
                cursorImg.style.visibility = 'hidden'; // Use visibility instead of display

            });

            if (!/Mobi|Android|iPad|Tablet|Touch/i.test(navigator.userAgent)) {
                passwordInput.focus();
            }
            
        });
    </script>
</body>
</html>
