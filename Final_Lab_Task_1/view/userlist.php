<?php

    session_start();
    if (!isset($_COOKIE['status'])) {
        header('location: login.html');
        exit();
    }

    // Database connection
    $host = 'localhost'; 
    $db_user = 'root'; 
    $db_password = ''; 
    $db_name = 'webtech'; 

    $conn = new mysqli($host, $db_user, $db_password, $db_name);

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT id, username, email, password FROM users";
    $result = $conn->query($sql);
?>
<html>

<head>
    <title>View Users</title>
</head>

<body>
    <h2>User list</h2>
    <a href='home.php'>Back </a> |
    <a href='../controller/logout.php'>logout </a>
    <br><br>

    <table border=1>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
            <th>Action</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['password']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $row['id']; ?>">EDIT</a> |
                        <a href="../controller/delete.php?id=<?php echo $row['id']; ?>">DELETE</a> 
                    </td>
                </tr>
        <?php
            }
        } else {
            echo "<tr><td colspan='5'>No users found</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>

</html>