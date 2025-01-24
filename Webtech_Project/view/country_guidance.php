<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Country-Based Guidance</title>
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
            text-align: center;
        }
        h1 {
            color: #4a794a;
            margin-bottom: 20px;
        }
        select, button {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin: 10px 0;
        }
        button {
            background-color: #4a794a;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: #376234;
        }
        .guidance {
            margin-top: 20px;
            padding: 15px;
            background: #e9f5e9;
            border: 1px solid #4a794a;
            border-radius: 4px;
            display: none;
        }
        .download-link {
            display: block;
            margin-top: 10px;
            text-decoration: none;
            color: #ffffff;
            background-color: #fa5e5e;
            padding: 10px 20px;
            border-radius: 5px;
        }
        .download-link:hover {
            background-color: #c04444;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Country-Based Guidance</h1>
        <select id="country" required>
            <option value="">-- Select a Country --</option>
            <option value="bangladesh">Bangladesh</option>
            <option value="india">India</option>
            <option value="uk">United Kingdom</option>
            <option value="usa">United States</option>
            <option value="canada">Canada</option>
        </select>
        <button type="button" onclick="showGuidance()">Show Guidance</button>
        <div class="guidance" id="guidanceSection">
            <p id="guidanceText"></p>
            <a id="downloadLink" class="download-link" href="#" download>Download Guidance</a>
        </div>
    </div>

    <script>
        function showGuidance() {
            const country = document.getElementById('country').value;

            if (!country) {
                alert('Please select a country.');
                return;
            }

            const data = { country: country };

            // Create an XMLHttpRequest to send the selected country to the server
            const xhr = new XMLHttpRequest();
            xhr.open('POST', '../controller/CountryController.php', true);
            xhr.setRequestHeader('Content-Type', 'application/json');

            xhr.onload = function () {
                const response = JSON.parse(xhr.responseText);

                if (response.status === 'success') {
                    const guidanceSection = document.getElementById('guidanceSection');
                    const guidanceText = document.getElementById('guidanceText');
                    const downloadLink = document.getElementById('downloadLink');

                    guidanceText.textContent = response.message;
                    downloadLink.href = response.file;
                    downloadLink.textContent = `Download Guidance for ${country.charAt(0).toUpperCase() + country.slice(1)}`;
                    guidanceSection.style.display = 'block';
                } else {
                    alert(response.message);
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
