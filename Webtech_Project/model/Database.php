<?php
function getConnection() { // Renamed from dbConnect to getConnection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "passport_portal";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}
?>
