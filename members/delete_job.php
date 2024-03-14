<?php
include('../connection.php');

if (isset($_POST['delete_job'])) {
    $job_id = $_POST['id'];
 

    // Perform deletion query based on the job ID
    $delete_query = "DELETE FROM member_post WHERE id = $job_id";
    $result = mysqli_query($db, $delete_query);
// echo $delete_query;
// exit;
    if ($result) {
        // Deletion successful
        echo '<script>alert("Job deleted successfully");</script>';
        header("Location: post_data_tables.php");
    
        
    } else {
        // Deletion failed
        echo '<script>alert("Failed to delete job");</script>';
        // Redirect to an error page or handle the failure accordingly
    }
}
?>
