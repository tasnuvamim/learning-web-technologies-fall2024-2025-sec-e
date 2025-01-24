<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply for Passport</title>
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
            overflow-y: auto;
            max-height: 90vh;
        }
        h2 {
            margin-bottom: 20px;
        }
        h3 {
            margin-top: 20px;
            margin-bottom: 10px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            text-align: left;
        }
        input[type="text"], input[type="date"], select {
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
    </style>
</head>
<body>
    <div class="container">
        <h2>Apply for Passport</h2>
        <form method="POST" action="../controller/apply_passport.php">
            <!-- Passport Type -->
            <label for="passport_type">Passport Type:</label>
            <select id="passport_type" name="passport_type" required>
                <option value="Regular">Regular</option>
                <option value="Diplomatic">Diplomatic</option>
                <option value="Official">Official</option>
            </select><br>

            <!-- Personal Information -->
            <h3>Personal Information:</h3>
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="personal_info[first_name]" required><br>
            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="personal_info[last_name]" required><br>
            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="personal_info[dob]" required><br>
            <label for="gender">Gender:</label>
            <select id="gender" name="personal_info[gender]" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select><br>

            <!-- Present Address -->
            <h3>Present Address:</h3>
            <label for="present_address_line1">Address Line 1:</label>
            <input type="text" id="present_address_line1" name="present_address[address_line1]" required><br>
            <label for="present_address_line2">Address Line 2:</label>
            <input type="text" id="present_address_line2" name="present_address[address_line2]"><br>
            <label for="present_city">City:</label>
            <input type="text" id="present_city" name="present_address[city]" required><br>
            <label for="present_postal_code">Postal Code:</label>
            <input type="text" id="present_postal_code" name="present_address[postal_code]" required><br>
            <label for="present_country">Country:</label>
            <input type="text" id="present_country" name="present_address[country]" required><br>

            <!-- Permanent Address -->
            <h3>Permanent Address:</h3>
            <label for="permanent_address_line1">Address Line 1:</label>
            <input type="text" id="permanent_address_line1" name="permanent_address[address_line1]" required><br>
            <label for="permanent_address_line2">Address Line 2:</label>
            <input type="text" id="permanent_address_line2" name="permanent_address[address_line2]"><br>
            <label for="permanent_city">City:</label>
            <input type="text" id="permanent_city" name="permanent_address[city]" required><br>
            <label for="permanent_postal_code">Postal Code:</label>
            <input type="text" id="permanent_postal_code" name="permanent_address[postal_code]" required><br>
            <label for="permanent_country">Country:</label>
            <input type="text" id="permanent_country" name="permanent_address[country]" required><br>

            <!-- ID Document -->
            <h3>ID Document:</h3>
            <label for="id_document_type">Type:</label>
            <select id="id_document_type" name="id_document_type" required>
                <option value="nid">NID</option>
                <option value="birth_certificate">Birth Certificate</option>
            </select><br>
            <label for="id_document_number">Document Number:</label>
            <input type="text" id="id_document_number" name="id_document_number" required><br>

            <!-- Parental Information -->
            <h3>Parental Information:</h3>
            <label for="parent_name">Parent's Name:</label>
            <input type="text" id="parent_name" name="parental_info[parent_name]" required><br>

            <!-- Spouse Information (Optional) -->
            <h3>Spouse Information (if applicable):</h3>
            <label for="spouse_name">Spouse's Name:</label>
            <input type="text" id="spouse_name" name="spouse_info[spouse_name]"><br>

            <!-- Passport Options -->
            <h3>Passport Options:</h3>
            <label for="passport_options">Choose Validity:</label>
            <select id="passport_options" name="passport_options" required>
                <option value="10 Years Validity">10 Years Validity</option>
                <option value="5 Years Validity">5 Years Validity</option>
            </select><br>

            <!-- Delivery Option -->
            <h3>Delivery Option:</h3>
            <label for="delivery_option">Choose Delivery:</label>
            <select id="delivery_option" name="delivery_option" required>
                <option value="Normal">Normal</option>
                <option value="Express">Express</option>
            </select><br>

            <!-- Appointment -->
            <h3>Appointment:</h3>
            <label for="appointment">Appointment Date:</label>
            <input type="date" id="appointment" name="appointment" required><br>

            <button type="submit">Submit Application</button>
        </form>
    </div>
</body>
</html>