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
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $gender = $_POST['gender'];
    $number = $_POST['number'];
    $address = $_POST['address'];
    $email = $_POST['mail'];
    $password = $_POST['pass'];

    if (!empty($email) && !empty($password) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Check if the email already exists
        $email_check_query = "SELECT * FROM datatable WHERE mail = '$email'";
        $result = mysqli_query($conn, $email_check_query);
        
        if (mysqli_num_rows($result) > 0) {
            echo "Email already exists!";
        } else {
            // Insert the new user into the database
            $query = "INSERT INTO datatable(first_name, last_name, gender, number, address, mail, pass) 
                      VALUES ('$firstname', '$lastname', '$gender', '$number', '$address', '$email', '$password')";
            
            if (mysqli_query($conn, $query)) {
                header("Location: login.php");
                exit();
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
    } else {
        echo "Please enter valid information!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
</head>
<body>
    <h1>Sign Up</h1>
    <form method="POST">
        <label>First Name:</label><br>
        <input type="text" name="first_name" required><br><br>

        <label>Last Name:</label><br>
        <input type="text" name="last_name" required><br><br>

        <label>Gender:</label><br>
        <input type="text" name="gender" required><br><br>

        <label>Contact Number:</label><br>
        <input type="tel" name="number" required><br><br>

        <label>Address:</label><br>
        <input type="text" name="address" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="mail" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="pass" required><br><br>

        <input type="submit" value="Sign Up">
    </form>

    <p>Already have an account? <a href="login.php">Login here</a></p>
</body>
</html>
