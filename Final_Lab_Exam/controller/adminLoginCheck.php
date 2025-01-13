<?php
    session_start();
    require_once('../model/adminModel.php');

    if (isset($_POST['loginData'])) {
        $loginData = $_POST['loginData'];
        $data = json_decode($loginData, true);

        if (isset($data['username'], $data['password'])) {
            $isLoggedIn = loginAdmin($data['username'], $data['password']);

            if ($isLoggedIn) {
                $_SESSION['username'] = $data['username'];
                echo "Login successful";
            } else {
                echo "Invalid username or password";
            }
        } else {
            echo "Incomplete login data.";
        }
    } else {
        echo "No login data received.";
    }
?>
