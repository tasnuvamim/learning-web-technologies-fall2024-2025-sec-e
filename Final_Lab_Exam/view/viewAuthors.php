<?php
    session_start();
    require_once '../model/authorModel.php';

    // // Ensure the admin is logged in
    // if (!isset($_SESSION['username'])) {
    //     header('location: login.php');
    //     exit();
    // }

    $conn = getAuthorConnection();

    if (!$conn) {
        die("Connection failed.");
    }

    $sql = "SELECT * FROM authors";
    $result = mysqli_query($conn, $sql);
?>
<html>

<head>
    <title>View Authors</title>
</head>

<body>
    <h2>Author List</h2>
    <a href='adminDashboard.php'>Back</a> |
    <a href='../controller/logout.php'>Logout</a>
    <br><br>

    <table border=1>
        <tr>
            <th>ID</th>
            <th>Author Name</th>
            <th>Contact No</th>
            <th>Username</th>
            <th>Password</th>
            <th>Action</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['author_name']; ?></td>
                    <td><?php echo $row['contact_no']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['password']; ?></td>
                    <td>
                        <a href="editAuthor.php?username=<?php echo $row['username']; ?>">EDIT</a> |
                        <a href="../controller/deleteAuthor.php?username=<?php echo $row['username']; ?>">DELETE</a>
                    </td>
                </tr>
        <?php
            }
        } else {
            echo "<tr><td colspan='6'>No authors found</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>

</html>
