<?php
include('../connection.php');

$row_id= $_POST['id'];
$post_status= $_POST['post_status'];
// echo $post_status;
// echo $row_id;
// exit;

$query = "UPDATE member_post SET post_status = '$post_status' WHERE id = '$row_id'";
// echo $query;
// exit;
$result = mysqli_query($db, $query);

if ($result) {
    // Check if any rows were returned
    header("Location: post_data_tables.php");
 }



?>