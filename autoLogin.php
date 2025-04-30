<?php
    session_start();

    // Set the logged-in session
    $_SESSION['loggedin'] = true;  // Mark user as logged in
    $_SESSION['LAST_ACTIVITY'] = time();  // Set session activity time
    header("Location: homepage.php");
    exit;
?>