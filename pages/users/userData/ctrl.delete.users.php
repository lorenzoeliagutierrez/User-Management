<?php
require '../../../includes/conn.php';

$id = $_GET['user_id'];


echo $id;

$delete_users = mysqli_query($conn, "DELETE FROM tbl_users WHERE user_id = '$id'");

header("location: ../list.users.php");


?>