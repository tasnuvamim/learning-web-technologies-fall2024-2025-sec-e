<?php
require_once('../model/Database.php');

class PaymentController {

    public function fetchApplicationDetails($applicationId) {
        $conn = Database::getConnection();

        $stmt = $conn->prepare("
            SELECT personal_info_first_name AS name, personal_info_dob AS dob, passport_type, delivery_option 
            FROM passport_apply 
            WHERE application_id = ?
        ");
        $stmt->bind_param('i', $applicationId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $baseCost = match ($row['passport_type']) {
                'Regular' => 5000,
                'Diplomatic' => 6500,
                'Official' => 8000,
                default => 0
            };
            $deliveryCost = ($row['delivery_option'] === 'Express') ? 1500 : 0;
            $totalCost = $baseCost + $deliveryCost;

            echo json_encode([
                'status' => 'success',
                'data' => [
                    'name' => $row['name'],
                    'dob' => $row['dob'],
                    'passport_type' => $row['passport_type'],
                    'delivery_option' => $row['delivery_option'],
                    'total_cost' => $totalCost
                ]
            ]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Application not found.']);
        }

        $stmt->close();
        $conn->close();
    }

    public function processPayment($paymentData) {
        $conn = Database::getConnection();

        $stmt = $conn->prepare("
            INSERT INTO payment (application_id, user_id, payment_method, card_number, expiry_date, cvv, mobile_provider, 
                                 mobile_account, mobile_password, payable_amount) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");
        $stmt->bind_param(
            'iisssssssd',
            $paymentData['application_id'], 
            $paymentData['user_id'],         
            $paymentData['payment_method'],  
            $paymentData['card_number'],     
            $paymentData['expiry_date'],     
            $paymentData['cvv'],             
            $paymentData['mobile_provider'], 
            $paymentData['mobile_account'],  
            $paymentData['mobile_password'], 
            $paymentData['payable_amount']   
        );

        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'Payment recorded successfully!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to record payment.']);
        }

        $stmt->close();
        $conn->close();
    }
}
?>
