<?php
    session_start();

    // if (!isset($_COOKIE['status'])) {
    //     header('location: login.php');
    //     exit();
    // }

    require_once '../model/authorModel.php';

    if (isset($_REQUEST['username'])) {
        $username = $_REQUEST['username'];

        if (deleteAuthor($username)) {
            header("Location: ../view/viewAuthors.php");
        } else {
            echo "Error deleting record.";
        }
    } else {
        echo "No username specified.";
    }
?>
