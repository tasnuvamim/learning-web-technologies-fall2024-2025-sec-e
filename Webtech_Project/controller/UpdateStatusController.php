<?php
require_once('../model/UpdateStatusModel.php');

class UpdateStatusController 
{
    private $model;

    public function __construct() 
    {
        $this->model = new UpdateStatusModel();
    }

    public function handleRequest() 
    {
        if (isset($_GET['application_id'])) 
        {
            $applicationId = $_GET['application_id'];
            $application = $this->model->getApplicationById($applicationId);
            return $application;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') 
        {
            $applicationId = $_POST['application_id'];
            $status = $_POST['passport_options'];

            if ($this->model->updateStatus($applicationId, $status)) 
            {
                echo "<script>alert('Status updated successfully!'); window.location.href = 'update_status.php?application_id=$applicationId';</script>";
            } 
            else 
            {
                echo "<script>alert('Error updating status!');</script>";
            }
        }
    }
}
