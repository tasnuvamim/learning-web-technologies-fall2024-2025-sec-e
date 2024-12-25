<?php
    session_start();
    if(!isset($_COOKIE['status'])){
        header('location: login.html'); 
    }

    require_once '../model/userModel.php'; 

    $id = $_REQUEST['id']; 

    if (deleteUser($id)) {
        header("Location: ../view/userlist.php"); 
    } else {
        echo "Error deleting record.";
    }
?>
