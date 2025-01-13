<?php

function getConnection(){
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'blog');
    return $conn;
}

function addAdmin($name, $email, $contact_no, $username, $password){
    $conn = getConnection();
    $sql = "INSERT INTO admin_info VALUES('{$name}', '{$email}', '{$contact_no}', '{$username}', '{$password}')";
    if(mysqli_query($conn, $sql)){
        return true;
    }else{
        return false;
    }
}

function loginAdmin($username, $password){
    $conn = getConnection();
    $sql = "SELECT * FROM admin_info WHERE username='{$username}' AND password='{$password}'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    if ($count == 1){
        return true;
    }else{
        return false;
    }
}
?>
