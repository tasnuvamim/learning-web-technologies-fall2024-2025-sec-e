function checkCurrentPassword() {
    const email = document.querySelector("input[name='email']").value;
    const currentPassword = document.getElementById("current_password").value;

    if (!currentPassword) {

        const messageDiv = document.getElementById("message");
        messageDiv.innerHTML = "Current Password is required!";
        messageDiv.style.color = "red";
        return;
    }

    const requestData = JSON.stringify({ email, currentPassword });

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "../controller/checkCurrentPassword.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.onreadystatechange = function () {
        if (this.status === 200 && this.readyState === 4) {
            const response = JSON.parse(xhr.responseText);
            if (response.status === "success") {
                showMessage("Password matches!", false);
            } else {
                showMessage("Incorrect current password.");
            }
        }
    };
    xhr.send(requestData);
}

function validateAndSubmitForm() {
    const currentPassword = document.getElementById("current_password").value;
    const newPassword = document.getElementById("new_password").value;

    if (!currentPassword || !newPassword) {
        showMessage("All fields are required.");
        return false;
    }

    if (newPassword.length < 8) {
        showMessage("New password must be at least 8 characters.");
        return false;
    }

    const requestData = JSON.stringify({ currentPassword, newPassword });
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "../controller/updatePasswordCheck.php", false);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.onreadystatechange = function () {
        if (xhr.status === 200 && xhr.readyState) {
            const response = JSON.parse(xhr.responseText);
            if (response.status === "success") {
                showMessage("Password updated successfully!", false);
            } else {
                showMessage("Failed to update password. Please try again.");
            }
        }
    };
    xhr.send(requestData);

    return false; // Prevent form submission
}

function showMessage(message, isError = true) {
    const messageDiv = document.getElementById("message");
    messageDiv.textContent = message;
    messageDiv.style.color = isError ? "red" : "green";
}
