<?php
require_once('../model/Database.php');

class ViewApplicationModel {
    private $conn;

    public function __construct() {
        $this->conn = getConnection();
    }

    public function getApplications($applicationId = null) {
        $applications = [];
        $query = "SELECT a.application_id, a.personal_info_first_name, a.personal_info_last_name, 
                         a.passport_type, a.delivery_option, s.status_value 
                  FROM passport_apply a 
                  LEFT JOIN status s ON a.application_id = s.application_id 
                  ORDER BY a.application_id DESC";

        if ($applicationId) {
            $query .= " WHERE a.application_id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param('i', $applicationId);
            $stmt->execute();
            $result = $stmt->get_result();
        } else {
            $result = $this->conn->query($query);
        }

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $applications[] = $row;
            }
        }

        return $applications;
    }

    public function __destruct() {
        $this->conn->close();
    }
}
?>
