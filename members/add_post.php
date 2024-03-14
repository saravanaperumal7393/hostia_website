   
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

	//add data
if ($_POST["Submit"]=="Add"){


  $sql = "INSERT INTO tb_style1(imaged, adt_des) VALUES ('" . mysqli_real_escape_string($db, $upload_path) . "', '".$_REQUEST["adt_msg"]."')";
  // echo($sql);
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

$sql = "UPDATE tb_style1 SET imaged='" . mysqli_real_escape_string($db, $upload_path) . "', adt_des = '" . mysqli_real_escape_string($db, $_REQUEST["adt_msg"]) . "' WHERE style_id =" . mysqli_real_escape_string($db, $_POST['style_id']);
// echo $sql;
// exit;
                                    if (!mysqli_query($db,$sql))
                                                  { die('Error: ' . mysqli_error());}
                                           else $msg= "Record is Updated Successfully";
										  
										   
  }			 
		 
		 
if ($_POST["Submit"]=="Delete")
   {
	$sql = "delete from tb_style1 WHERE style_id=$_POST[style_id]";
    // echo $sql;
    // exit;
                                    if (!mysqli_query($db,$sql))
                                                  { 
												  echo $delk;
												  die('Error:' . mysqli_error());
												  
												  }
                                           else $msg= "Record is Delete Successfully";
										   
  }										   
   		 
	 
			 
	
	
	


$cc= mysqli_query($db,"Select *from  tb_style1",$con); //check how many records exists in the database
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
td{
    border: 1px solid #000;
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
                                        
                                    <form class="form-horizontal bucket-form" action="add_post.php" method="post" enctype="multipart/form-data" id="add_product" onsubmit="return validate();" name="add_product">
                                        <div class="row">
                                                <div class="col-lg-2 " > 
                                                            <div class="mb-3">
                                                            <label for="name" class="form-label">Image :</label>
                                                                
                                                    
                                                            </div>
                                                </div>
                                                 <div class="col-lg-6"> 
                                                    <div class="mb-3">
                                                   
                                                        <div class="field" align="left">
                                                        
                                                 <input type="hidden" name="style_type" value="<?php echo $_REQUEST["style_type"]; ?>" />
                                                    <input name="index" type="hidden" id="index" value="<?php echo $index; ?>" size="55" />
                                                    <input name="style_id" type="hidden" id="style_id" value="<?php echo $_REQUEST["style_id"]; ?>" /> 
                                                    <input name="img" type="hidden" id="img" value="<?php echo $_REQUEST["image"]; ?>" /> 
							        <input type="file" name="image" id="files" class="form-control"/>
                                                  <br>
                                                  <strong>Image Resolution :</strong><br>
Width: 1920px<br>
Height: 1080px <br/>
                                                  <span class="generalfont"> <img src="
				  <?php
				if($_REQUEST["Submit"]=="Update" ||  $_REQUEST["Submid"]=="Add" || $_REQUEST["bid"]=="up" || $_REQUEST["bid"]=="del")
			{
			    if($_REQUEST["image"])
				echo $_REQUEST["image"];
				else
				echo $upload_path;
			}
			else
			echo "upload/nophoto.jpg";
				?>
                " alt=""Style="max-width: 150px;"  border="1" /></span>
                                                        </div>
                                            
                                                    </div>
                                                </div>
                                                
                                        </div>
                                        <div class="row">
                                                <div class="col-lg-2 " > 
                                                            <div class="mb-3">
                                                            <label for="name" class="form-label">Content :</label>
                                                                
                                                    
                                                            </div>
                                                </div>
                                                 <div class="col-lg-6"> 
                                                    <div class="mb-3">
                                                   
                                                    <textarea class="textarea form-control" id="adt_msg" name="adt_msg"  rows="2"  >
                                                    <?php echo $_REQUEST["adt_des"]; ?>
                                                    </textarea>
                                            
                                                    </div>
                                                </div>
                                                
                                        </div>
                                        <div class="row text-center">
                                                    <div class="col-lg-12" style="margin: 0 auto;"> 
                                                    <div class="form-group">
						<label class="col-xs-12 " style="text-align:center;"><input name="Submit22" type="reset" class="btn btn-danger" value="Back"  onclick="location.replace('add_post.php')" />
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
                                                      <input name="Submit2" type="reset" class="btn btn-danger" value="Add New" onClick="location.replace('add_post.php?bid=sav')" />
                                                      <?php 
							
							} 
 

 
 ?>
                                                      <input name="Submit" type="reset" class="btn btn-danger" value="Reset" onClick="location.replace('add_post.php?bid=sav')" /></label></div>
						
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
                                          &nbsp;UPDATED ADT IMAGES</strong><br />
                                          <br />
                                        </span>
                                        <table width="99%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#3366CC" bgcolor="#999999" style="border: solid 1px;   border-color:#999999;">
                                          <tr>
                                             <td width="25%" align="center" bgcolor="#FFFFFF" ><span class="style48" style="    font-size: 17px;
    font-weight: 800;">Image</span></td>
                                             <td width="25%" align="center" bgcolor="#FFFFFF" ><span class="style48" style="    font-size: 17px;
    font-weight: 800;">Content</span></td>
                                            <td colspan="2" align="center" bgcolor="#FFFFFF" class="style48" style="    font-size: 17px;
    font-weight: 800;"><div align="center">Action</div></td>
                                          </tr>
                                          <?php 
  $result = mysqli_query($db,"SELECT * FROM tb_style1 order by style_id DESC");
$i=1; 
while($row = mysqli_fetch_array($result))
  {
  extract( $row );
			  ?>
                                          <tr>
                                            <td height="21" align="center" bgcolor="#FFFFFF" class="generalfont"><br>
                                              <img src="<?php echo $imaged; ?>" width="" height="61" alt="" /><br>
                                            <br></td> 
                                            <td height="21" align="center" bgcolor="#FFFFFF" ><br>
                                              <p><?php echo $adt_des; ?> <p>
                                            <br></td> 
                                            <td width="6%" align="center" valign="middle" bgcolor="#FFFFFF">
    <span class="style26">
        <?php echo "<a href='add_post.php?bid=up&image=$imaged&adt_des=$adt_des&style_id=$style_id' target='_parent'>"; ?>
            <img src="assets/images/up.png" alt="" />
        <?php echo "</a>"; ?>
    </span>
</td>
<td width="11%" align="center" valign="middle" bgcolor="#FFFFFF">
    <span class="style26">
        <?php echo "<a href='add_post.php?bid=del&image=$imaged&adt_des=$adt_des&style_id=$style_id' target='_parent'>"; ?>
            <img src="assets/images/del.png" alt="" />
        <?php echo "</a>"; ?>
    </span>
</td>
                                          </tr>
                                          <?php
			  
			  }
			  			  ?>
                                      </table>
       
      </div>

                        </div>
                    </div> <!-- container-fluid -->

                </div> <!-- content -->

                <?php
   include('footer.php');
   ?>
   <?php } ?>