<?php
require_once('../model/Database.php');

session_start();
$conn = getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['application_id'])) {
    $application_id = $conn->real_escape_string($_POST['application_id']);
    header("Location: ../view/user_dashboard.php");
    exit();
} else {
    echo "Invalid request.";
}

$conn->close();
?>
