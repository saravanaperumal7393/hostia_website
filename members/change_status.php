<?php 
include("../connection.php");

$member_post_id = mysqli_real_escape_string($db, $_REQUEST['id']);
$value = mysqli_real_escape_string($db, $_REQUEST['value']);


$query = "UPDATE member_post SET status = '1' WHERE id='$member_post_id'";

$result = mysqli_query($db, $query);

if ($result) {
    if ($value == '1') {
        // Debugging the value of $value
      
        // Check if any rows were returned
        header("Location: post_data_tables.php?id=$member_post_id");
    } else {
        header("Location: add_member.php");
    }
 }
 
?>