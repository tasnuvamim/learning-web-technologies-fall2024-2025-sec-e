<?php
require_once('../model/Database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    if (!$data) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid input.']);
        exit;
    }

    $conn = getConnection();

    $user_id = 1; // Replace with logged-in user ID
    $passport_number = $data['passport_number'] ?? '';
    $expiry_date = $data['expiry_date'] ?? '';
    $reason = $data['reason'] ?? '';

    try {
        $stmt = $conn->prepare("INSERT INTO renew_passport (user_id, current_passport_number, expiry_date, reason) 
                                VALUES (?, ?, ?, ?)");

        $stmt->bind_param('isss', $user_id, $passport_number, $expiry_date, $reason);

        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'Renewal request submitted successfully!']);
        } else {
            throw new Exception("Database error: " . $stmt->error);
        }
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    } finally {
        $stmt->close();
        $conn->close();
    }
    exit;
}
?>
