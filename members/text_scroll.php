   
   <?php 

error_reporting(0);

session_start();
include("../connection.php");
$password1=mysqli_real_escape_string($db,stripslashes($_SESSION["hacses156"]));
$ip1=mysqli_real_escape_string($db,stripslashes($_SESSION["hacses157"]));
$ldate1=mysqli_real_escape_string($db,stripslashes($_SESSION["hacses158"]));

	$selquery="select * from logs where pwd1='$password1' and ip1='$ip1' and ldate1='$ldate1'";

	$result=mysqli_query($db,$selquery);
	$count=mysqli_num_rows($result);
	
	if($count==0) 	{
	header("location: index.php");
	//mysqli_close();
	
}
elseif($count==1)
{
mysqli_close($db);



include("../connection.php");


// get data 
$fheader=$_POST["fheader"];
$fdetails=$_POST["fdetails"];
// $adt_msg=$_POST["adt_msg"];

	$image=$_FILES['image']['name'];
if($image=='')
{
$upload_path ="upload/nophoto.jpg";
}
else
{
if($_FILES['image']['error'] != UPLOAD_ERR_OK) {
	echo 'Upload file error';
	return;
}
//Check for valid upload
if(!is_uploaded_file($_FILES['image']['tmp_name'])) {
	echo 'Invalid request';
	return;
}
//Sanitize the filename (See note below)
$remove_these = array(' ','`','"','\'','\\','/');
$newname = str_replace($remove_these,'',$_FILES['image']['name']);

$upload_path = "upload/$newname";

move_uploaded_file($_FILES['image']['tmp_name'], $upload_path);
$upload_path=$upload_path;

}
$desc1 = $_POST["desc1"];
	//add data
if ($_POST["Submit"]=="Add"){


    $sql= "INSERT INTO tb_news(desce)VALUES('$desc1')";
  // exit;
  if (!mysqli_query($db,$sql)){die('Error: ' . mysqli_error());}
  else
 $msg= "Record is added Successfully";
}
				   
 
				  
	if ($_POST["Submit"]=="Update")
   {
if($image=='')
{
$upload_path =$_POST["img"];
}

$sql = "UPDATE tb_news SET desce='$desc1'	WHERE style_id =$_POST[style_id] ";
// echo $sql;
// exit;
                                    if (!mysqli_query($db,$sql))
                                                  { die('Error: ' . mysqli_error());}
                                           else $msg= "Record is Updated Successfully";
										  
										   
  }			 
		 
		 
if ($_POST["Submit"]=="Delete")
   {
    $sql = "delete from tb_news WHERE style_id=$_POST[style_id]";
    // echo $sql;
    // exit;
                                    if (!mysqli_query($db,$sql))
                                                  { 
												  echo $delk;
												  die('Error:' . mysqli_error());
												  
												  }
                                           else $msg= "Record is Delete Successfully";
										   
  }										   
   		 
	 
			 
	
	
	


$cc= mysqli_query($db,"Select *from  tb_news",$con); //check how many records exists in the database
  $count_mem=mysqli_num_rows($cc);
   
   if ($count_mem==0)
    { 
	$index=1;
	
	
	}
	else
	  { 
	   $index=$count_mem+1;
	   
      }
	  
	
	  
	$a1=1;	


?>
   
   <?php
   include('header.php');
   include('sidebar.php');
   
   ?>

<style>
    .input-switch{
	display: none;
}
td{
    border: 1px solid #000;
}
.label-switch{
	display: inline-block;
	position: relative;
}

.label-switch::before, .label-switch::after{
	content: "";
	display: inline-block;
	cursor: pointer;
	transition: all 0.5s;
}

.label-switch::before {
    width: 3em;
    height: 1em;
    border: 1px solid #757575;
    border-radius: 4em;
    background: #888888;
}

.label-switch::after {
    position: absolute;
    left: 0;
    top: -11%;
    width: 1.5em;
    height: 1.5em;
    border: 1px solid #757575;
    border-radius: 4em;
    background: #ffffff;
}

.input-switch:checked ~ .label-switch::before {
    background: #00a900;
    border-color: #008e00;
}

.input-switch:checked ~ .label-switch::after {
    left: unset;
    right: 0;
    background: #00ce00;
    border-color: #009a00;
}

.info-text {
	display: inline-block;
}


</style>


            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
         
            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                       
                        <div class="row">
                                    <div class="card">
                                        <div class="card-body">
                                        
                                    <form class="form-horizontal bucket-form" action="text_scroll.php" method="post" enctype="multipart/form-data" id="add_product" onsubmit="return validate();" name="add_product">
                                    <div class="row">
                                                <div class="col-lg-2 " style="padding:20px;" > 
                                                            <div class="mb-3">
                                                            <label for="name" class="form-label">Flash News  :</label>
                                                                
                                                    
                                                            </div>
                                                </div>
                                                 <div class="col-lg-8" > 
                                                    <div class="mb-3">
                                                   
                                                    <!-- <textarea class="textarea form-control" id="adt_msg" name="adt_msg"  rows="5"  >
                                                   
                                                    </textarea> -->

                                                    <?php
			if($_REQUEST["Submit"]=="Update" ||  $_REQUEST["Submit"]=="Add" || $_REQUEST["bid"]=="up" || $_REQUEST["bid"]=="del")
			{
				$cc= mysqli_query($db,"Select * from tb_news where style_id='".$_REQUEST["style_id"]."'");
				$result11=mysqli_fetch_array($cc);
				$dec=$result11["desce"];
                $status=$result11["status"];
			}
			else
			{
			$dec="";
			}
				?>
                                              <textarea name="desc1" cols="50" rows="3" class="style26" id="desc1" style="width:80%; height:150px; padding:20px;box-shadow: 0px 3px 13px 6px #25292a38;"><?php echo $dec; ?></textarea>
                                                <span class="style16">
                                                <input type="hidden" name="style_type" value="<?php echo $_REQUEST["style_type"]; ?>" />
                                                <input name="index" type="hidden" id="index" value="<?php echo $index; ?>" size="55" />
                                                <input name="style_id" type="hidden" id="style_id" value="<?php echo $_REQUEST["style_id"]; ?>" />
                                                <input name="img" type="hidden" id="img" value="<?php echo $_REQUEST["image"]; ?>" />
                                              </span>
                                            
                                                    </div>
                                                </div>
                                                
                                        </div>
                             
                                        <div class="row text-center">
                                                    <div class="col-lg-12" style="margin: 0 auto;"> 
                                                    <div class="form-group">
						<label class="col-xs-12 " style="text-align:center;"><input name="Submit22" type="reset" class="btn btn-danger" value="Back"  onclick="location.replace('text_scroll.php')" />
                                                      <?php if($_REQUEST["bid"]=="up")
 { ?>
                                                      <input name="Submit" type="submit" class="btn btn-danger" id="Submit" value="Update" />
                                                      <?php
							}
							 else if($_REQUEST["bid"]=="del")
							 {
							?>
                                                      <input name="Submit" type="submit" class="btn btn-danger" id="Submit" value="Delete" />
                                                      <?php 
							} 
			 				 else if($_REQUEST["bid"]=="sav") 
			 				{
							 ?>
                                                      <input name="Submit" type="submit" class="btn btn-danger" id="Submit2" value="Add" />
                                                      <?php 
							}
							else
							{
							?>
                                                      <input name="Submit2" type="reset" class="btn btn-danger" value="Add New" onClick="location.replace('text_scroll.php?bid=sav')" />
                                                      <?php 
							
							} 
 

 
 ?>
                                                      <input name="Submit" type="reset" class="btn btn-danger" value="Reset" onClick="location.replace('text_scroll.php?bid=sav')" /></label></div>
						
						</div>
                                                    </div>
                                                   
                                                 </div>
                                        
                                        </form>

                                        </div> <!-- end card-body -->
                                    </div> <!-- end card -->
                        </div>
                        <div class="row">
                        <div class="">
        
        <div class="text-center">
   <span class="style51"> <strong style="font-size: 18px;">
                                          &nbsp;LIST OF FLASH NEWS</strong><br />
                                          <br />
                                        </span>
                                        <table width="99%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#999999" bgcolor="#999999" style="border: 1px solid;  border-color:#999999;">
                                    <tr>
                                      <td height="19" align="center" bgcolor="#FFFFFF" style="background:#fff;    border: 1px solid #000;" ><div align="center"><span class="style48">&nbsp; Description</span></div></td>
                                      <td colspan="2" align="center" bgcolor="#FFFFFF" class="style48" style="    font-size: 17px;
    font-weight: 800;"><div align="center">Action</div></td>
                                      <td align="center" bgcolor="#FFFFFF" class="style48" style="background:#fff;    border: 1px solid #000;">Status</td>
                                    </tr>
                                    <?php 
  $result = mysqli_query($db,"SELECT * FROM tb_news order by style_id");
$i=1; 
while($row = mysqli_fetch_array($result))
  {
  extract( $row );
			  ?>
                                    <tr>
                                      <td height="32" align="left"  class="generalfont" style="background:#fff;    border: 1px solid #000;" ><div align="left" style="margin-left:10px;padding:10px; background:#fff;"><span class="style54" style="color: black;padding:5px;line-height: 25px;"><?php echo $desce; ?></span></div></td>
                                      <td width="6%" align="center" valign="middle" bgcolor="#FFFFFF">
    <span class="style26">
        <?php echo "<a href='text_scroll.php?bid=up&image=$imaged&adt_des=$adt_des&style_id=$style_id' target='_parent'>"; ?>
            <img src="assets/images/up.png" alt="" />
        <?php echo "</a>"; ?>
    </span>
</td>
<td width="11%" align="center" valign="middle" bgcolor="#FFFFFF">
    <span class="style26">
        <?php echo "<a href='text_scroll.php?bid=del&image=$imaged&adt_des=$adt_des&style_id=$style_id' target='_parent'>"; ?>
            <img src="assets/images/del.png" alt="" />
        <?php echo "</a>"; ?>
    </span>
</td>

<td height="32" align="left" class="generalfont" style="background:#fff; border: 1px solid #000;">
    <input type="hidden" name="styleid_status_<?php echo $style_id; ?>" id="styleid_status_<?php echo $style_id; ?>" value="<?php echo $style_id; ?>">
    <input type="hidden" name="status_<?php echo $style_id; ?>" id="statusInput_<?php echo $style_id; ?>" value="<?php echo $status; ?>">
    <div align="left" style="margin-left:10px;padding:10px; background:#fff;">
        <span class="style54" style="color: black;padding:5px;line-height: 25px;">
            <input class='input-switch' type="checkbox" id="demo_<?php echo $style_id; ?>" <?php echo $status == 1 ? 'checked' : ''; ?> onchange="updateStatus(this)"/> <!-- Set checkbox state based on PHP variable -->
            <label class="label-switch" for="demo_<?php echo $style_id; ?>"></label>
            <span class="info-text"><?php echo $status == 1 ? 'Active' : 'Inactive'; ?></span>
        </span>
    </div>
</td>




                                    </tr>
                                    <?php
			  
			  }
			  			  ?>
                              </table></td>
                            </tr>
                            <tr>
                              <td height="21" align="left" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
                            </tr>
                        </table></td>
                      </tr>
                    </table>
       
      </div>

                        </div>
                    </div> <!-- container-fluid -->

                </div> <!-- content -->
<script>
function updateStatus(checkbox) {
    var status = checkbox.checked ? 1 : 0;
    var styleId = checkbox.id.split('_').pop(); // Extract style ID from checkbox ID
    
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'status_active.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (xhr.status === 200) {
            // Update status text if needed
            var infoText = document.querySelector('#statusInput_' + styleId);
            infoText.value = status;
            var infoTextDisplay = document.querySelector('.info-text');
            infoTextDisplay.innerHTML = status === '1' ? "Active" : "Inactive";
        }
    };
    xhr.send('style_id=' + styleId + '&status=' + status);
}

</script>
                <?php
   include('footer.php');
   ?>
   <?php } ?>