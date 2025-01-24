<?php
require_once('../model/Database.php');

function addUser($email, $password, $name, $phone, $role) {
    $conn = getConnection(); // Using the getConnection() function from the 1st code

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Create the SQL query
    $sql = "INSERT INTO users (email, password, name, phone, role) VALUES ('{$email}', '{$hashed_password}', '{$name}', '{$phone}', '{$role}')";

    // Execute the query and return the result
    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn); // Close the connection
        return true;
    } else {
        mysqli_close($conn); // Close the connection
        return false;
    }
}

// Main logic for handling the POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $role = $_POST['role'];

    // Validate the password
    if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password)) {
        header("Location: ../views/signup_form.php?error=Invalid%20password%20format");
        exit();
    }

    // Attempt to add the user
    $isUserAdded = addUser($email, $password, $name, $phone, $role);

    if ($isUserAdded) {
        header("Location: ../view/login_form.php"); // Redirect to login form on success
    } else {
        header("Location: ../views/signup_form.php?error=Database%20error"); // Redirect with error message
    }
}
?>
