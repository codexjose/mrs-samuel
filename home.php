<?php
session_start();
if (!isset($_SESSION['user'])) {
    // If the user is not logged in, redirect to login page
    header('Location: login.php');
    exit();
}

echo "Welcome, User ID: " . $_SESSION['user'];
?>
