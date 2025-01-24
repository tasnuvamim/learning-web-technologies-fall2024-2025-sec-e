<?php
require_once('../model/Database.php');

class UpdateStatusModel 
{
    private $conn;

    public function __construct() 
    {
        $this->conn = getConnection();
    }

    public function getApplicationById($applicationId) 
    {
        $query = "SELECT * FROM passport_apply WHERE application_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $applicationId);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function updateStatus($applicationId, $status) 
    {
        $query = "UPDATE passport_apply SET passport_options = ? WHERE application_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('si', $status, $applicationId);
        return $stmt->execute();
    }

    public function __destruct() 
    {
        $this->conn->close();
    }
}
