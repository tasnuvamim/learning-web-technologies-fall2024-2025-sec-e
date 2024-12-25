<?php

function getConnection(){
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'webtech');
    return $conn;
}

function login($username, $password){
    $conn = getConnection();
    $sql = "select * from users where username='{$username}' and password='{$password}'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    if ($count ==1 ){
        $conn->close();
        return true;
    }else{
        $conn->close();
        return false;
    }
}


function addUser($username, $password, $email){
    $conn = getConnection();
    $sql = "insert into users VALUES('', '{$username}', '{$password}', '{$email}')";
    if(mysqli_query($conn, $sql)){
        $conn->close();
        return true;
    }else{
        $conn->close();
        return false;
    }
}

function updateUser($id, $username, $password, $email) {
    
    $conn = getConnection(); 
    $sql = "UPDATE users SET 
                username = '$username', 
                email = '$email', 
                password = '$password' 
            WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        $conn->close();
        return true; 
    } else {
        $conn->close();
        return false; 
    }
}

function deleteUser($id) {
    
    $conn = getConnection(); 

    $sql = "DELETE FROM users WHERE id = $id";
    
    if ($conn->query($sql) === TRUE) {
        $conn->close();
        return true; 
    } else {
        $conn->close();
        return false; 
    }
}



?>