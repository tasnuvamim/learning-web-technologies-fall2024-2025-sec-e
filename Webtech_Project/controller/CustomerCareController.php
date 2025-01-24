<?php
require_once('../model/Database.php');

// Handle POST request to submit the customer care form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    if (!$data) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid input.']);
        exit;
    }

    $conn = getConnection();

    $user_id = 1;  // Example user_id (this should be dynamic based on the logged-in user)
    $full_name = $data['full_name'] ?? '';
    $email = $data['email'] ?? '';
    $phone = $data['phone'] ?? '';
    $issue_type = $data['issue_type'] ?? '';
    $description = $data['description'] ?? '';

    try {
        $stmt = $conn->prepare("INSERT INTO customer_care (user_id, full_name, email, phone, issue_type, description) 
                                VALUES (?, ?, ?, ?, ?, ?)");

        $stmt->bind_param('isssss', $user_id, $full_name, $email, $phone, $issue_type, $description);

        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'Customer care request submitted successfully!']);
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

// Include the view (displaying the form)
include('../view/customer_care_view.php');
?>
