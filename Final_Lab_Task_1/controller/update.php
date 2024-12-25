<?php
    session_start();

    require_once '../model/userModel.php'; 
    
    $id = $_POST['id']; 
    $new_username = $_POST['username'];
    $new_password = $_POST['password'];
    $new_email = $_POST['email'];
    
    if (updateUser($id, $new_username, $new_password, $new_email)) {
        header("Location: ../view/userlist.php");
    } else {
        echo "Error updating record.";
    }
    
?>