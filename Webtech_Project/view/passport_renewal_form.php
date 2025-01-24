<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Renew Passport</title>
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
        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        label {
            font-weight: bold;
        }
        input, button {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
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
        <h1>Renew Passport</h1>
        <form id="renewForm">
            <label for="passport_number">Current Passport Number:</label>
            <input type="text" id="passport_number" required>

            <label for="expiry_date">Expiry Date:</label>
            <input type="date" id="expiry_date" required>

            <label for="reason">Reason for Re-issue:</label>
            <input type="text" id="reason" required>

            <button type="button" onclick="submitRenewForm()">Submit</button>
        </form>
    </div>

    <script>
        function submitRenewForm() {
            const passportNumber = document.getElementById('passport_number').value.trim();
            const expiryDate = document.getElementById('expiry_date').value;
            const reason = document.getElementById('reason').value.trim();

            if (passportNumber === '') {
                alert('Please enter your current passport number.');
                return;
            }
            if (expiryDate === '') {
                alert('Please select the expiry date.');
                return;
            }
            if (reason === '') {
                alert('Please enter the reason for re-issue.');
                return;
            }

            const data = {
                passport_number: passportNumber,
                expiry_date: expiryDate,
                reason: reason
            };

            const xhr = new XMLHttpRequest();
            xhr.open('POST', '../controller/PassportRenewalController.php', true);
            xhr.setRequestHeader('Content-Type', 'application/json');

            xhr.onload = function () {
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    if (response.status === 'success') {
                        alert(response.message); // Success message
                        window.location.href = 'user_dashboard.php'; // Correct path to User Dashboard
                    } else {
                        alert(`Error: ${response.message}`); // Server error message
                    }
                } else {
                    alert('Error submitting renewal request.');
                }
            };

            xhr.onerror = function () {
                alert('Network error occurred.');
            };

            xhr.send(JSON.stringify(data)); // Send data as JSON
        }
    </script>
</body>
</html>
