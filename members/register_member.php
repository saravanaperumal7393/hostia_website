<?php
error_reporting(0);

 include('../connection.php');

 
    $register_id = mysqli_real_escape_string($db, $_POST['register_id']);
    $member_id = $_POST['memeber_id'];
    $email = $_POST['register_email'];
    
    $password_mail=$_REQUEST['password_register'];
    $password = substr(md5($_REQUEST['password_register']), 25);
    
    
    // Update the database
    $query = "INSERT INTO members (members_id, email, password) VALUES ('$member_id', '$email', '$password')";
     $stmt = mysqli_query($db, $query);
     if ($stmt) {
        $sql = "UPDATE register_member SET status = 1 WHERE id = '$register_id'";

        // echo $sql;
        // exit;
        $result = mysqli_query($db, $sql);

        if ($stmt) {
        $to = $email;
        $subject = "Your Membership Credentials From Hostia";
        

        $messages = "Your Membership Credentials From Hostia\n" .
             "------------------------------------------------------------------\n\n" .
             "Website Login Link : https://avatarglobalservices.com/hostia/login.php\n" .
             "Member ID       :\t $member_id\n\n" .
            "Username       :\t $email\n\n" .
            "password      :\t $password_mail\n\n" ;
            

            $headers = "From: admin@hostiahosur.com\r\n";
            $headers .= "Reply-To: admin@hostiahosur.com\r\n"; // Add a Reply-To address if needed

        if (mail($to, $subject, $messages, $headers)) {
            
        } else {
            echo "";
        }
 
        $message3 = "Record Added and Credentials sent through Mail Successfully";
        echo "<script type='text/javascript'>alert('$message3'); window.location='add_member.php';</script>";
        }
    }
  


?>