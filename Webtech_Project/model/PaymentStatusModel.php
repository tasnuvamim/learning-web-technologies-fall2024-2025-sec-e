<?php
require_once('../model/Database.php');

class PaymentStatusModel 
{
    private $conn;

    public function __construct() 
    {
        $this->conn = getConnection();
    }

    public function fetchPayments($applicationId = null) 
    {
        $query = "SELECT p.*, a.personal_info_first_name, a.personal_info_last_name 
                  FROM payment p 
                  LEFT JOIN passport_apply a ON p.application_id = a.application_id";

        if (!empty($applicationId)) 
        {
            $query .= " WHERE p.application_id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param('i', $applicationId);
            $stmt->execute();
            return $stmt->get_result();
        } 
        else 
        {
            return $this->conn->query($query);
        }
    }

    public function updatePaymentStatus($applicationId, $status) 
    {
        $query = "INSERT INTO status (application_id, status_type, status_value) 
                  VALUES (?, 'Payment', ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('is', $applicationId, $status);
        return $stmt->execute();
    }

    public function __destruct() 
    {
        $this->conn->close();
    }
}
