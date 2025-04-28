<?php
require '../../../includes/conn.php';

if (isset($_POST['submit'])) {

    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $middlename = mysqli_real_escape_string($conn, $_POST['middlename']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $check_username = mysqli_query($conn, "SELECT * FROM tbl_users WHERE username = '$username'");
    $result_username = mysqli_num_rows($check_username);

    $check_email = mysqli_query($conn, "SELECT * FROM tbl_users WHERE email = '$email'");
    $result_email = mysqli_num_rows($check_email);

    if ($result_username == 0 && $result_email == 0) {
        $hashed_pass = password_hash($password, PASSWORD_DEFAULT);

        $insert_user = mysqli_query($conn, "INSERT INTO tbl_users (firstname, middlename, lastname, username, password) VALUES ('$firstname', '$middlename', '$lastname', '$username', '$hashed_pass')");

        header ("location: ../list.users.ph");
    } else {
        header("location: ../add.users.php");
    }

    
}


?>