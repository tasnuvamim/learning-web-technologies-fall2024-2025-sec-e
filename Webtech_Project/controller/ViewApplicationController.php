<?php
require_once('../model/ViewApplicationModel.php');

class ViewApplicationController 
{
    private $model;

    public function __construct() 
    {
        $this->model = new ViewApplicationModel();
    }

    public function handleRequest() 
    {
        $applicationId = $_GET['application_id'] ?? null;
        $applications = $this->model->getApplications($applicationId);

        include('../view/ViewApplicationView.php');
    }
}
?>
