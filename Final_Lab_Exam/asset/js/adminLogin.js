function adminLoginValidate() {
    let username = document.getElementsByName('username')[0].value.trim();
    let password = document.getElementsByName('password')[0].value.trim();

    if (!username || !password) {
        alert("Please fill up all the fields");
        return false; 
    }

    let loginData = JSON.stringify({
        'username': username,
        'password': password
    });

    let xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../controller/adminLoginCheck.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('loginData=' + encodeURIComponent(loginData));
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            if (this.responseText.includes("Login successful")) {
                alert(this.responseText);
                window.location.href = "../view/adminDashboard.php"; 
            } else {
                alert(this.responseText); 
            }
        }
    };

    return false; 
}
