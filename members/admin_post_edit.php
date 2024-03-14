

   <?php
   error_reporting(0);
   include('header.php');
   include('sidebar.php');
   
   ?>
      

<?php


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
                            
                           

                            <div class="col-lg-5">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="pb-0 pb-sm-2">
                                            <h1 class="title title--h1 first-title title__separate"> Upload Your Post </h1>
                                           
                                        </div>
                                        <div class=" margin_pad">
                                           <form method="post" action="admin_edit_adts.php" enctype="multipart/form-data">
                                           <?php
                           
                              $job_id=$_GET['id'];
                           // Initialize the SQL query
                           $sql2 = "SELECT * FROM member_post where id='$job_id'";
                         
                        

                            //  echo $sql2;
                            //  exit;
                               $result2=mysqli_query($db,$sql2);
                               $num=1;
                               while ($db_field2 = mysqli_fetch_array($result2)) {
                                   
                                   $members_id_no = $db_field2["id"];
                                   $member_table_id = $db_field2["member_table_id"];
                                   $existingFiles = explode("\n", $db_field2["file"]);
                           
                                   ?>  <input type="hidden" id="member_postid" name="member_postid" value="<?php echo $db_field2["id"]?>" />
                                            <div class="form-group col-12 col-md-12">
                                                <div class="field" align="left">
                                                
                                                    <input type="file" id="files" name="pdfFiles[]" multiple />
                                                </div>
                                                <!-- Existing files section -->
                                                <!-- <div class="existing-files">
                                                <?php
                                                
                                                foreach ($existingFiles as $file) {
                                                    echo "<div>{$file} - <a href='delete_admin_member_post.php?id=$members_id_no&file={$file}'><svg xmlns='http://www.w3.org/2000/svg' width='20' fill='none' viewBox='0 0 24 24' stroke='currentColor'>
                                                            <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16' />
                                                        </svg></a></div>";
                                                }
                                                ?>
                                            </div> -->

                                            </div>
                                              <div class="form-group col-12 col-md-12">
                                                <h6> </h6>
                                                <label for="name" class="form-label">Content</label>
                                                <textarea class="textarea form-control" id="Content" name="Content"   rows="3"  > </textarea>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="row text-center">
                                                <div class="col-lg-12" style="margin: 10px auto 0px;"> 
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light" style="background: #0a1db6;">Submit</button>
                                                </div>
                                               
                                             </div>
                                             <?php } ?>
                                           </form>
                                        
                                        </div>

                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div>
                      

                        </div>
            
                    </div> <!-- container-fluid -->

                </div> <!-- content -->

                <?php
   include('footer.php');
   ?>

<?php }?>