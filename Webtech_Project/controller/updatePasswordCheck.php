<?php
require_once '../model/userModel.php';

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['currentPassword'], $data['newPassword'])) {
    session_start();
    $email = $_SESSION['email'];
    $currentPassword = $data['currentPassword'];
    $newPassword = $data['newPassword'];

    if (updateUserPassword($email, $currentPassword, $newPassword)) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid input.']);
}

?>