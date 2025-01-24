<?php
require_once('../model/Database.php');

// Start session to get user_id
session_start();
$conn = getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the posted data
    $user_id = $_SESSION['user_id'];
    $passport_type = $_POST['passport_type'] ?? '';
    
    // Personal Information
    $first_name = $_POST['personal_info']['first_name'] ?? '';
    $last_name = $_POST['personal_info']['last_name'] ?? '';
    $dob = $_POST['personal_info']['dob'] ?? '';
    $gender = $_POST['personal_info']['gender'] ?? '';
    
    // Present Address
    $present_address_line1 = $_POST['present_address']['address_line1'] ?? '';
    $present_address_line2 = $_POST['present_address']['address_line2'] ?? '';
    $present_address_city = $_POST['present_address']['city'] ?? '';
    $present_address_postal_code = $_POST['present_address']['postal_code'] ?? '';
    $present_address_country = $_POST['present_address']['country'] ?? '';
    
    // Permanent Address
    $permanent_address_line1 = $_POST['permanent_address']['address_line1'] ?? '';
    $permanent_address_line2 = $_POST['permanent_address']['address_line2'] ?? '';
    $permanent_address_city = $_POST['permanent_address']['city'] ?? '';
    $permanent_address_postal_code = $_POST['permanent_address']['postal_code'] ?? '';
    $permanent_address_country = $_POST['permanent_address']['country'] ?? '';
    
    // ID Document
    $id_document_type = $_POST['id_document_type'] ?? '';
    $id_document_number = $_POST['id_document_number'] ?? '';
    
    // Parental Information
    $parent_name = $_POST['parental_info']['parent_name'] ?? '';
    
    // Spouse Information (optional)
    $spouse_name = $_POST['spouse_info']['spouse_name'] ?? null;
    
    // Passport Options
    $passport_options = $_POST['passport_options'] ?? '';
    
    // Delivery Option
    $delivery_option = $_POST['delivery_option'] ?? '';
    
    // Appointment Date
    $appointment = $_POST['appointment'] ?? '';
    
    // Generate a unique 10-digit application ID
    $application_id = mt_rand(1000000000, 9999999999);

    // Create SQL query for inserting application data
    $sql = "INSERT INTO passport_apply 
            (user_id, application_id, passport_type, personal_info_first_name, personal_info_last_name, 
            personal_info_dob, personal_info_gender, present_address_line1, present_address_line2, 
            present_address_city, present_address_postal_code, present_address_country, 
            permanent_address_line1, permanent_address_line2, permanent_address_city, 
            permanent_address_postal_code, permanent_address_country, id_document_type, 
            id_document_number, parental_info_parent_name, spouse_info_spouse_name, 
            passport_options, delivery_option, appointment) 
            VALUES 
            (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare statement for security
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        'iissssssssssssssssssssss',
        $user_id, $application_id, $passport_type,
        $first_name, $last_name, $dob, $gender,
        $present_address_line1, $present_address_line2, $present_address_city, $present_address_postal_code, $present_address_country,
        $permanent_address_line1, $permanent_address_line2, $permanent_address_city, $permanent_address_postal_code, $permanent_address_country,
        $id_document_type, $id_document_number, $parent_name, $spouse_name,
        $passport_options, $delivery_option, $appointment
    );

    if ($stmt->execute()) {
        // Display application details and forms for editing and saving
        echo "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Application Details</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f5f5f5;
                    color: #333;
                    margin: 0;
                    padding: 0;
                }
                .container {
                    max-width: 800px;
                    margin: 20px auto;
                    background: #fff;
                    border-radius: 8px;
                    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                    padding: 20px;
                }
                h2, h3, h4 {
                    color: #007bff;
                }
                ul {
                    list-style: none;
                    padding: 0;
                }
                ul li {
                    padding: 5px 0;
                }
                button {
                    display: inline-block;
                    margin: 10px 0;
                    padding: 10px 20px;
                    background-color: #007bff;
                    color: #fff;
                    border: none;
                    border-radius: 5px;
                    cursor: pointer;
                }
                button:hover {
                    background-color: #0056b3;
                }
                .form-container {
                    margin-top: 20px;
                    display: flex;
                    gap: 10px;
                }
                a {
                    color: #007bff;
                    text-decoration: none;
                }
            </style>
        </head>
        <body>
            <div class='container'>
                <h2>Application Submitted Successfully!</h2>
                <p><strong>Your Application ID:</strong> $application_id</p>
                <hr>
                <h3>Submitted Data:</h3>
                <h4>Passport Type:</h4>
                <p>" . htmlspecialchars($passport_type) . "</p>

                <h4>Personal Information:</h4>
                <ul>
                    <li>First Name: " . htmlspecialchars($first_name) . "</li>
                    <li>Last Name: " . htmlspecialchars($last_name) . "</li>
                    <li>Date of Birth: " . htmlspecialchars($dob) . "</li>
                    <li>Gender: " . htmlspecialchars($gender) . "</li>
                </ul>
                
                <h4>Present Address:</h4>
                <ul>
                    <li>Address Line 1: " . htmlspecialchars($present_address_line1) . "</li>
                    <li>Address Line 2: " . htmlspecialchars($present_address_line2) . "</li>
                    <li>City: " . htmlspecialchars($present_address_city) . "</li>
                    <li>Postal Code: " . htmlspecialchars($present_address_postal_code) . "</li>
                    <li>Country: " . htmlspecialchars($present_address_country) . "</li>
                </ul>

                <h4>Permanent Address:</h4>
                <ul>
                    <li>Address Line 1: " . htmlspecialchars($permanent_address_line1) . "</li>
                    <li>Address Line 2: " . htmlspecialchars($permanent_address_line2) . "</li>
                    <li>City: " . htmlspecialchars($permanent_address_city) . "</li>
                    <li>Postal Code: " . htmlspecialchars($permanent_address_postal_code) . "</li>
                    <li>Country: " . htmlspecialchars($permanent_address_country) . "</li>
                </ul>

                <h4>ID Document:</h4>
                <p>" . htmlspecialchars($id_document_type) . " (" . htmlspecialchars($id_document_number) . ")</p>

                <h4>Parental Information:</h4>
                <ul>
                    <li>Parent's Name: " . htmlspecialchars($parent_name) . "</li>
                </ul>";

        if ($spouse_name) {
            echo "
                <h4>Spouse Information:</h4>
                <ul>
                    <li>Spouse's Name: " . htmlspecialchars($spouse_name) . "</li>
                </ul>";
        } else {
            echo "<p><strong>Spouse Information:</strong> N/A</p>";
        }

        echo "
                <h4>Passport Options:</h4>
                <p>" . htmlspecialchars($passport_options) . "</p>
                <h4>Delivery Option:</h4>
                <p>" . htmlspecialchars($delivery_option) . "</p>
                <h4>Appointment Date:</h4>
                <p>" . htmlspecialchars($appointment) . "</p>
                <hr>

                <div class='form-container'>
                    <form action='edit_application.php' method='GET'>
                        <input type='hidden' name='application_id' value='$application_id'>
                        <button type='submit'>Edit Application</button>
                    </form>
                    <form action='save_application.php' method='POST'>
                        <input type='hidden' name='application_id' value='$application_id'>
                        <button type='submit'>Save Application</button>
                    </form>
                </div>
            </div>
        </body>
        </html>";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
