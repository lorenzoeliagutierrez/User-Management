<?php
require '../../../includes/conn.php';

$id = $_GET['user_id'];

if (isset($_POST['submit'])) {

    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $middlename = mysqli_real_escape_string($conn, $_POST['middlename']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $update_user = mysqli_query($conn, "UPDATE tbl_users SET firstname = '$firstname', middlename = '$middlename', lastname = '$lastname', email = '$email', username = '$username', password = '$password' WHERE user_id = '$id'");

    header("location: ../update.users.php?user_id=" . $id);

}


?>