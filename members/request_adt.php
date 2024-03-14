

   <?php
   error_reporting(0);
   include('header.php');
   include('sidebar.php');
   
   ?>

   <style>
    .col-lg-12 h5{
        font-size:21px;
        
    }
    .col-lg-12 h5 span{
        
        color:green;
    }
    select {
  /* Reset Select */
  appearance: none;
  outline: 0;
  border: 0;
  box-shadow: none;
  /* Personalize */
  flex: 1;
  padding: 0 1em;
  color: #000;
  border: 1px solid var(--ct-input-border-color);
  
  background-image: none;
  cursor: pointer;
}

    </style>
      

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
                                            <h1 class="title title--h1 first-title title__separate"> Request For ADT </h1>
                                           
                                        </div>
                                        <div class=" margin_pad">
                                           <form method="post" action="upload_member_post.php" enctype="multipart/form-data">
                                            <div class="form-group col-12 col-md-12">
                                                <div class="field" align="left">
                                                <!-- multiple -->
                                                    <input type="file" id="files" name="pdfFiles"  />
                                                </div>
                                            </div>
                                              <div class="form-group col-12 col-md-12">
                                                <h6> </h6>
                                                <label for="name" class="form-label">Content</label>
                                                <textarea class="textarea form-control" id="Content" name="Content"   rows="3" required="required" > </textarea>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="row text-center">
                                                <div class="col-lg-12" style="margin: 10px auto 0px;"> 
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light" style="background: #0a1db6;">Submit</button>
                                                </div>
                                               
                                             </div>
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