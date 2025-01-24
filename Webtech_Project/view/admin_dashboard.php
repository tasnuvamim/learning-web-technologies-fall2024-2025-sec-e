<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: 'Roboto', Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
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
        .logout-btn {
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
        .logout-btn:hover {
            background: #c72535;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Admin Dashboard</h1>
        <ul>
            <li><a href="../../abid/view_application.php">View Applications</a></li>
            <li><a href="../../abid/update_status.php">Update Status</a></li>
            <li><a href="document_review.php">Document Review</a></li>
            <li><a href="search_application.php">Search Application</a></li>
            <li><a href="../../abid/payment_status.php">Payment Status</a></li>
        </ul>
        <a href="../../shovan/controller/logout.php" class="logout-btn">Logout</a>
    </div>
</body>
</html>
