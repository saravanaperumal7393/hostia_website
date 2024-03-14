<?php
error_reporting(0);
 include('../connection.php');
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Assuming you have a database connection in $db
    date_default_timezone_set('Asia/Kolkata');
    // Retrieve form data
    // $selectedMember = $_POST['member_complete'];
    $member_id = $_POST['member_id'];
    $email = $_POST['email']; 
    $password_mail=$_REQUEST['password'];
    $password = substr(md5($_REQUEST['password']), 25);
    // $cus_date=date("Y-m-d");
    
    // echo $member_id ;
    // echo $email ;
    // echo $password ;
    
    // die;

    // Update the database
    $query = "INSERT INTO members (members_id, email, password) VALUES ('$member_id', '$email', '$password')";
     $stmt = mysqli_query($db, $query);
     if ($stmt) {

        $to = $email;
        $subject = "Your Membership Credentials From Hostia";
        // $fileLinks = implode("\n", $uploadedFiles);

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
   
   <?php
   include('header.php');
   include('sidebar.php');
   ?>

   <style>
    .afterline {
  text-align: center;
  max-width: 500px;
  margin:0 auto;
  padding:10px 0px;
}
    .monospace {
	 font-family: monospace;
	 text-transform: uppercase;
	 color: orange;
	 font-size: 14px;
}
 h1 {
	 margin: 0;
	 font-size: 20px;
	 color: darkorchid;
	 position: relative;
	 display: inline-block;
	 width: 100%;
     text-transform: uppercase;
}
 /* h1 span {
	 background: white;
	 position: relative;
	 z-index: 2;
	 padding-left: 1rem;
	 padding-right: 1rem;
}
 h1::before, h1::after {
	 display: block;
	 content: '';
	 z-index: 1;
	 background: #000;
	 position: absolute;
	 width: 100%;
	 height: 1px;
}
 h1::before {
	 top: 40%;
}
 h1::after {
	 top: 60%;
	 bottom: 7px;
} */

.header-title{
    margin: 0 0 7px 0;
    color: #009845;
    text-transform: uppercase;
    font-weight: 600;
    font-size: 18px;
    padding: 10px 0px;
}
table th{
    padding:5px!important;
    
}

.avatar-xl {
    height: 3rem;
    width: 3rem;
}
.card{
    display: flex;
}

@media(max-width:991px){
    .card{
    display: inline-flex;
}
}

@media(max-width:1024px){
    .card{
    display: inline-flex;
}
}

select {
  box-sizing: border-box;
  background-clip: padding-box;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  width: auto;
  line-height: 1.4286;
  padding: 10px 24px 10px 10px;
  font-size: 14px;
  border: 0;
  background: #FFF no-repeat right center url('https://cdn3.iconfinder.com/data/icons/google-material-design-icons/48/ic_keyboard_arrow_down_48px-24.png');
  background-size: 24px;
  border: 1px solid #666;
  border-width: 1px 1px 2px;
  color: #666;
  border-radius: 5px;
}

select::-ms-expand {
  display: none
}
.wrapper{
  width:98px;
  background: rgba(0, 0, 0, 0.4);
  margin:20px;
  border-radius: 30px;
}
.btn_container{
  display:inline-block;
  margin:0px;
}

input[type="radio"] {
    display: none;
}

.btn_container .checkmark{
  width:30px;
  height:30px;
}

.checkmark{
  padding:0px;
  margin:0px;
}

.yes:checked + .checkmark {
  background-color: green;
  border-radius:30px;
  border:1px solid transparent;
  
 background: rgb(32, 213, 50);
    background: -moz-linear-gradient(top, rgba(32, 213, 50, 1) 0%, rgba(28, 195, 1, 1) 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, rgba(32, 213, 50, 1)), color-stop(100%, rgba(28, 195, 1, 1)));
    background: -webkit-linear-gradient(top, rgba(32, 213, 50, 1) 0%, rgba(28, 195, 1, 1) 100%);
    background: -o-linear-gradient(top, rgba(32, 213, 50, 1) 0%, rgba(28, 195, 1, 1) 100%);
    background: -ms-linear-gradient(top, rgba(32, 213, 50, 1) 0%, rgba(28, 195, 1, 1) 100%);
    background: linear-gradient(to bottom, rgba(32, 213, 50, 1) 0%, rgba(28, 195, 1, 1) 100%);
    -moz-animation-duration: 0.4s;
    -moz-animation-name: slidein;
    -webkit-animation-duration: 0.4s;
    -webkit-animation-name: slidein;
    animation-duration: 0.4s;
    animation-name: slidein;
    -webkit-transform: translateZ(0);
}

.neutral:checked + .checkmark {
  background-color:  #ccc;
  border:1px solid black;
  border-radius:30px;
  
  background: rgb(238, 238, 238);
    background: -moz-linear-gradient(top, rgba(238, 238, 238, 1) 0%, rgba(204, 204, 204, 1) 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, rgba(238, 238, 238, 1)), color-stop(100%, rgba(204, 204, 204, 1)));
    background: -webkit-linear-gradient(top, rgba(238, 238, 238, 1) 0%, rgba(204, 204, 204, 1) 100%);
    background: -o-linear-gradient(top, rgba(238, 238, 238, 1) 0%, rgba(204, 204, 204, 1) 100%);
    background: -ms-linear-gradient(top, rgba(238, 238, 238, 1) 0%, rgba(204, 204, 204, 1) 100%);
    background: linear-gradient(to bottom, rgba(238, 238, 238, 1) 0%, rgba(204, 204, 204, 1) 100%);
}
.no:checked + .checkmark {
  background-color: red;
  border-radius:30px;
  border:1px solid transparent;
  
   -moz-animation-duration: 0.4s;
    -moz-animation-name: slideno;
    -webkit-animation-duration: 0.4s;
    -webkit-animation-name: slideno;
    animation-duration: 0.4s;
    animation-name: slideno; 
}

.ion-checkmark-round, .ion-close-round{
  margin-left:10px;
  margin-top:10px;
  color:#fff;
  line-height:30px;
}

.ion-record{
  margin-left:8px;
 
  color:#fff;
  line-height:30px;
}

@keyframes slidein {
    from {
        transform: translate(50px, 0);
    }
    to {
        transform: translate(0px, 0px);
    }
}


@keyframes slideno {
    from {
      transform: translate(-50px,0);
    }
    to {
        transform: translate( 0px, 0px);
    }
}

@keyframes returnLeft {
    from {
        transform: translate(-50px,0);
    }
    to {
        transform: translate(0px,0);
    }
}

@keyframes returnRight {
    from {
        transform: translate(50px,0);
    }
    to {
        transform: translate(0px,0);
    }
}


    </style>

<link href="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-grid/4.2.2/ui-grid.css" rel="stylesheet"> 


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
                                <div class="row">
                            <div class="col-lg-9 afterline">
                            <h1>
                                <span>Add Member</span>
                            </h1>
                            
                            </div>
                        </div>
                                    <div class="card-body">
                                       
                                        <div class="">
                                            <div class="col-lg-12">
                                         <form method="post" action="" >
                                         
                                            <div class="row">
                                            <div class="col-lg-6"> 
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Member ID</label>
                                                    <input type="text" id="member_id" name="member_id" onkeyup="checkUsername(this.value);" class="form-control" value="" required="required">
                                                    <p id="nameresult"></p>
                                                    <div id="available"></div>
                                                </div>
                                            </div>
                                                        <div class="col-lg-6"> 
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Email</label>
                                                                <input type="email" id="email" name="email" class="form-control" required="required">
                                                            </div>
                                                        </div>
                                                   
                                            </div>
                                      

                                          
                                                 <div class="row">
                                                    <div class="col-lg-8"> 
                                                        <div class="mb-3">
                                                            <label for="name" class="form-label">Password</label>
                                                            <input type="password" id="password" name="password" class="form-control" value="hostia">
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

                        <div class="row" style="overflow:auto;">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                    <div class="" style="margin-bottom: 10px;">
                                     <button type="button" class="btn btn-danger" id="deleteSelected" style="background:red;"> <i class="fa fa-trash-o"></i>&nbsp; Delete Selected</button>
                                    </div>
                                       
    
                                        <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                                            <thead>
                                            <tr>
                                                <!-- <th></th> -->
                                               
                                                <th>Name</th>
                                                <!-- <th>DP</th> -->
                                                <th>Company Name, Email, Address, Area <br> Apply Date</th>
                                                
                                                
                                                <th>Member ID</th>
                                                <th> Status</th>
                                                
                                                <!-- colspan="2" -->
                                                <th ></th>
                                            </tr>
                                            </thead>
    
    
                                            <tbody>
                                            <?php
                           
                              
                                // Initialize the SQL query
                                $sql2 = "SELECT * FROM register_member WHERE status = 0 ORDER BY id DESC";
                                    $result2=mysqli_query($db,$sql2);
                                    $num=1;
                                    while ($db_field2 = mysqli_fetch_array($result2)) {
                                        
                                        $members_id_no = $db_field2["id"];
                                        $rowId = $db_field2["id"];
                                        $profile_picture= $db_field2["imagefile"];
                                        
                                        
                                
                                        ?>  
                                            <tr>
                                                <!-- <td><input type="checkbox" class="custom-control-input m-0" id="customCheck<?php echo $db_field2["id"] ?>" value="<?php echo $db_field2["id"] ?>"></td> -->
                                                
                                               
                                                <td> <?php echo $db_field2["name"] ?></td>
                                                <td style=" padding:15px!important;"><?php echo $db_field2["company_name"] ?> <br> <?php echo $db_field2["email"] ?> <br> <?php echo $db_field2["address"]  ?> <br> <?php echo $db_field2["area"] ?> <br> <?php echo $db_field2["cus_date"] ?></td>
                                                
                                                <form  action="register_member.php" method="post">
                                                      <td width="11%" align="center" valign="middle" bgcolor="#FFFFFF">
                                                        <input type="text" id="memeber_id" name="memeber_id" oninput="toggleSubmitButton(document.getElementById('adt_status'))">
                                                    </td>
                                                    <td width="11%" align="center" valign="middle">
                                                    <input type="hidden" id="register_id" name="register_id" value="<?php echo $db_field2["id"];?>">
                                                    <input type="hidden" id="register_email" name="register_email" value="<?php echo $db_field2["email"];?>">
                                                        <select name="adt_status" id="adt_status" onchange="toggleSubmitButton(this)">
                                                            <option value="Pending">Pending</option>
                                                            <option value="Approved">Approved</option>
                                                        </select>
                                                        <input type="hidden" id="password_register" name="password_register" class="form-control" value="hostia">
                                                    </td>
                                                   
                                                    <td width="11%" align="center" valign="middle" bgcolor="#FFFFFF">
                                                        <button type="submit" class="btn btn-success" id="submitButton" style="display:none;" value="submit">Submit</button>
                                                    </td>
                                                </form>
                                            </tr>
                                    <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
            
                    </div> <!-- container-fluid -->

                </div> <!-- content -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.3/angular.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.3/angular-animate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.3/angular.js"></script>
    <script>
    var app = angular.module("btn", []);

    app.controller("MainCtrl", function($scope) {
    
    });
</script> 

<script>
    function toggleSubmitButton(selectElement) {
        var submitButton = selectElement.parentNode.parentNode.querySelector("#submitButton");
        var status = selectElement.value;
        var memberID = selectElement.parentNode.parentNode.querySelector("#memeber_id").value;
        var passwordInput = selectElement.parentNode.parentNode.querySelector("#password_register");
        
        // Generate password based on member ID
        var password = "hostia" + memberID;
        
        // Set the generated password to the password input field
        passwordInput.value = password;
        
        if (status === "Approved" && memberID.trim() !== "") {
            submitButton.style.display = "inline-block";
        } else {
            submitButton.style.display = "none";
        }
    }
</script>



                <?php
   include('footer.php');
   ?>