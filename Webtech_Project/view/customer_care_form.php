<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Care</title>
    <style>
        /* General body styling for consistent layout */
        body {
            font-family: 'Roboto', Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        /* Container for the page content */
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        /* Styling for the page title */
        h1 {
            text-align: center;
            color: #4a794a;
            font-size: 2rem;
            margin-bottom: 20px;
        }
        /* Form element styling for inputs, selects, and buttons */
        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        label {
            font-weight: bold;
        }
        input, select, textarea, button {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        textarea {
            resize: none;
        }
        button {
            background-color: #4a794a;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        button:hover {
            background-color: #376234;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Customer Care</h1>
        <form id="customerCareForm">
            <label for="full_name">Full Name:</label>
            <input type="text" id="full_name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" required>

            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" required>

            <label for="issue_type">Issue Type:</label>
            <select id="issue_type" required>
                <option value="">-- Select an Issue --</option>
                <option value="General">General</option>
                <option value="Technical">Technical</option>
                <option value="Billing">Billing</option>
            </select>

            <label for="description">Description:</label>
            <textarea id="description" rows="5" required></textarea>

            <button type="button" onclick="submitCustomerCare()">Submit</button>
        </form>
    </div>

    <script>
        function submitCustomerCare() {
            const data = {
                full_name: document.getElementById('full_name').value.trim(),
                email: document.getElementById('email').value.trim(),
                phone: document.getElementById('phone').value.trim(),
                issue_type: document.getElementById('issue_type').value,
                description: document.getElementById('description').value.trim()
            };

            if (!data.full_name || !data.email || !data.phone || !data.issue_type || !data.description) {
                alert('Please fill out all fields.');
                return;
            }

            const xhr = new XMLHttpRequest();
            xhr.open('POST', '../controller/CustomerCareController.php', true);
            xhr.setRequestHeader('Content-Type', 'application/json');

            xhr.onload = function () {
                const response = JSON.parse(xhr.responseText);
                if (response.status === 'success') {
                    alert(response.message);
                    window.location.href = 'user_dashboard.php'; // Correct path to User Dashboard
                } else {
                    alert(`Error: ${response.message}`);
                }
            };

            xhr.onerror = function () {
                alert('Network error occurred.');
            };

            xhr.send(JSON.stringify(data));
        }
    </script>
</body>
</html>
