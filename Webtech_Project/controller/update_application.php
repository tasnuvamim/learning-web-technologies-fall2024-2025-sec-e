<?php
session_start();
require_once('../model/Database.php');
// Ensure this path is correct for your database connection
$conn = getConnection();

// Check if the request is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the application ID
    $application_id = $_POST['application_id'] ?? null;
    if (!$application_id) {
        die("No application ID provided.");
    }

    // Retrieve form inputs
    $passport_type = $_POST['passport_type'] ?? '';
    $first_name = $_POST['personal_info']['first_name'] ?? '';
    $last_name = $_POST['personal_info']['last_name'] ?? '';
    $dob = $_POST['personal_info']['dob'] ?? '';
    $gender = $_POST['personal_info']['gender'] ?? '';
    
    $present_address_line1 = $_POST['present_address']['address_line1'] ?? '';
    $present_address_line2 = $_POST['present_address']['address_line2'] ?? '';
    $present_city = $_POST['present_address']['city'] ?? '';
    $present_postal_code = $_POST['present_address']['postal_code'] ?? '';
    $present_country = $_POST['present_address']['country'] ?? '';
    
    $permanent_address_line1 = $_POST['permanent_address']['address_line1'] ?? '';
    $permanent_address_line2 = $_POST['permanent_address']['address_line2'] ?? '';
    $permanent_city = $_POST['permanent_address']['city'] ?? '';
    $permanent_postal_code = $_POST['permanent_address']['postal_code'] ?? '';
    $permanent_country = $_POST['permanent_address']['country'] ?? '';
    
    $id_document_type = $_POST['id_document_type'] ?? '';
    $id_document_number = $_POST['id_document_number'] ?? '';
    $parent_name = $_POST['parental_info']['parent_name'] ?? '';
    $spouse_name = $_POST['spouse_info']['spouse_name'] ?? null; // Optional field
    $passport_options = $_POST['passport_options'] ?? '';
    $delivery_option = $_POST['delivery_option'] ?? '';
    $appointment = $_POST['appointment'] ?? '';

    // SQL query for updating the application
    $sql = "UPDATE passport_apply SET 
        passport_type = ?, 
        personal_info_first_name = ?, 
        personal_info_last_name = ?, 
        personal_info_dob = ?, 
        personal_info_gender = ?, 
        present_address_line1 = ?, 
        present_address_line2 = ?, 
        present_address_city = ?, 
        present_address_postal_code = ?, 
        present_address_country = ?, 
        permanent_address_line1 = ?, 
        permanent_address_line2 = ?, 
        permanent_address_city = ?, 
        permanent_address_postal_code = ?, 
        permanent_address_country = ?, 
        id_document_type = ?, 
        id_document_number = ?, 
        parental_info_parent_name = ?, 
        spouse_info_spouse_name = ?, 
        passport_options = ?, 
        delivery_option = ?, 
        appointment = ? 
    WHERE application_id = ?";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Check if the statement preparation failed
    if (!$stmt) {
        die("SQL prepare failed: " . $conn->error);
    }

    // Bind the parameters
    $stmt->bind_param(
        "sssssssssssssssssssssss", 
        $passport_type, $first_name, $last_name, $dob, $gender, 
        $present_address_line1, $present_address_line2, $present_city, $present_postal_code, $present_country,
        $permanent_address_line1, $permanent_address_line2, $permanent_city, $permanent_postal_code, $permanent_country, 
        $id_document_type, $id_document_number, $parent_name, $spouse_name, 
        $passport_options, $delivery_option, $appointment, $application_id
    );

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to a success page
        header("Location: ../view/success.php?application_id=$application_id");
        exit();
    } else {
        // Handle errors
        die("Error updating application: " . $stmt->error);
    }

    // Close the statement
    $stmt->close();
} else {
    die("Invalid request method.");
}

// Close the database connection
$conn->close();
?>