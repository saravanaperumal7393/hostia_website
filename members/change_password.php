<?php
error_reporting(0);
 include('../connection.php');
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Assuming you have a database connection in $db
    $memberID = $_POST['member_id'];
    $old_pass = substr(md5($_REQUEST['old_pass']), 25);
    $new_pass = substr(md5($_REQUEST['new_pass']), 25);
    $con_pass = substr(md5($_REQUEST['con_pass']), 25); // Get the hashed value of confirmed password

    $pass_res = mysqli_query($db, "SELECT * FROM members WHERE id = $memberID");
    $num = mysqli_num_rows($pass_res);

    if ($num > 0) {
        $pre_det = mysqli_fetch_array($pass_res);
        // Verify old password
        if ($old_pass === $pre_det['password']) {
            // Check if the new password matches the confirmed password
            if ($new_pass === $con_pass) {
                // Update password if confirmed
                $qry = "UPDATE members SET password='$new_pass' WHERE id ='".$pre_det['id']."'";
                $result = mysqli_query($db, $qry);
                
                if ($result) {
                    $message = "Password Changed";
                    echo "<script type='text/javascript'>alert('$message'); window.location.href = 'change_password.php';</script>";
                } else {
                    $message = "Failed to change password";
                    echo "<script type='text/javascript'>alert('$message'); window.location.href = 'change_password.php';</script>";
                }
            } else {
                $message = "New Passwords do not match";
                echo "<script type='text/javascript'>alert('$message'); window.location.href = 'change_password.php';</script>";
            }
        } else {
            $message = "Incorrect Old Password ";
            echo "<script type='text/javascript'>alert('$message'); window.location.href = 'change_password.php';</script>";
        }
    } else {
        $message = "Enter Valid Details";
        echo "<script type='text/javascript'>alert('$message'); window.location.href = 'change_password.php';</script>";
    }
  
}

?>
   
   <?php
   include('header.php');
   include('sidebar.php');
   ?>

<?php


ob_start();
session_start();
// include("../connection.php");
$password1=mysqli_real_escape_string($db,stripslashes($_SESSION["hacses156"]));

$ip1=mysqli_real_escape_string($db,stripslashes($_SESSION["hacses157"]));
$ldate1=mysqli_real_escape_string($db,stripslashes($_SESSION["hacses158"]));

 $selquery="select * from logs where pwd1='$password1' and ip1='$ip1' and ldate1='$ldate1'";
//   echo $selquery;
//   die;

 $result=mysqli_query($db,$selquery);
 $count=mysqli_num_rows($result);
   
 if($count==0)   {
 header("location: index.php");
 //mysqli_close();

}
elseif($count==1)
{
   
$client=1;  
// if ($_SESSION['uname'] !== 'admin') {
//    header("location: index.php"); // Redirect to the login page
//    exit(); // Terminate further script execution
// }
$log_name=$_SESSION["uname"];
// echo $log_name;
// die;
$name_member = "SELECT * FROM members WHERE email = '$log_name'";
$result = mysqli_query($db, $name_member);

if ($result) {
    // Check if any rows were returned
    if (mysqli_num_rows($result) > 0) {
        // Fetch the result as an associative array
        $row = mysqli_fetch_assoc($result);
        
        // Access the 'name' column from the result
        // $name_member = $row['fname'] . ' ' . $row['lname'];
        $id = $row['id'];
        
        // Output the name
        // echo $name_member;
        // die;
    } else {
        // No matching username found
        echo "No name found for this username";
    }
}


$home=1;

?>

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
         
            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                       
                        <div class="row">
                            
                            <div class="col-lg-9">
                                <div class="card">
                                    <div class="card-body">
                                    <div class="padd_20">
                                        <h1 class="underline-text5 " > Change Password </h1>
                                    </div>
                                        <div class="">
                                            <div class="col-lg-12">
                                         <form method="post" action="" >
                                         
                                            <div class="row">
                                                        <div class="col-lg-6"> 
                                                        <input type="hidden" class="form-control" id="member_id" name="member_id" value="<?php echo $id; ?>">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Old Password</label>
                                                                <input type="Password" class="form-control" id="old_pass" name="old_pass" value="" autocomplete="off">
                                                                <i class="toggle-password fa fa-fw fa-eye-slash"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6"> 
                                                        <div class="mb-3">
                                                            <label for="name" class="form-label">New Password</label>
                                                            <input type="Password" class="form-control" name="new_pass" id="new_pass" value="">
                                                            <i class="toggle-password fa fa-fw fa-eye-slash"></i>
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                      

                                          
                                                 <div class="row">
                                                    <div class="col-lg-8"> 
                                                        <div class="mb-3">
                                                            <label for="name" class="form-label">Confirm Password</label>
                                                            <input type="Password" class="form-control" name="con_pass" id="con_pass" value="">
                                                            <i class="toggle-password fa fa-fw fa-eye-slash"></i>
                                                        </div>
                                                    </div>
                                                   
                                                 </div>

                                            
                                                 <div class="row text-center">
                                                    <div class="col-lg-12" style="margin: 0 auto;"> 
                                                        <button type="submit" name="submit" class="btn btn-primary waves-effect waves-light" style="background: #0a1db6;"><i class="fa fa-send-o"></i> Submit</button>
                                                    </div>
                                                   
                                                 </div>

                                                </form>
                                            </div> <!-- end col -->

                                            
                                        </div>
                                        <!-- end row-->

                                    </div> <!-- end card-body -->
                                </div> <!-- end card -->
                            </div><!-- end col -->

                      
                      

                        </div>
            
                    </div> <!-- container-fluid -->

                </div> <!-- content -->
 

   
                <?php
   include('footer.php');
   ?>

   <?php } ?>