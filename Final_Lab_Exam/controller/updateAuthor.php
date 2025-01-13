<?php
session_start();
require_once('../model/authorModel.php');

if (isset($_POST['authorData'])) {
    $author = $_POST['authorData'];
    $data = json_decode($author, true); // Decode as associative array

    if (isset($data['author_name'], $data['contact_no'], $data['username'], $data['password'])) {
        $status = updateAuthor($data['author_name'], $data['contact_no'], $data['username'], $data['password']);
        if ($status) {
            header('Location: ../view/authorlist.php');
        } else {
            echo "Failed to update author.";
        }
    } else {
        echo "Invalid data.";
    }
} else {
    echo "No data received.";
}
?>
