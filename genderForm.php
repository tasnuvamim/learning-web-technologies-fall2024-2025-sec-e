<html>

<head>
    <title>Gender Form</title>
</head>

<body>
    <form method="post" action="">
        <fieldset style="width: 200px">
            <legend>GENDER</legend>

            <input type="radio" name="gender" value="male"> Male
            <input type="radio" name="gender" value="female"> Female
            <input type="radio" name="gender" value="other"> Other

            <hr>
            <input type="submit" name="submit" value="Submit">
        </fieldset>
    </form>
</body>

</html>


<?php
if (isset($_POST["submit"])) {

    if (isset($_POST['gender'])) {
        $gender = $_POST['gender'];
    } else {
        $gender = null;
    }

    if (!empty($gender) ) {
        echo "Gender radio input validation successful!";
    }else{
        echo "Please select at least one option";
    }
}
?>