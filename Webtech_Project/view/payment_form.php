<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <style>
        /* Styling for consistent theme */
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
        input, select, button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
        }
        button {
            background-color: #4a794a;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s, transform 0.2s;
        }
        button:hover {
            background-color: #376234;
            transform: translateY(-2px);
        }
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Payment</h1>

        <!-- Step 1: Enter Application ID -->
        <div id="step1">
            <label for="applicationId">Application ID:</label>
            <input type="text" id="applicationId" required>
            <button onclick="fetchApplicationDetails()">Proceed</button>
        </div>

        <!-- Step 2: Payment Details -->
        <div id="step2" class="hidden">
            <p><strong>Name:</strong> <span id="name"></span></p>
            <p><strong>DOB:</strong> <span id="dob"></span></p>
            <p><strong>Passport Type:</strong> <span id="passportType"></span></p>
            <p><strong>Delivery Option:</strong> <span id="deliveryOption"></span></p>
            <p><strong>Total Cost:</strong> <span id="totalCost"></span></p>

            <label for="paymentMethod">Payment Method:</label>
            <select id="paymentMethod" onchange="toggleFields()">
                <option value="">Select</option>
                <option value="Card">Card</option>
                <option value="Mobile">Mobile Banking</option>
            </select>

            <!-- Card Payment Fields -->
            <div id="cardDetails" class="hidden">
                <label for="cardNumber">Card Number:</label>
                <input type="text" id="cardNumber">

                <label for="expiryDate">Expiry Date:</label>
                <input type="month" id="expiryDate">

                <label for="cvv">CVV:</label>
                <input type="password" id="cvv">
            </div>

            <!-- Mobile Banking Fields -->
            <div id="mobileDetails" class="hidden">
                <label for="mobileProvider">Mobile Banking Provider:</label>
                <select id="mobileProvider">
                    <option value="Bkash">Bkash</option>
                    <option value="Nagad">Nagad</option>
                    <option value="Rocket">Rocket</option>
                </select>

                <label for="mobileAccount">Mobile Account:</label>
                <input type="text" id="mobileAccount">

                <label for="mobilePassword">Mobile Password:</label>
                <input type="password" id="mobilePassword">
            </div>

            <button onclick="submitPayment()">Pay Now</button>
        </div>
    </div>

    <script>
        function fetchApplicationDetails() {
            const applicationId = document.getElementById('applicationId').value.trim();
            if (!applicationId) {
                alert('Please enter the Application ID.');
                return;
            }

            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'paymentController.php', true);
            xhr.setRequestHeader('Content-Type', 'application/json');

            xhr.onload = function () {
                const response = JSON.parse(xhr.responseText);
                if (response.status === 'success') {
                    document.getElementById('step1').classList.add('hidden');
                    document.getElementById('step2').classList.remove('hidden');
                    document.getElementById('name').textContent = response.data.name;
                    document.getElementById('dob').textContent = response.data.dob;
                    document.getElementById('passportType').textContent = response.data.passport_type;
                    document.getElementById('deliveryOption').textContent = response.data.delivery_option;
                    document.getElementById('totalCost').textContent = response.data.total_cost;
                } else {
                    alert(response.message);
                }
            };

            xhr.send(JSON.stringify({ action: 'fetch', application_id: applicationId }));
        }

        function toggleFields() {
            const method = document.getElementById('paymentMethod').value;
            document.getElementById('cardDetails').classList.toggle('hidden', method !== 'Card');
            document.getElementById('mobileDetails').classList.toggle('hidden', method !== 'Mobile');
        }

        function submitPayment() {
            const data = {
                action: 'payment',
                application_id: document.getElementById('applicationId').value,
                user_id: 1, // Static user ID for testing
                payment_method: document.getElementById('paymentMethod').value,
                card_number: document.getElementById('cardNumber').value || null,
                expiry_date: document.getElementById('expiryDate').value || null,
                cvv: document.getElementById('cvv').value || null,
                mobile_provider: document.getElementById('mobileProvider').value || null,
                mobile_account: document.getElementById('mobileAccount').value || null,
                mobile_password: document.getElementById('mobilePassword').value || null,
                payable_amount: parseFloat(document.getElementById('totalCost').textContent)
            };

            const xhr = new XMLHttpRequest();
            xhr.open('POST', '../controller/PaymentController.php', true);
            xhr.setRequestHeader('Content-Type', 'application/json');

            xhr.onload = function () {
                const response = JSON.parse(xhr.responseText);
                if (response.status === 'success') {
                    alert('Payment successful!');
                    window.location.href = 'user_dashboard.php';
                } else {
                    alert(response.message);
                }
            };

            xhr.send(JSON.stringify(data));
        }
    </script>
</body>
</html>
