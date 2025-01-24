<?php
session_start();

require_once('../model/Database.php');

$conn = getConnection();  

$status_message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $application_id = $_POST['application_id'];

    // Validate application ID
    if (empty($application_id) || !ctype_digit($application_id) || strlen($application_id) != 10) {
        $status_message = "Invalid Application ID. Please enter a 10-digit number.";
    } else {
        // Query the database using prepared statements
        $sql = "SELECT * FROM passport_apply WHERE application_id = ?";
        $stmt = $conn->prepare($sql);

        // Check if the statement preparation failed
        if (!$stmt) {
            die("SQL prepare failed: " . $conn->error);
        }

        $stmt->bind_param("s", $application_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $application = $result->fetch_assoc();
            $status_message = "Application ID: " . htmlspecialchars($application['application_id']) . "<br>" .
                              "Name: " . htmlspecialchars($application['personal_info_first_name']) . " " . htmlspecialchars($application['personal_info_last_name']) . "<br>" .
                              "Status: " . htmlspecialchars($application['status']) . "<br>" .
                              "Passport Type: " . htmlspecialchars($application['passport_type']);
        } else {
            $status_message = "No application found for the provided Application ID.";
        }

        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Application Status</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            text-align: left;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        p {
            margin-top: 10px;
        }
        .error {
            color: red;
        }
        .success {
            color: green;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Check Application Status</h2>
        <form method="POST" action="check_status.php">
            <label for="application_id">Application ID:</label>
            <input type="text" id="application_id" name="application_id" required><br>
            <button type="submit">Check Status</button>
        </form>

        <?php if ($status_message) { echo "<p>$status_message</p>"; } ?>
    </div>
</body>
</html>