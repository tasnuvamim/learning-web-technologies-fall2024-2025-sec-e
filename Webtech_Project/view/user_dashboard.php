<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <style>
        /* General body styling */
        body {
            font-family: 'Roboto', Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        /* Main container styling */
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #4a794a;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        /* Dashboard options styling */
        ul {
            list-style: none;
            padding: 0;
        }

        li a {
            display: block;
            background: #4a794a;
            color: white;
            padding: 10px;
            border-radius: 4px;
            margin: 5px 0;
            text-decoration: none;
            text-align: center;
            font-size: 1rem;
        }

        li a:hover {
            background: #376234;
        }

        /* Button styling for Profile and Logout */
        .action-btn {
            display: inline-block;
            background: #e63946;
            color: white;
            padding: 10px 20px;
            border-radius: 4px;
            text-decoration: none;
            text-align: center;
            font-size: 1rem;
            margin: 20px auto;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .action-btn:hover {
            background: #c72535;
            transform: translateY(-2px);
        }

        .profile-btn {
            background: #4a794a; /* Green background for the profile button */
        }

        .profile-btn:hover {
            background: #376234; /* Darker green on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>User Dashboard</h1>
        <ul>
            <li><a href="../view/appply_passport.php">Apply for e-Passport</a></li>
            <li><a href="passport_renewal_form.php">Renew Passport</a></li>
            <li><a href="upload_documents.php">Document Upload</a></li>
            <li><a href="payment_form.php">Payment</a></li>
            <li><a href="../controller/check_status.php">Check Status</a></li>
            <li><a href="notifications.php">Notifications</a></li>
            <li><a href="customer_care_form.php">Customer Care</a></li>
        </ul>
        <!-- Profile and Logout buttons -->
        <a href="view_profile.php" class="action-btn profile-btn">View Profile</a>
        <a href="../../shovan/controller/logout.php" class="action-btn">Logout</a>
    </div>
</body>
</html>
