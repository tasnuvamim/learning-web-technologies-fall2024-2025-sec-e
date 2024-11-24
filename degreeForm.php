<html>
<head>
    <title>Degree Form</title>
</head>
<body>
    <form method="post" action = "">
        <fieldset>
            <legend>Degree</legend>
            <input type="checkbox" name="degree[]" value="SSC"> SSC
            <input type="checkbox" name="degree[]" value="HSC"> HSC
            <input type="checkbox" name="degree[]" value="BSc"> BSc
            <input type="checkbox" name="degree[]" value="MSc"> MSc
            <hr>
            <input type="submit" name="submit" value="Submit">
        </fieldset>
    </form>
</body>
</html>

<?php
    if (isset($_POST["submit"])) {

        if (isset($_POST['degree'])) {
            $degree = $_POST['degree'];
        } else {
            $degree = null;
        }
    
        if (!empty($degree) && count($degree) >= 2) {  
            echo "Degree checkbox validation successful!";
        }else{
            echo "Please select at least 2 options";
        }
    }
?>


