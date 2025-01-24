<?php
require_once '../model/userModel.php';

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['email'], $data['currentPassword'])) {
    $email = $data['email'];
    $currentPassword = $data['currentPassword'];

    if (validateUserPassword($email, $currentPassword)) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid input.']);
}
?>