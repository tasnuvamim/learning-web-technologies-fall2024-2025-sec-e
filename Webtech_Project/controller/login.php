<?php
require_once('../model/Database.php');

// Function to handle user login
function loginUser($email, $password) {
    $conn = getConnection(); // Using the connection function from the first code
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            if (password_verify($password, $user['password'])) {
                mysqli_stmt_close($stmt);
                mysqli_close($conn);
                return $user; // Return the user data for further processing
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
    return null; // Return null if login fails
}

// Main logic for handling the POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = loginUser($email, $password);

    if ($user) {
        // Start session and set session variables
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['name'] = $user['name'];

        // Redirect based on user role
        if ($user['role'] === 'admin') {
            header("Location: ../view/admin_dashboard.php");
        } else {
            header("Location: ../view/user_dashboard.php");
        }
        exit();
    } else {
        // Invalid login credentials
        header("Location: ../view/login_form.php?error=Invalid%20email%20or%20password");
        exit();
    }
}
?>
