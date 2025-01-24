<?php
session_start();
require_once('../model/Database.php');
$conn = getConnection();

$application_id = $_GET['application_id'] ?? null;
if (!$application_id) {
    die("No application ID provided.");
}

$sql = "SELECT * FROM passport_apply WHERE application_id = ?";
$stmt = $conn->prepare($sql);

// Check if the statement preparation failed
if (!$stmt) {
    die("SQL prepare failed: " . $conn->error);
}

$stmt->bind_param("s", $application_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    die("No application found with ID: $application_id");
}

$data = $result->fetch_assoc();

$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Passport Application</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            color: #333;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }
        form {
            width: 80%;
            max-width: 800px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        form h3 {
            margin-top: 20px;
            color: #555;
        }
        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }
        button {
            width: 100%;
            padding: 12px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        button:hover {
            background: #0056b3;
        }
        p {
            text-align: center;
        }
        .container {
            margin: 20px auto;
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Edit Passport Application</h2>
    <p><strong>Application ID:</strong> <?php echo htmlspecialchars($application_id); ?></p>
    <form method="POST" action="../controller/update_application.php">
        <input type="hidden" name="application_id" value="<?php echo htmlspecialchars($application_id); ?>">

        <!-- Passport Type -->
        <label for="passport_type">Passport Type:</label>
        <select id="passport_type" name="passport_type" required>
            <option value="Regular" <?php echo ($data['passport_type'] === 'Regular') ? 'selected' : ''; ?>>Regular</option>
            <option value="Diplomatic" <?php echo ($data['passport_type'] === 'Diplomatic') ? 'selected' : ''; ?>>Diplomatic</option>
            <option value="Official" <?php echo ($data['passport_type'] === 'Official') ? 'selected' : ''; ?>>Official</option>
        </select>

        <!-- Personal Information -->
        <h3>Personal Information</h3>
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="personal_info[first_name]" value="<?php echo htmlspecialchars($data['personal_info_first_name'] ?? ''); ?>" required>
        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="personal_info[last_name]" value="<?php echo htmlspecialchars($data['personal_info_last_name'] ?? ''); ?>" required>
        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="personal_info[dob]" value="<?php echo htmlspecialchars($data['personal_info_dob'] ?? ''); ?>" required>
        <label for="gender">Gender:</label>
        <select id="gender" name="personal_info[gender]" required>
            <option value="male" <?php echo ($data['personal_info_gender'] === 'male') ? 'selected' : ''; ?>>Male</option>
            <option value="female" <?php echo ($data['personal_info_gender'] === 'female') ? 'selected' : ''; ?>>Female</option>
        </select>

        <!-- Present Address -->
        <h3>Present Address</h3>
        <label for="present_address_line1">Address Line 1:</label>
        <input type="text" id="present_address_line1" name="present_address[address_line1]" value="<?php echo htmlspecialchars($data['present_address_line1'] ?? ''); ?>" required>
        <label for="present_address_line2">Address Line 2:</label>
        <input type="text" id="present_address_line2" name="present_address[address_line2]" value="<?php echo htmlspecialchars($data['present_address_line2'] ?? ''); ?>">
        <label for="present_city">City:</label>
        <input type="text" id="present_city" name="present_address[city]" value="<?php echo htmlspecialchars($data['present_address_city'] ?? ''); ?>" required>
        <label for="present_postal_code">Postal Code:</label>
        <input type="text" id="present_postal_code" name="present_address[postal_code]" value="<?php echo htmlspecialchars($data['present_address_postal_code'] ?? ''); ?>" required>
        <label for="present_country">Country:</label>
        <input type="text" id="present_country" name="present_address[country]" value="<?php echo htmlspecialchars($data['present_address_country'] ?? ''); ?>" required>

        <!-- Permanent Address -->
        <h3>Permanent Address</h3>
        <label for="permanent_address_line1">Address Line 1:</label>
        <input type="text" id="permanent_address_line1" name="permanent_address[address_line1]" value="<?php echo htmlspecialchars($data['permanent_address_line1'] ?? ''); ?>" required>
        <label for="permanent_address_line2">Address Line 2:</label>
        <input type="text" id="permanent_address_line2" name="permanent_address[address_line2]" value="<?php echo htmlspecialchars($data['permanent_address_line2'] ?? ''); ?>">
        <label for="permanent_city">City:</label>
        <input type="text" id="permanent_city" name="permanent_address[city]" value="<?php echo htmlspecialchars($data['permanent_address_city'] ?? ''); ?>" required>
        <label for="permanent_postal_code">Postal Code:</label>
        <input type="text" id="permanent_postal_code" name="permanent_address[postal_code]" value="<?php echo htmlspecialchars($data['permanent_address_postal_code'] ?? ''); ?>" required>
        <label for="permanent_country">Country:</label>
        <input type="text" id="permanent_country" name="permanent_address[country]" value="<?php echo htmlspecialchars($data['permanent_address_country'] ?? ''); ?>" required>

        <!-- ID Document -->
        <h3>ID Document</h3>
        <label for="id_document_type">Type:</label>
        <select id="id_document_type" name="id_document_type" required>
            <option value="nid" <?php echo ($data['id_document_type'] === 'nid') ? 'selected' : ''; ?>>NID</option>
            <option value="birth_certificate" <?php echo ($data['id_document_type'] === 'birth_certificate') ? 'selected' : ''; ?>>Birth Certificate</option>
        </select>
        <label for="id_document_number">Document Number:</label>
        <input type="text" id="id_document_number" name="id_document_number" value="<?php echo htmlspecialchars($data['id_document_number'] ?? ''); ?>" required>

        <!-- Passport Options -->
        <h3>Passport Options</h3>
        <label for="passport_options">Choose Validity:</label>
        <select id="passport_options" name="passport_options" required>
            <option value="10 Years Validity" <?php echo ($data['passport_options'] === '10 Years Validity') ? 'selected' : ''; ?>>10 Years Validity</option>
            <option value="5 Years Validity" <?php echo ($data['passport_options'] === '5 Years Validity') ? 'selected' : ''; ?>>5 Years Validity</option>
        </select>

        <!-- Delivery Option -->
        <h3>Delivery Option</h3>
        <label for="delivery_option">Choose Delivery:</label>
        <select id="delivery_option" name="delivery_option" required>
            <option value="Normal" <?php echo ($data['delivery_option'] === 'Normal') ? 'selected' : ''; ?>>Normal</option>
            <option value="Express" <?php echo ($data['delivery_option'] === 'Express') ? 'selected' : ''; ?>>Express</option>
        </select>

        <!-- Submit -->
        <button type="submit">Update Application</button>
    </form>
</body>
</html>

<?php
$conn->close();
?>
