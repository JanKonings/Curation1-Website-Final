<?php
    session_start();

    // Set session lifetime to 1 hour
    $timeout_duration = 3600;

    // Check if the session is set
    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > $timeout_duration)) {
        session_unset();
        session_destroy();
        header("Location: password.php");
        exit;
    }

    // Update last activity time
    $_SESSION['LAST_ACTIVITY'] = time();

    // Check if the user is logged in
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header("Location: password.php");
        exit;
    }
?>