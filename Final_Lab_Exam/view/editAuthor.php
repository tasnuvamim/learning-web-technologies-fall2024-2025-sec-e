<?php
session_start();
require_once '../model/authorModel.php';

// if (!isset($_SESSION['username'])) {
//     header('location: login.php');
//     exit();
// }

if (isset($_REQUEST['username'])) {
    $username = $_REQUEST['username'];
    $author = getAuthorByUsername($username);

    if ($author) {
        $authorName = $author['author_name'];
        $contactNo = $author['contact_no'];
        $password = $author['password'];
    } else {
        echo "Author not found!";
        exit();
    }
}
?>
<html>
<head>
    <title>Edit Author</title>
</head>
<body>
    <h2>Edit Author</h2>
    <a href='adminDashboard.php'>Back</a> |
    <a href='../controller/logout.php'>Logout</a>
    <br><br>
    <form method="post" action="" onsubmit="return updateAuthorAjax()">
        <input type="hidden" name="username" value="<?= $username ?>">

        Author Name: <input type="text" name="author_name" value="<?= $authorName ?>" onblur="authorNameValidate()" /><br><br>
        Contact No: <input type="text" name="contact_no" value="<?= $contactNo ?>" onblur="contactNoValidate()" /><br><br>
        Password: <input type="password" name="password" value="<?= $password ?>" onblur="passwordValidate()" /><br><br>
        <input type="submit" value="Update Author" />
    </form>
    
    <script src="../asset/js/updateAuthor.js"></script>
</body>
</html>
