<?php
    session_start();
    // if (!isset($_SESSION['username'])) {
    //     header('location: login.php');
    //     exit();
    // }
?>
<html>

<head>
    <title>Add Author</title>
</head>

<body>
    <h2>Add New Author</h2>
    <a href="adminDashboard.php">Back</a> |
    <a href="../controller/logout.php">Logout</a>
    <br><br>

    <form onsubmit="return validateAuthorForm()">
        Author Name: <input type="text" id="author_name" name="author_name" /><br><br>
        Contact No: <input type="text" id="contact_no" name="contact_no" /><br><br>
        Username: <input type="text" id="username" name="username" /><br><br>
        Password: <input type="password" id="password" name="password" /><br><br>
        <input type="submit" value="Add Author" />
    </form>

    <script src="../asset/js/addAuthor.js"></script>
</body>

</html>
