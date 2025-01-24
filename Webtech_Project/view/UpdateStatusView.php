<?php
require_once('../controller/UpdateStatusController.php');

$controller = new UpdateStatusController();
$application = $controller->handleRequest();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Application Status</title>
    <link rel="stylesheet" href="style 1.css">
</head>
<body>
    <h1>Update Application Status</h1>
    <?php if ($application): ?>
        <form method="POST" action="">
            <input type="hidden" name="application_id" value="<?php echo htmlspecialchars($application['application_id']); ?>">
            <label for="passport_options">Status:</label>
            <select name="passport_options" id="passport_options">
                <option value="Pending" <?php if ($application['passport_options'] === 'Pending') echo 'selected'; ?>>Pending</option>
                <option value="Approved" <?php if ($application['passport_options'] === 'Approved') echo 'selected'; ?>>Approved</option>
                <option value="Rejected" <?php if ($application['passport_options'] === 'Rejected') echo 'selected'; ?>>Rejected</option>
            </select>
            <button type="submit">Update</button>
        </form>
    <?php else: ?>
        <p>Application not found!</p>
    <?php endif; ?>
    <button onclick="location.href='../sami/dashboard/admin_dashboard.php'" class="logout">Back to Dashboard</button>
</body>
</html>
