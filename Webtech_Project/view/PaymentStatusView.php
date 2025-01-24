<?php
require_once('../controller/PaymentStatusController.php');

$controller = new PaymentStatusController();
$payments = $controller->handleRequest();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Status</title>
    <link rel="stylesheet" href="style 1.css">
</head>
<body>
    <h1>Payment Status Management</h1>

    <!-- Search Form -->
    <form method="GET" action="">
        <label for="application_id">Search by Application ID:</label>
        <input type="text" name="application_id" id="application_id" placeholder="Enter Application ID">
        <button type="submit">Search</button>
    </form>

    <!-- Payments Table -->
    <div id="applications_table">
        <?php if (count($payments) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Payment ID</th>
                        <th>Application ID</th>
                        <th>Name</th>
                        <th>Payable Amount</th>
                        <th>Payment Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($payments as $payment): ?>
                        <form method="POST" action="">
                            <input type="hidden" name="application_id" value="<?php echo htmlspecialchars($payment['application_id']); ?>">
                            <tr>
                                <td><?php echo htmlspecialchars($payment['payment_id']); ?></td>
                                <td><?php echo htmlspecialchars($payment['application_id']); ?></td>
                                <td><?php echo htmlspecialchars($payment['personal_info_first_name'] . ' ' . $payment['personal_info_last_name']); ?></td>
                                <td><?php echo htmlspecialchars(number_format($payment['payable_amount'], 2)); ?> TK</td>
                                <td><?php echo htmlspecialchars($payment['payment_date']); ?></td>
                                <td>
                                    <select name="payment_status">
                                        <option value="Pending">Pending</option>
                                        <option value="Paid">Paid</option>
                                        <option value="Canceled">Canceled</option>
                                    </select>
                                </td>
                                <td>
                                    <button type="submit">Save</button>
                                </td>
                            </tr>
                        </form>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No payments found!</p>
        <?php endif; ?>
    </div>
    <button onclick="location.href='../sami/dashboard/admin_dashboard.php'" class="logout">Back to Dashboard</button>
</body>
</html>
