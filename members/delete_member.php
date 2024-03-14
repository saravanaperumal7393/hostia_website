<?php
include('../connection.php');


$job_id = $_GET['id'];

$delete_query = "DELETE  FROM members WHERE id = $job_id";
echo $delete_query;
$result = mysqli_query($db, $delete_query);

if($result){
    
    echo "<script type='text/javascript'>
            window.opener.location.reload(); // Refresh the parent window
            window.close(); // Close this pop-up window
          </script>";
}
?>
