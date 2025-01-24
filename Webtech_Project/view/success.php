<?php
session_start();
require_once('../model/Database.php'); // Ensure this path is correct for your database connection
$conn = getConnection();

// Retrieve the application ID from the query string
$application_id = $_GET['application_id'] ?? null;
if (!$application_id) {
    die("No application ID provided.");
}

// Fetch the updated application details
$sql = "SELECT * FROM passport_apply WHERE application_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $application_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    die("No application found with ID: $application_id");
}

$data = $result->fetch_assoc();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Updated Successfully</title>
</head>
<body>
    <h2>Application Updated Successfully!</h2>
    <p><strong>Your Application ID:</strong> <?php echo htmlspecialchars($application_id); ?></p>
    <hr>
    <h3>Updated Data:</h3>
    <h4>Passport Type:</h4>
    <p><?php echo htmlspecialchars($data['passport_type']); ?></p>

    <h4>Personal Information:</h4>
    <ul>
        <li>First Name: <?php echo htmlspecialchars($data['personal_info_first_name']); ?></li>
        <li>Last Name: <?php echo htmlspecialchars($data['personal_info_last_name']); ?></li>
        <li>Date of Birth: <?php echo htmlspecialchars($data['personal_info_dob']); ?></li>
        <li>Gender: <?php echo htmlspecialchars($data['personal_info_gender']); ?></li>
    </ul>
    
    <h4>Present Address:</h4>
    <ul>
        <li>Address Line 1: <?php echo htmlspecialchars($data['present_address_line1']); ?></li>
        <li>Address Line 2: <?php echo htmlspecialchars($data['present_address_line2']); ?></li>
        <li>City: <?php echo htmlspecialchars($data['present_address_city']); ?></li>
        <li>Postal Code: <?php echo htmlspecialchars($data['present_address_postal_code']); ?></li>
        <li>Country: <?php echo htmlspecialchars($data['present_address_country']); ?></li>
    </ul>

    <h4>Permanent Address:</h4>
    <ul>
        <li>Address Line 1: <?php echo htmlspecialchars($data['permanent_address_line1']); ?></li>
        <li>Address Line 2: <?php echo htmlspecialchars($data['permanent_address_line2']); ?></li>
        <li>City: <?php echo htmlspecialchars($data['permanent_address_city']); ?></li>
        <li>Postal Code: <?php echo htmlspecialchars($data['permanent_address_postal_code']); ?></li>
        <li>Country: <?php echo htmlspecialchars($data['permanent_address_country']); ?></li>
    </ul>

    <h4>ID Document:</h4>
    <p><?php echo htmlspecialchars($data['id_document_type']); ?> (<?php echo htmlspecialchars($data['id_document_number']); ?>)</p>

    <h4>Parental Information:</h4>
    <ul>
        <li>Parent's Name: <?php echo htmlspecialchars($data['parental_info_parent_name']); ?></li>
    </ul>

    <?php if ($data['spouse_info_spouse_name']) { ?>
        <h4>Spouse Information:</h4>
        <ul>
            <li>Spouse's Name: <?php echo htmlspecialchars($data['spouse_info_spouse_name']); ?></li>
        </ul>
    <?php } else { ?>
        <p><strong>Spouse Information:</strong> N/A</p>
    <?php } ?>

    <h4>Passport Options:</h4>
    <p><?php echo htmlspecialchars($data['passport_options']); ?></p>
    <h4>Delivery Option:</h4>
    <p><?php echo htmlspecialchars($data['delivery_option']); ?></p>
    <h4>Appointment Date:</h4>
    <p><?php echo htmlspecialchars($data['appointment']); ?></p>
    <hr>

    <a href="user_dashboard.php">Dashboaed</a> <!-- Home Page button -->
</body>
</html>