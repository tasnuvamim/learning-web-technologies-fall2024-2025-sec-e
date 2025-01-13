function adminRegFormValidate() {
    let adminName = document.getElementsByName('admin_name')[0].value.trim();
    let email = document.getElementsByName('email')[0].value.trim();
    let contactNo = document.getElementsByName('contact_no')[0].value.trim();
    let username = document.getElementsByName('username')[0].value.trim();
    let password = document.getElementsByName('password')[0].value.trim();

    if (!adminName || !email || !contactNo || !username || !password) {
        alert("Please fill up all the fields");
        return false; 
    }

    let admin = {
        'admin_name': adminName,
        'email': email,
        'contact_no': contactNo,
        'username': username,
        'password': password
    };

    let adminData = JSON.stringify(admin);

    let xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../controller/adminRegCheck.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('adminData=' + encodeURIComponent(adminData));
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            window.location.replace("../view/adminLogin.html");
        }
    };

    return false; 
}
