<?php
require_once('../model/PaymentStatusModel.php');

class PaymentStatusController 
{
    private $model;

    public function __construct() 
    {
        $this->model = new PaymentStatusModel();
    }

    public function handleRequest() 
    {
        $applicationId = $_GET['application_id'] ?? null;

        // Handle GET request for fetching payments
        $payments = [];
        $result = $this->model->fetchPayments($applicationId);
        if ($result && $result->num_rows > 0) 
        {
            while ($row = $result->fetch_assoc()) 
            {
                $payments[] = $row;
            }
        }

        // Handle POST request to update payment status
        if ($_SERVER['REQUEST_METHOD'] === 'POST') 
        {
            $applicationId = $_POST['application_id'] ?? null;
            $status = $_POST['payment_status'] ?? null;

            if ($applicationId && $status) 
            {
                if ($this->model->updatePaymentStatus($applicationId, $status)) 
                {
                    echo "<script>alert('Payment status updated successfully!'); window.location.href = 'payment_status.php';</script>";
                } 
                else 
                {
                    echo "<script>alert('Error saving payment status.');</script>";
                }
            } 
            else 
            {
                echo "<script>alert('Error: Application ID and status are required.');</script>";
            }
        }

        return $payments;
    }
}
