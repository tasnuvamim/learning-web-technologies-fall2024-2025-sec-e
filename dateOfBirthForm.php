<html>

<body>
    <form method="post" action="">
        <fieldset>
            <legend>Date Of Birth</legend>
            <table>
                <tr>
                    <td align="center">dd</td>
                    <td align="center">mm</td>
                    <td align="center">yy</td>
                </tr>
                <tr>
                    <td>
                        <input type="number" name="day"> /
                    </td>
                    <td>
                        <input type="number" name="month"> /
                    </td>
                    <td>
                        <input type="number" name="year">
                    </td>
                </tr>
                <tr>
                    <td>
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" name="submit" value="Submit"> </td>
                </tr>
            </table>
        </fieldset>
    </form>

</body>

</html>

<?php

if (isset($_POST["submit"])) {
    $day = $_POST['day'];
    $month = $_POST['month'];
    $year = $_POST['year'];

    if (empty($day) || empty($month) || empty($year)) {
        echo "Please fill all the information";
    } else {
        if ($day < 1 || $day > 31) {
            echo "Day must be between 1-31";
        } else if ($month < 1 || $month > 12) {
            echo "Month must be between 1-12";
        } else if ($year < 1953 || $year > 1998) {
            echo "Year must be between 1953-1998";
        } else {
            echo "Date Of Birth validation successful";
        }
    }
}
?>