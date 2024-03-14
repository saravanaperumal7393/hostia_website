<?php

// error_reporting(0);
ob_start();
session_start();
include("../connection.php");
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
       $name_member = $row['name'];
       $name_member_id = $row['id'];
       $profile_picture = $row['profile_picture'];
       
       // Output the name
    //    echo $name_member;
    //    die;
   }
}

function truncate_words($text, $limit) {
    $words = explode(" ", $text);
    if (count($words) > $limit) {
        return implode(" ", array_slice($words, 0, $limit)) . "...";
    } else {
        return $text;
    }
}
$home=1;

?>


<!DOCTYPE html>
<html lang="en">
    

<head>

        <meta charset="utf-8" />
        <title>HOSTIA | Member Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/logo/logo.png">

        <!-- App css -->

        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

        <!-- icons -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />

        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         <!-- third party css -->
         <link href="assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <!-- third party css end -->

		<!-- App css -->

		<link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

		<!-- icons -->
		<link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        
    </head>

    <!-- body start -->
    <body class="loading" data-layout-color="light"  data-layout-mode="default" data-layout-size="fluid" data-topbar-color="light" data-leftbar-position="fixed" data-leftbar-color="light" data-leftbar-size='default' data-sidebar-user='true'>

        <!-- Begin page -->
        <div id="wrapper">


            <!-- Topbar Start -->
            <div class="navbar-custom">
                    <ul class="list-unstyled topnav-menu float-end mb-0">
                        <?php if($name_member_id=='1') {?>
                    <!-- style="display: none;" -->
                        <li class="dropdown notification-list topbar-dropdown" >
                        <a class="nav-link dropdown-toggle waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="fe-bell noti-icon"></i>
                            <?php
                            $query = "SELECT COUNT(*) as count FROM member_post WHERE status = 0";
                            $result = mysqli_query($db, $query);
                            
                            if ($result) {
                                $row = mysqli_fetch_assoc($result);
                                $count = $row['count'];
                                
                                // If count is greater than 0, display the badge with the count
                                if ($count > 0) {
                                    echo '<span class="badge bg-danger rounded-circle noti-icon-badge">' . $count . '</span>';
                                }
                            }
                            ?>
                        </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-lg" >
    
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5 class="m-0">
                                        <!-- <span class="float-end">
                                            <a href="#" class="text-dark">
                                                <small>Clear All</small>
                                            </a>
                                        </span> -->
                                        Notification
                                    </h5>
                                </div>
    
                                <div class="noti-scroll" data-simplebar>
                                <?php
                    
                                     $sql2 = "SELECT * FROM member_post where status= 0";
         
                                    $result2=mysqli_query($db,$sql2);
                                    $num=1;
                                    while ($db_field2 = mysqli_fetch_array($result2)) {
                                        
                                        $members_id_no = $db_field2["id"];
                                        $member_table_id = $db_field2["member_table_id"];
                                        $fileLinks = explode("\n", $db_field2["file"]);
                                        if (empty($db_field2["register_value"])) {
                                
                                        ?>  
                                        
                                    <!-- item-->
                                    <a href="change_status.php?id=<?php echo $db_field2["id"]; ?>&value=1" class="dropdown-item notify-item active">
                                        <div class="notify-icon">
                                        <?php
                                        
                                                        $members_name_query = "SELECT * FROM members WHERE id='$member_table_id'";
                                                                $result_members = mysqli_query($db, $members_name_query);

                                                                if ($result_members) {
                                                                    $member_data = mysqli_fetch_assoc($result_members);

                                                                    if ($member_data) {
                                                                        // Assuming 'members' is a column in your 'members' table
                                                                        
                                                                        $profile_picture = $member_data['profile_picture'];
                                                                        // $lname = $member_data['lname'];
                                                                        
                                                                        ?>
                                                                        <?php 
                                                                        if (!empty($profile_picture)) {
                                                                        ?>
                                                <img src="<?php echo $profile_picture; ?>" class="img-fluid rounded-circle" alt="" />
                                                <?php } else {?>
                                                    <img src="assets/person.jpg" class="img-fluid rounded-circle" alt="" />
                                                <?php } ?>
                                            </div>
                                                
                                                                <?php }} ?>
                                        <p class="notify-details" style="text-transform:capitalize;" ><?php echo $db_field2["name"]; ?></p>
                                        <p class="text-muted mb-0 user-msg">
                                            <small style="text-transform:capitalize;    color: #009846;" ><?php 
                                         
                                            
                                            echo truncate_words($db_field2["content"],10); ?></small>
                                        </p>
                                    </a> 
                                    <?php }  else{  ?>
                                        <a href="change_status.php?id=<?php echo $db_field2["id"]; ?>&value=2" class="dropdown-item notify-item active">
                                        <div class="notify-icon">
                                        
                                                    <img src="assets/dp_request.png" class="img-fluid rounded-circle" alt="" />
                                             
                                            </div>
                                     
                                        <p class="notify-details" ><?php echo $db_field2["register_email"]; ?></p>
                                        <p class="text-muted mb-0 user-msg">
                                            <small style="text-transform:capitalize;    color: #009846;" >New Request for Membership</small>
                                        </p>
                                    </a> 
                                        <?php } } ?>
                                </div>
    
                                <!-- All-->
                                <a href="change_status.php" class="dropdown-item text-center notify-item notify-all" style="    color: blue;">
                                    Clear all
                                    <i class="fe-arrow-right"></i>
                                </a>
    
                            </div>
                            <?php }?>
                            
                        </li>
    
    
                     
    
                        <li class="dropdown notification-list topbar-dropdown">
                            <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <?php if (!empty($row['profile_picture'])) { ?>
                                        <img src="<?php echo $row['profile_picture']; ?>" class="rounded-circle" alt="<?php echo $name_member; ?>">
                                    <?php } else { ?> 
                                        <img src="assets/person.jpg" alt="user-image" class="rounded-circle">
                                    <?php } ?>     
                            
                                <span class="pro-user-name ms-1">
                                    <?php echo  $name_member; ?> <i class="mdi mdi-chevron-down"></i> 
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>
    
                                <!-- item-->
                                <a href="change_password.php" class="dropdown-item notify-item">
                                    <i class="fe-user"></i>
                                    <span>Change Password</span>
                                </a>
    
                           
    
                                <div class="dropdown-divider"></div>
    
                                <a href="logout.php" class="dropdown-item notify-item">
                                    <i class="fe-log-out"></i>
                                    <span>Logout</span>
                                </a>
    
                            </div>
                        </li>
    
                    
    
                    </ul>
                    <div class="logo-box">
                        <a href="index.php" class="logo logo-light text-center">
                            <span class="logo-sm">
                                <img src="assets/images/logo/logo.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="assets/images/logo/logo.jpg" alt="" height="16">
                            </span>
                        </a>
                        <a href="index.php" class="logo logo-dark text-center">
                            <span class="logo-sm">
                                <img src="assets/images/logo/logo.png" alt="" height="60">
                            </span>
                            <span class="logo-lg">
                                <img src="assets/images/logo/logo.jpg" alt="" height="55">
                            </span>
                        </a>
                    </div>

                    <ul class="list-unstyled topnav-menu topnav-menu-left mb-0">
                        <li>
                            <button class="button-menu-mobile disable-btn waves-effect">
                                <i class="fe-menu"></i>
                            </button>
                        </li>
    
                        <li>
                            <?php
                            if($name_member=="Admin"){
                                //  echo $name_member;
                                // die;
                            ?>

                            <h4 class="page-title-main">Admin Panel</h4>
                            <?php
                            }else{
                            ?>
                              <h4 class="page-title-main">Members Panel</h4>
                            <?php
                            }
                            ?>
                        </li>
            
                    </ul>

                    <div class="clearfix"></div> 
               
            </div>
            <!-- end Topbar -->

            <?php } ?>