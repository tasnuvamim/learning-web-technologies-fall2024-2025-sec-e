<?php
session_start();
require_once('../model/authorModel.php');

if (isset($_POST['authorData'])) {
    $author = $_POST['authorData'];
    $data = json_decode($author, true); // 

    if (isset($data['author_name'], $data['contact_no'], $data['username'], $data['password'])) {
        $status = addAuthor($data['author_name'], $data['contact_no'], $data['username'], $data['password']);
        if ($status) {
            echo "Author added successfully!";
        } else {
            echo "Failed to add author. Please try again.";
        }
    } else {
        echo "Invalid data submitted.";
    }
} else {
    echo "No data received.";
}
?>
