<?php
// Start the session
session_start();

// Check if the user is an admin, either via session or cookies
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    if (isset($_COOKIE['user_id']) && isset($_COOKIE['role']) && $_COOKIE['role'] === 'admin') {
        $_SESSION['user_id'] = $_COOKIE['user_id'];
        $_SESSION['role'] = $_COOKIE['role'];
        $_SESSION['name'] = $_COOKIE['name'];
    } else {
        // Redirect to login page if not an admin
        header("Location: ../controller/login.php");
        exit;
    }
}

// Include the view
include('../view/admin_dashboard.php');
?>
