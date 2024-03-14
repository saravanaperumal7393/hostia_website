
<?php
error_reporting(0);
include("../connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Assuming you have a database connection in $db
    date_default_timezone_set('Asia/Kolkata');

    // Retrieve form data
    $member_id = $_POST['members_id'];
    $name =  $_POST['name'];
    $companyname =  $_POST['companyname'];
    $address =  $_POST['address'];
    $category =  $_POST['category'];
    $email =  $_POST['email'];
    $mobile =  $_POST['mobile'];
    $position =  $_POST['position'];
    $area =  $_POST['area'];
    $about_cmpy =  $_POST['about_cmpy'];
    $pass=$_POST["password"];
    $password1=mysqli_real_escape_string($db,stripslashes($pass));
	$password1=substr(md5(mysqli_real_escape_string($db,stripslashes($pass))), 25);
    $email_mob_info=$_POST["email_mob_info"];
    $facilities=$_POST["fac"];
    $process=$_POST["process"];
    $product=$_POST["product"];
 
    
    // Assuming you have sanitized and validated the input data
    // File upload handling
$targetDir = "upload_img/"; // Directory where uploaded files will be stored
$extension = pathinfo($_FILES["imageUpload"]["name"], PATHINFO_EXTENSION); // Get file extension
$timestamp = time(); // Get the current timestamp
$newFileName = $timestamp . '.' . $extension; // Create a new unique filename

$targetFile = $targetDir . $newFileName; // Path of the renamed file
// Handle multiple file upload
if (!empty($_FILES["imagesfiles_update"]["name"])) {
    
    $targetDir2 = "company_image/";
    // Define allowed file types
    $allowedFileTypes = array("jpg", "jpeg", "png", "webp");

    // Iterate through each uploaded file
    // foreach ($_FILES['imagesfiles_update']['name'] as $key => $value) {
        $originalFileName = $_FILES['imagesfiles_update']['name'];
        $fileType = strtolower(pathinfo($originalFileName, PATHINFO_EXTENSION));
        $uniqueFileName = 'file' . '_' . time() . '.' . $fileType;
        $targetFile2 = $targetDir2 . $uniqueFileName;
       
        // Check if the file type is allowed
        if (in_array($fileType, $allowedFileTypes)) {
       
            // Move the uploaded file to the target directory
            if (move_uploaded_file($_FILES['imagesfiles_update']['tmp_name'], $targetFile2)) {
                // File moved successfully, you can now process the file or store its path in the database
                // Example: Store file path in database
                $fileLink = $targetFile2;
                $updateQuery = "UPDATE members SET 
                 category = '$category', 
                 position = '$position', 
                 mobile = '$mobile', 
                    email_mob_info = '$email_mob_info', 
                    facilities = '$facilities', 
                    process = '$process', 
                    product = '$product',
                about = '$about_cmpy',
                company_image = '$fileLink'
                WHERE id = '$member_id'";  

                 $result = mysqli_query($db, $updateQuery);
                 if ($result) {
                     $message = "Records Updated";
                     echo "<script type='text/javascript'>alert('$message'); window.location.href = 'index.php';</script>";
                 } else {
                     $message = "Enter Proper Record";
                     echo "<script type='text/javascript'>alert('$message'); window.location.href = 'index.php';</script>";
                 }
            }
        }
    
}

// Check if a file was uploaded
if (!empty($_FILES["imageUpload"]["name"])) {
    // File uploaded, perform file handling and update query
    if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $targetFile)) {
    // Update the database
    $updateQuery = "UPDATE members SET 
                                       
                    category = '$category', 
                    position = '$position', 
                    mobile = '$mobile',
                    email_mob_info = '$email_mob_info', 
                    facilities = '$facilities', 
                    process = '$process', 
                    product = '$product',
                    -- password = '$password1',
                    about = '$about_cmpy',
                    profile_picture = '$targetFile' 
                    WHERE id = '$member_id'";  // Assuming you have a variable $member_id containing the member's ID

//    echo $updateQuery;
//    exit;
            $result = mysqli_query($db, $updateQuery);
            if ($result) {
                $message = "Records Updated";
                echo "<script type='text/javascript'>alert('$message'); window.location.href = 'index.php';</script>";
            } else {
                $message = "Enter Proper Record";
                echo "<script type='text/javascript'>alert('$message'); window.location.href = 'index.php';</script>";
            }
        } else {
            $message = "Error uploading file";
            echo "<script type='text/javascript'>alert('$message'); window.location.href = 'index.php';</script>";
        }
}else {
    // No file uploaded, perform update without file handling
    $sql2 = "UPDATE members SET 
    
                    category = '$category',
                    position = '$position', 
                    mobile = '$mobile', 
                    email_mob_info = '$email_mob_info', 
                    facilities = '$facilities', 
                    process = '$process', 
                    product = '$product', 
    
    -- password = '$password1',
    about = '$about_cmpy'
    WHERE id = '$member_id'"; 
            // echo $sql2;
            // exit;
    $result2 = mysqli_query($db, $sql2);

    if ($result2) {
        $message = "Records are Updated";
        echo "<script type='text/javascript'>alert('$message'); window.location.href = 'index.php';</script>";
    } else {
        // echo "Error updating record: " . mysqli_error($db);
        $message = "Enter Proper Record";
        echo "<script type='text/javascript'>alert('$message'); window.location.href = 'index.php';</script>";
    }
}
}

?>
   <?php
   
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
/* Remove IE arrow */
select::-ms-expand {
  display: none;
}
/* Custom Select wrapper */
.select {
  position: relative;
  display: flex;
  
  height: 3em;
  border-radius: .25em;
  overflow: hidden;
}
/* Arrow */
.select::after {
  content: '\25BC';
  position: absolute;
  color: #ffff;
    right: 0;
    padding: 1em;
    background-color: #009746;
  transition: .25s all ease;
  pointer-events: none;
}
/* Transition */
.select:hover::after {
  color: #f39c12;
}
label span {
    color: #d15656;
    font-size: 13px;
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
if($row['id'] == '1') {
    header("Location: member_list.php");
    exit; // Always include exit after header redirection to prevent further script execution
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
                            
                            <div class="col-lg-7">
                                <div class="card">
                                    <div class="card-body">
                                       
                                        <div class="">
                                            <div class="col-lg-12">
                                         <form method="post" action="" enctype="multipart/form-data">
                                         <?php
        
                                    $sqlUpdated = "SELECT * FROM members WHERE id = '$id'";
                                    $resultUpdated = mysqli_query($db, $sqlUpdated);

                                    while ($member_profile = mysqli_fetch_assoc($resultUpdated)) {
                        
                                {
                                    
                                


            ?>
                                            <div class="row">
                                                 <div class="col-lg-12"> 
                                                    <div class="mb-3 text-center">
                                                        <div class="avatar-upload">
                                                            <div class="avatar-edit">
                                                            <input type='file'name= "imageUpload" id="imageUpload" accept=".png, .jpg, .jpeg .webp" />
                                                                <label for="imageUpload"></label>
                                                            </div>
                                                            <div class="avatar-preview">
                                                            <?php if ($member_profile['profile_picture'] != null) { ?>
                                                                <!-- Display the image when profile_picture exists -->
                                                                <div id="imagePreview" style="background-image: url('<?php echo $member_profile['profile_picture']; ?>');"></div>
                                                            <?php } else { ?>
                                                                <!-- Display a default image when profile_picture is null or empty -->
                                                                <div id="imagePreview" style="background-image: url('assets/person.jpg');"></div>
                                                            <?php } ?>
                                                            </div>
                                                        </div>
                                                        <span class="" style="color:#ff0000a1;"> Upload Only Square Size Image like 500 X 500 </span>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="row">
                                            <input type="hidden" id="members_id" name="members_id" class="form-control" value="<?php echo $member_profile['id']; ?>">
                                                  
                                                </div>
                                                <div class="row">
                                                    
                                                    <div class="col-lg-12 text-center"> 
                                                        
                                                            <h5>Membership Id : <span> <?php echo $member_profile['members_id']; ?> </span></h5>
                                                        
                                                        
                                                    </div>
                                             
                                                </div>
                                                <div class="row">
                                                <div class="col-lg-6"> 
                                                        <div class="mb-3">
                                                            <label for="name" class="form-label">Region</label>
                                                            <input type="text" id="area" name="area" class="form-control" value="<?php echo $member_profile['area']; ?>" readonly>
                                                            
                                                        </div>
                                                    </div>
                                              
                                                        <div class="col-lg-6">    
                                                                <div class="mb-3">
                                                                    <label for="example-email" class="form-label">Company Name</label>
                                                                    <input type="text" id="companyname" name="companyname" class="form-control" value="<?php echo $member_profile['company_name']; ?>" readonly>
                                                                </div>
                                                        </div>
                                                </div>

                                                <div class="row">
                                                  
                                                <div class="col-lg-6">    
                                                    <div class="mb-3">
                                                        <label for="category" class="form-label">Category <span> [Editable] </span> </label>
                                                        <?php if (empty($member_profile['category'])): ?>
                                                            <!-- If the category is empty, display the select dropdown -->
                                                            <div class="select">
                                                                <select id="category" name="category">
                                                                    <option value="Micro">Micro</option>
                                                                    <option value="Small">Small</option>
                                                                    <option value="Medium">Medium</option>
                                                                </select>
                                                            </div>
                                                        <?php else: ?>
                                                            <div class="select">
                                                        <select id="category" name="category">
                                                            <option value="Micro" <?php echo ($member_profile['category'] == 'Micro') ? 'selected' : ''; ?>>Micro</option>
                                                            <option value="Small" <?php echo ($member_profile['category'] == 'Small') ? 'selected' : ''; ?>>Small</option>
                                                            <option value="Medium" <?php echo ($member_profile['category'] == 'Medium') ? 'selected' : ''; ?>>Medium</option>
                                                        </select>
                                                </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                                    
                                                    <div class="col-lg-6"> 
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Contact Person Name</label>
                                                                <input type="text" id="name" name="name" class="form-control" value="<?php echo $member_profile['name']; ?>" readonly>
                                                            </div>
                                                        </div>
                                                 </div>
                                                 <div class="row">
                                                    <div class="col-lg-6"> 
                                                        <div class="mb-3">
                                                            <label for="name" class="form-label">Designation <span> [Editable] </span></label>
                                                            <?php if (!empty($member_profile['position'])) { ?>
                                                                <input type="text" id="position" name="position" class="form-control" value="<?php echo $member_profile['position']; ?>">
                                                            <?php } else { ?>
                                                                <input type="text" id="position" name="position" class="form-control" value="M.D">
                                                            <?php } ?>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6"> 
                                                        <div class="mb-3">
                                                            <label for="name" class="form-label">Address</label>
                                                            <textarea class="textarea form-control" id="address" name="address" rows="2" readonly><?php echo $member_profile['address']; ?></textarea>

                                                        </div>
                                                    </div>

                                                    
                                                 
                                                    
                                                 </div>

                                                 <div class="row">
                                                    <div class="col-lg-6"> 
                                                        <div class="mb-3">
                                                            <label for="name" class="form-label">Email</label>
                                                            <input type="email" id="email" name="email" class="form-control"value="<?php echo $member_profile['email']; ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">    
                                                            <div class="mb-3">
                                                                <label for="Mobile" class="form-label">Mobile Number <span> [Editable] </span></label>
                                                                <input type="text" id="mobile" name="mobile" class="form-control" value="<?php echo $member_profile['mobile']; ?>" >
                                                            </div>
                                                    </div>
                                                 </div>
                                                 <div class="row">
                                                    <div class="col-lg-6"> 
                                                        <div class="mb-3">
                                                            <label for="name" class="form-label">Enable or Disable Email & Mobile Details</label>
                                                         
                                                            <div class="field-holder">
                                                                <label for="email_mob">
                                                                    <input type="radio" name="email_mob_info" id="enable_radio" value="Enable" <?php echo ($member_profile['email_mob_info'] == 'Enable') ? 'checked' : ''; ?>>
                                                                    Enable
                                                                </label>
                                                                
                                                                <label for="email_mob">
                                                                    <input type="radio" name="email_mob_info" id="disable_radio" value="Disable" <?php echo ($member_profile['email_mob_info'] == 'Disable') ? 'checked' : ''; ?>>
                                                                    Disable
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">    
                                                            <div class="mb-3">
                                                                <label for="Facilities" class="form-label">Facilities <span> [Editable] </span> </label>
                                                                
                                                                <textarea class="textarea form-control" id="fac" name="fac" rows="2" ><?php echo $member_profile['facilities']; ?></textarea>
                                                            </div>
                                                    </div>
                                                  
                                                 </div>

                                                 <div class="row">
                                                    <div class="col-lg-6"> 
                                                        <div class="mb-3">
                                                            <label for="Process" class="form-label">Process <span> [Editable] </span></label>
                                                            <!-- <input type="text" id="process" name="process" class="form-control"value="<?php echo $member_profile['process']; ?>" > -->
                                                            <textarea class="textarea form-control" id="process" name="process" rows="2" ><?php echo $member_profile['process']; ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">    
                                                            <div class="mb-3">
                                                                <label for="Product" class="form-label">Product <span> [Editable] </span></label>
                                                                
                                                                <textarea class="textarea form-control" id="product" name="product" rows="2" ><?php echo $member_profile['product']; ?></textarea>
                                                            </div>
                                                    </div>
                                                 </div>
                                            

                                                 <div class="row">
                                                    <div class="col-lg-6"> 
                                                        <div class="mb-3">
                                                        <label for="name" class="form-label">Company Image <span> [Editable] </span></label>
                                                        <div class="field" align="left">
                                                
                                                     <input type="file" id="files" name="imagesfiles_update"  />
                                                         </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    if(!empty($member_profile['company_image'])){
                                                        ?>
                                                    
                                                    <div class="col-lg-6"> 
                                                        <div class="mb-3">
                                                        <label for="name" class="form-label">Present Company Image</label>
                                                        <img src="<?php echo $member_profile['company_image']?>" width="100%">
                                                        </div>
                                                    </div>
                                                    <?php
                                                    }
                                                        ?>
                                                    
                                                 </div>


                                                 
                                                 <div class="row">
                                                    <div class="col-lg-12"> 
                                                        <div class="mb-3">
                                                            <label for="name" class="form-label">About Company <span> [Editable] </span></label>
                                                            <textarea class="textarea form-control" id="about_cmpy" name="about_cmpy"  rows="2" value="about_cmpy" ><?php echo $member_profile['about']; ?></textarea>
                                                            
                                                        </div>
                                                    </div>
                                                   
                                                 </div>
                                                 <div class="row text-center">
                                                    <div class="col-lg-12" style="margin: 0 auto;"> 
                                                        <button type="submit" name= "submit" class="btn btn-primary waves-effect waves-light" style="background: #0a1db6;"> Submit</button>
                                                    </div>
                                                   
                                                 </div>
                                                 <?php }} ?>
                                                </form>
                                            </div> <!-- end col -->

                                            
                                        </div>
                                        <!-- end row-->

                                    </div> <!-- end card-body -->
                                </div> <!-- end card -->
                            </div><!-- end col -->

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