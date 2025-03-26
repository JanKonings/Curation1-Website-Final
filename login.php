<?php
    session_start();

    // Set the correct password
    $correct_password = "stinkybuttnoah"; // Replace this with your actual password

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
        // If the password is incorrect, show an error message
        echo "Incorrect password. Please try again.";
    }
?>
