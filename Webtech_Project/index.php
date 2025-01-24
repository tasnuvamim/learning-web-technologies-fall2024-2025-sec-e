<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - E-Passport Portal</title>
    <style>
        /* General styles */
        body {
            font-family: 'Roboto', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        /* Header styles */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 50px;
            background-color: #4a794a;
            color: white;
        }

        header h1 {
            font-size: 1.8rem;
        }

        nav {
            display: flex;
            gap: 20px;
        }

        nav a {
            text-decoration: none;
            color: white;
            font-size: 1rem;
            padding: 8px 15px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        nav a:hover {
            background-color: #376234;
        }

        /* Main content styles */
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .container h2 {
            color: #4a794a;
            font-size: 1.8rem;
            margin-bottom: 20px;
        }

        .container p {
            font-size: 1rem;
            line-height: 1.6;
            color: #333;
            margin-bottom: 20px;
        }

        /* Footer styles */
        footer {
            margin-top: 50px;
            padding: 10px 20px;
            text-align: center;
            background-color: #4a794a;
            color: white;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <h1>E-Passport Portal</h1>
        <nav>
            <a href="view/login_form.php">Login</a>
            <a href="view/country_guidance.php">Country-Based Guidance</a>
            <a href="faq.php">FAQ</a>
            <a href="contact.php">Contact Us</a>
        </nav>
    </header>

    <!-- Main content -->
    <div class="container">
        <h2>Welcome to the Official E-Passport Portal</h2>
        <p>
            This is the official website for the E-Passport System of Bangladesh. 
            Here, you can apply for a new passport, renew your existing passport, 
            get guidance for various countries, and much more.
        </p>
        <p>
            Please use the navigation bar at the top to access your desired services. 
            For any assistance, feel free to contact our customer care.
        </p>
    </div>

    <!-- Footer -->
    <footer>
        &copy; 2025 E-Passport Portal. All Rights Reserved.
    </footer>
</body>
</html>