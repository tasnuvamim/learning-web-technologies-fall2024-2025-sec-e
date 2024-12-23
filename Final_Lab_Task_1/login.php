<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['mail'];
    $password = $_POST['pass'];

    if (!empty($email) && !empty($password)) {
        // Check if the email exists in the database
        $query = "SELECT * FROM datatable WHERE mail = '$email'";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            
            // Check if password matches
            if ($user_data['pass'] == $password) {
                $_SESSION['user_id'] = $user_data['id']; // Store user ID in session
                header("Location: index.php");
                exit();
            } else {
                echo "Incorrect password!";
            }
        } else {
            echo "No user found with that email!";
        }
    } else {
        echo "Please fill in both email and password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form method="POST">
        <label>Email:</label><br>
        <input type="email" name="mail" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="pass" required><br><br>

        <input type="submit" value="Login">
    </form>

    <p>Don't have an account? <a href="signup.php">Sign up here</a></p>
</body>
</html>
