<?php
session_start(); // Start the session

// Check if the user is logged in
if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect the user to the login page or any other desired page
    header('Location: ../index.php'); // Replace 'login.php' with your login page URL
    exit(); // Terminate the script to prevent further execution
} else {
    // If the user is not logged in, redirect them to the login page
    header('Location: ../index.php'); // Replace 'login.php' with your login page URL
    exit(); // Terminate the script to prevent further execution
}
?>
