<?php
include('../connection.php');

if(isset($_POST['Submit'])) {
    // Check if the email content is set and not empty
    if(isset($_POST['email_content']) && !empty($_POST['email_content'])) {
        
        // Retrieve the email content from the form
        $email_content = $_POST['email_content'];
        $subject = $_POST['subject'];

        // File upload handling
        $file_attached = false;
        if(isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
            $file_attached = true;
            $image_tmp_name = $_FILES['image']['tmp_name'];
            $image_name = $_FILES['image']['name'];
            $image_type = $_FILES['image']['type'];
            $image_size = $_FILES['image']['size'];
        }
        
        $sql = "SELECT email FROM members";
        $result = mysqli_query($db, $sql);

        if ($result) {
            // Step 3: Compose your email message
            $subject = $subject;
            $message = $email_content; // Use the content submitted from the form
            $headers = "From: admin@hostiahosur.com" . "\r\n" .
                       "Reply-To: admin@hostiahosur.com" . "\r\n" .
                       "X-Mailer: PHP/" . phpversion();

            // If file attached, include it in the email
            if($file_attached) {
                $boundary = md5(rand());
                $headers .= "\r\nMIME-Version: 1.0\r\n";
                $headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\r\n";
                
                $message = "--$boundary\r\n";
                $message .= "Content-Type: text/plain; charset=\"iso-8859-1\"\r\n";
                $message .= "Content-Transfer-Encoding: 7bit\r\n";
                $message .= "\r\n$message\r\n";
                
                $file = fopen($image_tmp_name, "rb");
                $data = fread($file, filesize($image_tmp_name));
                fclose($file);
                $data = chunk_split(base64_encode($data));
                
                $message .= "--$boundary\r\n";
                $message .= "Content-Type: $image_type; name=\"$image_name\"\r\n";
                $message .= "Content-Disposition: attachment; filename=\"$image_name\"\r\n";
                $message .= "Content-Transfer-Encoding: base64\r\n";
                $message .= "\r\n$data\r\n";
                $message .= "--$boundary--\r\n";
            }

            // Step 4: Loop through the email addresses and send the email to each recipient
            while($row = mysqli_fetch_assoc($result)) {
                $to = $row["email"];
                // Send email
                if(mail($to, $subject, $message, $headers)){
                    echo "";
                } else {
                    echo "";
                }
                
            }
            $message3 = "Mail Sent Successfully To All Members";
            echo "<script type='text/javascript'>alert('$message3'); window.location='send_email.php';</script>";
        } 

        // Close the database connection
        mysqli_close($db);
    }
}
?>
