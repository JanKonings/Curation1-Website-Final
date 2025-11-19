<?php
    // 1) If after unlock time → no protection
    // Example: December 1, 2025 at 12:00 PM PST
    // PST = UTC-8 → 20:00 UTC
    $unlock_timestamp = strtotime('2025-12-01 20:00:00 UTC');

    if (time() >= $unlock_timestamp) {
        // OPTIONAL: clear any old session state
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        unset($_SESSION['loggedin'], $_SESSION['LAST_ACTIVITY']);
        return; // stop here → page is public now
    }

    // 2) Before unlock time → normal password protection
    session_start();

    // Set session lifetime to 1 hour
    $timeout_duration = 3600;

    // Check idle timeout
    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > $timeout_duration)) {
        session_unset();
        session_destroy();
        header("Location: password.php");
        exit;
    }

    // Update last activity
    $_SESSION['LAST_ACTIVITY'] = time();

    // Check if the user is logged in
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header("Location: password.php");
        exit;
    }
?>
