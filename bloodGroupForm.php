<html>

<head>
    <title>Blood Group Form</title>
</head>

<body>
    <form method="post" action="">
        <fieldset>
            <legend>Blood Group</legend>
            <select name="bloodGroup">
                <option value="">Select Blood Group</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
            </select>
            <hr>
            <br>
            <input type="submit" name="submit" value="Submit">
        </fieldset>
    </form>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
    $selected = $_POST['bloodGroup'];

    if (empty($selected)) {
        echo "Please select a blood group.";
    } elseif ($selected === "Select Blood Group") {
        echo "Please select a valid blood group.";
    } else {
        echo "Validation successful. Selected blood group: $selected";
    }
}
?>