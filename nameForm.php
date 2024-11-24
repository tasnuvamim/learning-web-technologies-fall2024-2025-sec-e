<html>

<body>
    <form method="post" action="">
        <fieldset>
            <legend>NAME</legend>
            <input type="text" name="name" value="" />
            <br>
            <hr>
            <input type="submit" name="submit" value="Submit" />
        </fieldset>
    </form>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'] ;

    if ($name == null) {
        echo "Please don't leave the name field empty.";
    } else if (strlen($name) < 2 || !(($name[0] >= 'a' && $name[0] <= 'z') || ($name[0] >= 'A' && $name[0] <= 'Z')) || !isValidName($name)) {
        echo "1. Name should be at least 2 characters long <br>";
        echo "2. The first letter should be an alphabet and <br>";
        echo "3. The valid characters are a-z, A-Z, . and - only";
    } else {
        echo "Your name is in correct format";
    }
}

function isValidName($name)
{
    $words = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ.- ';

    for ($i = 0; $i < strlen($name); $i++) {
        if (strpos($words, strtolower($name[$i])) === false) {
            return false; 
        }
    }

    return true; 
}


?>