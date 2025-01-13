<?php

function getAuthorConnection() {
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'blog');
    return $conn;
}

function getAllAuthors() {
    $conn = getAuthorConnection();
    $sql = "SELECT * FROM authors";
    $result = mysqli_query($conn, $sql);
    $authors = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $authors[] = $row;
        }
    }
    mysqli_close($conn);
    return $authors;
}

function addAuthor($author_name, $contact_no, $username, $password) {
    $conn = getAuthorConnection();
    $sql = "INSERT INTO authors (author_name, contact_no, username, password) 
            VALUES ('{$author_name}', '{$contact_no}', '{$username}', '{$password}')";
    $status = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $status;
}


// function searchAuthor($username) {
//     $conn = getAuthorConnection();
//     $sql = "SELECT * FROM authors WHERE username LIKE '%{$username}%'";
//     $result = mysqli_query($conn, $sql);
//     $author = mysqli_fetch_assoc($result);
//     mysqli_close($conn);
//     return $author;
// }

function getAuthorByUsername($username) {
    $conn = getAuthorConnection();
    $sql = "SELECT * FROM authors WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return false;
    }
}

function updateAuthor($authorName, $contactNo, $username, $password) {
    $conn = getAuthorConnection();
    $sql = "UPDATE authors SET 
                author_name = '$authorName',
                contact_no = '$contactNo',
                password = '$password'
            WHERE username = '$username'";

    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}

function deleteAuthor($username) {
    $conn = getAuthorConnection();
    $sql = "DELETE FROM authors WHERE username = '$username'";

    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}
?>
