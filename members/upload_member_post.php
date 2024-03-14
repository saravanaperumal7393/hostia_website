<?php
// error_reporting(0);
session_start();
include ("../connection.php");

$log_name=$_SESSION["uname"];

$name_member = "SELECT * FROM members WHERE email = '$log_name'";
$result = mysqli_query($db, $name_member);

if ($result) {
    // Check if any rows were returned
    if (mysqli_num_rows($result) > 0) {
        // Fetch the result as an associative array
        $row = mysqli_fetch_assoc($result);
        
        // Access the 'name' column from the result
        $member_name = $row['name'];
        $members_id = $row['members_id'];
        $name_member_id = $row['id'];
        
        $company_name = $row['company_name'];
        
        // Output the name
        // echo $name_member;
        // die;
    }
}

      
$Content = $_POST['Content'];

$cus_date = date("Y-m-d");
$status = 0;
$targetDir = "post_files/";
// $allowedFileTypes = array("pdf", "jpg", "jpeg", "png", "gif", "doc", "docx", "xls", "xlsx");
$allowedFileTypes = array("pdf", "jpg", "jpeg", "png", "webp");

if (!empty($_FILES['pdfFiles']['name'][0])) {
    $originalFileName = $_FILES['pdfFiles']['name'];
    $fileType = strtolower(pathinfo($originalFileName, PATHINFO_EXTENSION));
    $uniqueFileName = 'file' . '_' . time() . '.' . $fileType;
    $targetFile = $targetDir . $uniqueFileName;

    if (!in_array($fileType, $allowedFileTypes)) {
        $message1 = "Sorry, only image files are allowed";
        echo "<script type='text/javascript'>alert('$message1'); window.location.href = 'index.php';</script>";
        error_log("Detected File Type: $fileType");
    } else {
        if (move_uploaded_file($_FILES['pdfFiles']['tmp_name'], $targetFile)) {
            // Process the uploaded file (e.g., save file link to the database)
            $fileLink = $targetFile;
            $sql = "INSERT INTO member_post (member_table_id, member_id, name, company_name, file, content, status, cus_date) VALUES ('$name_member_id', '$members_id', '$member_name','$company_name',  '$fileLink', '$Content', '$status',  '$cus_date')";
            $result = mysqli_query($db, $sql);
            if ($result) {
                $message = "Record Added Successfully";
                echo "<script type='text/javascript'>alert('$message'); window.location.href = 'index.php';</script>";
            } else {
                $message2 = "Error uploading file. Please try again.";
                echo "<script type='text/javascript'>alert('$message2');</script>";
            }
        } else {
            $message2 = "Error uploading file. Please try again.";
            echo "<script type='text/javascript'>alert('$message2');</script>";
        }
    }
} else {
    $sql = "INSERT INTO member_post (member_table_id, member_id, name, company_name, file, content, status, cus_date) VALUES ('$name_member_id', '$members_id', '$member_name','$company_name',  '', '$Content', '$status',  '$cus_date')";
    // echo $sql;
    // exit;
    $result = mysqli_query($db, $sql);
    // echo $sql;
    // exit;
    $message3 = "Record Added Successfully";
    echo "<script type='text/javascript'>alert('$message3'); window.location='index.php';</script>";
}

   
?>
