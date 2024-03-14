<?php
include('../connection.php'); // Include your database connection file

// Check if both id and file parameters are provided in the URL
if (isset($_GET['id']) && isset($_GET['file'])) {
    $post_id = $_GET['id'];
    $fileToDelete = $_GET['file'];

    // Implement your file deletion logic here
    // For example, you might use unlink() to delete the file
    if (file_exists($fileToDelete)) {
        if (unlink($fileToDelete)) {
            // Continue with the rest of the deletion logic
        } else {
            echo 'Error deleting file.';
        }
    } else {
        echo 'File does not exist.';
    }
    
} else {
    echo 'Both id and file parameters are required.';
}
?>
