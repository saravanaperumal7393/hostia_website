<?php
// include('connection.php');
include('header.php');
?>
 
 <?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
     // Set parameters and execute
     $name = $_POST['register_name'];
     $company_name = $_POST['register_cmpy'];
     $email = $_POST['register_email'];
     $address = $_POST['register_address'];
     $mobile_number = $_POST['register_mobile'];
     $area = $_POST['register_area'];
     $status=0;
     $cus_date = date("Y-m-d");
     $register_value="new";
     $register_email=$_POST['register_email'];

    //  $targetDir = "members/upload_img/"; // Directory where uploaded files will be stored
    // $extension = pathinfo($_FILES["imageUpload"]["name"], PATHINFO_EXTENSION); // Get file extension
    // $timestamp = time(); // Get the current timestamp
    // $newFileName = $timestamp . '.' . $extension; // Create a new unique filename

    // $imagefile = $targetDir . $newFileName; // Path of the renamed file
    $sql = "INSERT INTO register_member ( name, company_name, email, address, mobile_number, area, imagefile, status,cus_date) VALUES ('$name', '$company_name', '$email','$address',  '$mobile_number', '$area', '', '$status',  '$cus_date')";
    $result = mysqli_query($db, $sql);
    if ($result) {
        $sql_register = "INSERT INTO member_post (status, register_email, register_value ) VALUES ('$status', '$register_email', '$register_value')";
         $result_register = mysqli_query($db, $sql_register);
        $to = 'admin@hostiahosur.com';
        $subject = "New One Registered For Hostia Membership ";
        // $fileLinks = implode("\n", $uploadedFiles);

        $messages = "New One Registered For Hostia Membership\n" .
             "------------------------------------------------------------------\n\n" .
             "Name : \t $name\n\n" .
             "Company Name       :\t $company_name\n\n" .
            "Email       :\t $email\n\n" .
            "Address      :\t $address\n\n".
            "Mobile Number       :\t $mobile_number\n\n" .
            "Area       :\t $area\n\n"  ;
            

            $headers = "From: $email\r\n";
            $headers .= "Reply-To: admin@hostiahosur.com\r\n"; // Add a Reply-To address if needed

        if (mail($to, $subject, $messages, $headers)) {
            
        } else {
            echo "";
        }
        $message3 = "Record Added Successfully";
        echo "<script type='text/javascript'>alert('$message3'); window.location='index.php';</script>";
    }  else {
                $message = "Enter Proper Record";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
// if (!empty($_FILES["imageUpload"]["name"])) {
//     // File uploaded, perform file handling and update query
//     if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $imagefile)) {
//     // Update the database
//     $sql = "INSERT INTO register_member ( name, company_name, email, address, mobile_number, area, imagefile, status,cus_date) VALUES ('$name', '$company_name', '$email','$address',  '$mobile_number', '$area', '$imagefile', '$status',  '$cus_date')";
//     $result = mysqli_query($db, $sql);
//     if ($result) {
//         $message3 = "Record Added Successfully";
//         echo "<script type='text/javascript'>alert('$message3'); window.location='index.php';</script>";
//     }  else {
//                 $message = "Enter Proper Record";
//                 echo "<script type='text/javascript'>alert('$message');</script>";
//             }
//         } else {
//             $message = "Error uploading file";
//             echo "<script type='text/javascript'>alert('$message'); </script>";
//         }
// }

    // Prepare and bind SQL statement
   

  
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
                            <h1 class="h2">Membership Registration Form</h1>
                            
                            
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
                                                                        <label for="register_name">Name</label>
                                                                        <input type="text" class="form-control" id="register_name" name="register_name" required=""/>
                                                                    </div>
                                                                </div>

                                                                <div class="col-12 col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="register_cmpy">Company Name</label>
                                                                        <input type="text" class="form-control" id="register_cmpy" name="register_cmpy" required=""/>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-12 col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="register_email">Email</label>
                                                                        <input type="email" class="form-control" id="register_email" onkeyup="checkemail(this.value);" name="register_email"  required=""/>
                                                                        <p id="nameresult"></p>
                                                    <div id="available"></div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-12 col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="register_address">Address</label>
                                                                        <input type="text" class="form-control" id="register_address" name="register_address" />
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-12 col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="register_mobile">Mobile Number</label>
                                                                        <input type="text" class="form-control" id="register_mobile" name="register_mobile" required=""/>
                                                                    </div>
                                                                </div>

                                                                <div class="col-12 col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="register_deptno">Region</label>
                                                                        <input type="text" class="form-control" id="register_area" name="register_area" required=""/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- <div class="form-group file-input">
                                                                <input type="file" name="imageUpload" id="customfile" class="d-none" />
                                                                <label class="custom-file" for="customfile"><i class="fa fa-upload"></i>Upload Your Photo</label>
                                                            </div> -->


                                                            <div class="form-group text-center">
                                                                <div class="text-center mx-auto"> 
                                                                    <input type="submit" class="btn btn-reg" value="Apply Now">
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