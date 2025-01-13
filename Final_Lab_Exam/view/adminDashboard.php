<?php
    // session_start();
    // if (!isset($_SESSION['username'])) {
    //     header("Location: login.php");
    //     exit();
    // }
?>

<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Welcome, Admin</h1>
    <ul>
        <li><a href="viewAuthors.php">View All Authors</a></li>
        <li><a href="addAuthor.php">Add New Authors</a></li>
        <li><a href="searchUsers.php">Search Users</a></li>
        <li><a href="../controller/logout.php">Logout</a></li>
    </ul>
</body>
</html>