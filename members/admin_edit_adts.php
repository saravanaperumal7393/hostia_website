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

// member_postid
$Content = $_POST['Content'];
$member_postid = $_POST['member_postid'];

$cus_date = date("Y-m-d");

$targetDir = "post_files/";
// $allowedFileTypes = array("pdf", "jpg", "jpeg", "png", "gif", "doc", "docx", "xls", "xlsx");
$allowedFileTypes = array("pdf", "jpg", "jpeg", "png", "webp");

if (!empty($_FILES['pdfFiles']['name'][0])) {
    $fileCount = count($_FILES['pdfFiles']['name']);
    $uploadedFiles = [];

    for ($i = 0; $i < $fileCount; $i++) {
        $originalFileName = $_FILES['pdfFiles']['name'][$i];
        $fileType = strtolower(pathinfo($originalFileName, PATHINFO_EXTENSION));
        $uniqueFileName = 'file' . '_' . time() . '_' . $i . '.' . $fileType;
        $targetFile = $targetDir . $uniqueFileName;

        if (!in_array($fileType, $allowedFileTypes)) {
            $message1 = "Sorry, only image files are allowed";
            // $message1 = "Sorry, only PDF, images, doc, and excel files are allowed";
            echo "<script type='text/javascript'>alert('$message1'); window.location.href = 'index.php';</script>";
            error_log("Detected File Type: $fileType");
        } else {
            if (move_uploaded_file($_FILES['pdfFiles']['tmp_name'][$i], $targetFile)) {
                $uploadedFiles[] = $targetFile;
            } else {
                $message2 = "Error uploading files. Please try again.";
                echo "<script type='text/javascript'>alert('$message2');</script>";
            }
        }
    }

    // Process the uploaded files (e.g., save file links to the database)
    if (!empty($uploadedFiles)) {
        // $to = "business@avatarprints.com";
        // $subject = "Job Creation Mail From Avatar Jobs";
        // $fileLinks = implode("\n", $uploadedFiles);

        // $messages = "This message was sent from:\n" .
        //     "Job Creation Mail From Avatar Jobs Website\n" .
        //     "------------------------------------------------------------------\n\n" .
        //     "Client Name       :\t $client\n\n" .
        //     "Name of the Job       :\t $job\n\n" .
        //     "Assigned To      :\t $assigned_by\n\n" .
        //     "Notes and Other Details     	:\t $notes\n\n" .
        //     "Date of Completion     	:\t $completion\n\n" .
        //     "Start Time:\t $start_time\n\n" .
        //     "End Time:\t $time_picker_end\n\n" .
        //     "File Links     	:\n$fileLinks\n\n" .
        //     "Reference Link     	:\t $reference_link\n\n";

        // $headers  = "From: $assigned_by\r\n";

        // if (mail($to, $subject, $messages, $headers)) {
           
        // } else {
        //     echo "";
        // }
 
        $fileLinks = implode("\n", $uploadedFiles);
        $sql = "UPDATE member_post SET file = '$fileLinks', content = '$Content', cus_date = '$cus_date' WHERE id = '$member_postid'";
    
        // $sql = "INSERT INTO member_post ( file, content, cus_date) VALUES ( '$fileLinks', '$Content',  '$cus_date')";
        // echo $sql;
        // exit;
        $result = mysqli_query($db, $sql);
        if($result){
            $message3 = "Date Update Successfully";
            echo "<script type='text/javascript'>
                    alert('$message3');
                    window.opener.location.reload(); // Refresh the parent window
                    window.close(); // Close this pop-up window
                  </script>";
        }
        // header("Location: job_submission.php");
            } else {
                $message2 = "Please Fill the Form Properly";
                echo "<script type='text/javascript'>alert('$message2');</script>";
            }
        }     
    else {
        
        $sql = "UPDATE member_post SET file = '', content = '$Content', cus_date = '$cus_date' WHERE id = '$member_postid'";
        // echo $sql;
        // exit;
        $result = mysqli_query($db, $sql);
        // echo $sql;
        // exit;
        $message3 = "Date Update Successfully";
                echo "<script type='text/javascript'>
                        alert('$message3');
                        window.opener.location.reload(); // Refresh the parent window
                        window.close(); // Close this pop-up window
                      </script>";
        
    }
    

   
?>
