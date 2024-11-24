<html>

<head>
    <title>Email Validation</title>
</head>

<body>
    <form method="post" action="">
        <fieldset>
            <legend>EMAIL</legend>
            <input type="text" name="email">
            <br>
            <hr>
            <input type="submit" name="submit" value="Submit">
        </fieldset>
    </form>
</body>

</html>

<?php

if (isset($_POST['submit'])) {
    $emailInput = $_POST['email']; 

    if ($emailInput == null) {
        echo "Please enter your email!";
        exit;
    }

    if (strpos($emailInput, ' ') !== false || !isValidCharacters($emailInput)) {
        echo "Wrong email format: Can not use spaces or invalid characters.";
        exit;
    }

    if (strpos($emailInput, '@') !== false) {
        $emailParts = explode('@', $emailInput);

        if (count($emailParts) === 2) {
            $domainPart = $emailParts[1];

            if (strpos($domainPart, '.') === false) {
                echo "Wrong email format: Missing '.' in the domain part.";
            }

            $domainSections = explode('.', $domainPart);

            if (count($domainSections) > 1 && validLastDomain($domainSections[1])) {
                echo "Your email is in the correct format";
            } else {
                echo "Invalid provider or domain. You can only use: .com, .edu and .in";
            }
        } else {
            echo "Wrong email format: Missing domain.";
        }
    } else {
        echo "Wrong email format: Missing '@'.";
    }
}

function isValidCharacters($input) {
    $allowedCharacters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890@.-";
    for ($i = 0; $i < strlen($input); $i++) {
        if (strpos($allowedCharacters, $input[$i]) === false) {
            return false;
        }
    }
    return true;
}

function validLastDomain($suffix) {
    $validLastDomains = array("com", "in", "edu");
    for ($i = 0; $i < count($validLastDomains); $i++) {
        if ($suffix == $validLastDomains[$i]) {
            return true;
        }
    }
    return false;
}


?>
