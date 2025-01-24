<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Applications</title>
    <link rel="stylesheet" href="style 1.css">
</head>
<body>
    <h1>View Passport Applications</h1>

    <!-- Search Form -->
    <form method="GET" action="">
        <label for="application_id">Search by Application ID:</label>
        <input type="text" name="application_id" id="application_id" placeholder="Enter Application ID">
        <button type="submit">Search</button>
    </form>

    <!-- Applications Table -->
    <div id="applications_table">
        <?php if (count($applications) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Application ID</th>
                        <th>Name</th>
                        <th>Passport Type</th>
                        <th>Delivery Option</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($applications as $application): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($application['application_id']); ?></td>
                            <td><?php echo htmlspecialchars($application['personal_info_first_name'] . ' ' . $application['personal_info_last_name']); ?></td>
                            <td><?php echo htmlspecialchars($application['passport_type']); ?></td>
                            <td><?php echo htmlspecialchars($application['delivery_option']); ?></td>
                            <td><?php echo htmlspecialchars($application['status_value'] ?: 'Not Available'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No applications found!</p>
        <?php endif; ?>
    </div>
    <button onclick="location.href='../sami/dashboard/admin_dashboard.php'" class="logout">Back to Dashboard</button>
</body>
</html>
