<?php
// include('connection.php');
include('header.php');
?>
 
 <?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
     // Set parameters and execute
     $email = $_POST['mail_id'];

     // Check if email exists in the database
     $sql = "SELECT * FROM members WHERE email = '$email'";
     $result = mysqli_query($db, $sql);
 
     if ($result->num_rows > 0) {

        function generateRandomString($length = 6) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = '';
            $max = strlen($characters) - 1;
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $max)];
            }
            return $randomString;
        }
         // Generate random code
         $code = generateRandomString(6);
 
         // Send email with the code
         $to = $email;
         $subject = "Password Reset Code From Hostia Website";
         $message = "Your New password is: $code";
         $headers = "From: hostia.hosur@gmail.com\r\n";
            
       
        $password2 = substr(md5($code), 25);
        $sql = "UPDATE members SET password = '$password2' WHERE email = '$email'";
      
             if ($db->query($sql) === TRUE) {
                  echo $code;
                  echo '  -- ';
           echo $password2;
         exit;
                 
                 $message = "New Password has been sent to your email";
                 echo "<script type='text/javascript'>alert('Password reset code has been sent to your email.'); window.location.href = 'login.php';</script>";
             } 
 
         if (mail($to, $subject, $message, $headers)) {
             // Update the database with the code
             
         } 
     } else {
        
         $message = "Email not found -Enter correct Mail ID";
         echo "<script type='text/javascript'>alert('$message');</script>";
     }

  
}
?>



 <!--==========================-->
        <!--=         Banner         =-->
        <!--==========================-->
        <section id="page-title-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 m-auto text-center">
                        <div class="page-title-content">
                            <h1 class="h2">Forget Password</h1>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--===========================-->
        <!--=         Register        =-->
        <!--===========================-->
        <section id="page-content-wrap">
            <div class="register-page-wrapper section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="register-page-inner">
                                <div class="col-lg-12 m-auto">
                                    <div class="register-form-content">
                                        <div class="row ">
                                            <!-- Signin Area Content Start -->
                                            <div class="col-lg-2 col-md-2 text-center">
                                          
                                            </div>
                                            <!-- Signin Area Content End -->

                                            <!-- Regsiter Form Area Start -->
                                            <div class="col-lg-7 col-md-6 ml-auto">
                                                <div class="register-form-wrap">
                                                    <!-- <h3 class="text-center">registration Form</h3> -->
                                                    <div class="register-form">
                                                        <form action="" method="POST" enctype="multipart/form-data">
                                                           
                                                            <div class="row">
                                                                <div class="col-12 col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="mail_id">Enter Mail ID</label>
                                                                        <input type="email" class="form-control" id="mail_id" name="mail_id" />
                                                                    </div>
                                                                </div>

                                                         
                                                            </div>

                                                            


                                                            <div class="form-group text-center">
                                                                <div class="text-center mx-auto"> 
                                                                    <input type="submit" class="btn btn-reg" value="Submit">
                                                                </div>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Regsiter Form Area End -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php
// include('connection.php');
include('footer.php');
?>