<?php
session_start();

// Check if the user is logged in, redirect to login page if not
if (!isset($_SESSION['user_id']) && !isset($_COOKIE['user_id'])) {
    header("Location: login.php");
    exit;
}

// Set session from cookies if available
if (isset($_COOKIE['user_id']) && !isset($_SESSION['user_id'])) {
    $_SESSION['user_id'] = $_COOKIE['user_id'];
    $_SESSION['role'] = $_COOKIE['role'];
    $_SESSION['name'] = $_COOKIE['name'];
}

// Include the view
include('../view/user_dashboard.php');
?>
