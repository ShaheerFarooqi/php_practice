<?php
include "config.php";
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

if (isset($_POST['submit'])) {
    $name     = $conn->real_escape_string($_POST['name']);
    $email    = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    $sql      = "INSERT INTO user ( name, email, password) VALUES ('$name', '$email', '$password')";
    $result   = $conn->query($sql);
    if ($result == TRUE) {
        echo "New record created successfully.";
    } else {
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
