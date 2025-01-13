<?php
session_start();
require_once('../model/adminModel.php');

if (isset($_POST['adminData'])) {
    $admin = $_POST['adminData'];
    $data = json_decode($admin, true);

    if (isset($data['admin_name'], $data['email'], $data['contact_no'], $data['username'], $data['password'])) {
        $status = addAdmin($data['admin_name'], $data['email'], $data['contact_no'], $data['username'], $data['password']);
        //echo "Admin {$data['admin_name']} registered successfully";
    } else {
        echo "Invalid admin data.";
    }
} else {
    echo "No admin data received.";
}
?>
