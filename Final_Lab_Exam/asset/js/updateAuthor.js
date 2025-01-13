function authorNameValidate() {
    let authorName = document.getElementsByName('author_name')[0].value.trim();
    if (authorName === '') {
        document.getElementById('msg').innerHTML = "Author name cannot be empty!";
    } else {
        document.getElementById('msg').innerHTML = "";
    }
    document.getElementById('msg').style.color = 'red';
}

function contactNoValidate() {
    let contactNo = document.getElementsByName('contact_no')[0].value.trim();
    if (contactNo === '' || !/^\d{10}$/.test(contactNo)) {
        document.getElementById('msg').innerHTML = "Contact number must be a valid 10-digit number!";
    } else {
        document.getElementById('msg').innerHTML = "";
    }
    document.getElementById('msg').style.color = 'red';
}

function passwordValidate() {
    let password = document.getElementsByName('password')[0].value.trim();
    if (password === '') {
        document.getElementById('msg').innerHTML = "Password cannot be empty!";
    } else {
        document.getElementById('msg').innerHTML = "";
    }
    document.getElementById('msg').style.color = 'red';
}

function updateAuthorAjax() {
    let authorName = document.getElementsByName('author_name')[0].value.trim();
    let contactNo = document.getElementsByName('contact_no')[0].value.trim();
    let username = document.getElementsByName('username')[0].value.trim();
    let password = document.getElementsByName('password')[0].value.trim();

    if (!authorName || !contactNo || !username || !password) {
        alert("Please fill in all fields!");
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
    xhttp.open('POST', '../controller/updateAuthor.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('authorData=' + authorJSON);
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            window.location.replace("../view/authorlist.php");
        }
    };

    return false;
}
