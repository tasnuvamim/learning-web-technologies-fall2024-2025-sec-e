function validateAuthorForm() {
    let authorName = document.getElementById("author_name").value.trim();
    let contactNo = document.getElementById("contact_no").value.trim();
    let username = document.getElementById("username").value.trim();
    let password = document.getElementById("password").value.trim();

    if (!authorName || !contactNo || !username || !password) {
        alert("All fields are required.");
        return false;
    }


    let authorData = {
        'author_name': authorName,
        'contact_no': contactNo,
        'username': username,
        'password': password
    };

    let authorJSON = JSON.stringify(authorData);

    let xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../controller/addAuthorCheck.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('authorData='+authorJSON);
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            alert(this.responseText);
        }
    };

    return false; 
}
