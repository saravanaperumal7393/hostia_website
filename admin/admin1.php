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

                                    if (!mysqli_query($db,$sql))
                                                  { die('Error: ' . mysqli_error());}
                                           else $msg= "Record is Updated Successfully";
										  
										   
  }			 
		 
		 
if ($_POST["Submit"]=="Delete")
   {
	$sql = "delete from tb_style1 WHERE style_id=$_POST[style_id]";
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
<!DOCTYPE html>

<head>
<title>HOSTIA - ADMIN PANEL</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
<script language="javascript">
// function validate()
// 	{
		
// 	var f1=document.add_product;
	

// 	var imgpath = document.getElementById('image').value;
// 	<?php if($_REQUEST["bid"]<>"del") {?>
// 	if(imgpath=="")
// {
// alert("Invalid File Format Selected");
// return false;
// }
	<?php } ?>

if(imgpath != "")

{

// code to get File Extension..

var arr1 = new Array;

arr1 = imgpath.split("\\");

var len = arr1.length;

var img1 = arr1[len-1];

var filext = img1.substring(img1.lastIndexOf(".")+1);

// Checking Extension

if(filext == "jpg" || filext == "jpeg" || filext == "gif" || filext == "bmp" || filext == "png" || filext == "JPG" || filext == "JPEG" || filext == "GIF" || filext == "BMP" || filext == "PNG")

document.getElementById('imgUser').src = imgpath;

else

{

alert("Invalid File Format Selected");

return false;

}

}

	}
function check_pass(){
		var old_pass = document.frm_change_pass.old_pass.value;
		var new_pass = document.frm_change_pass.new_pass.value;
		var con_pass = document.frm_change_pass.con_pass.value;
		alert(old_pass);
		if(old_pass == ""){
			alert("Enter Old Password");
			document.frm_change_pass.old_pass.focus();
			return false;
		}
		if(new_pass == ""){
			alert("Enter New Password");
			document.frm_change_pass.new_pass.focus();
			return false;
		}
		if(con_pass == ""){
			alert("Enter Confirm Password");
			document.frm_change_pass.con_pass.focus();
			return false;
		}
		if(new_pass != con_pass){
			alert("New password and confirm password must be same.");
			document.frm_change_pass.new_pass.focus();
			return false;
		}
		
	}
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
</head>
<body onLoad="MM_preloadImages('images/back1.png','images/submit1.png','images/update1.png')">
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">

    <a href="#" class="logo">
        ADMIN PANEL
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

<div class="nav notify-row" id="top_menu">
    <!--  notification start -->
    <h2>HOSTIA</h2>
    <!--  notification end -->
</div>
<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        
        <!-- user login dropdown start-->
       <?php include("topc.php");?>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<?php include("left.php");?>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
<form class="form-horizontal bucket-form" action="admin1.php"  method="post" enctype="multipart/form-data" id="add_product" onSubmit="return validate();"  name="add_product">
	<section class="wrapper">
		<div class="table-agile-info">
		<!---728x90--->
  <div class="panel panel-default">
    <div class="panel-heading">
      UPDATE FLASH IMAGES
    </div>

	
			<form >
			<div class="panel-body">
                 <div class="form-group">
                        <label class="col-sm-3 control-label">Image</label>
                        <div class="col-sm-8">
                           <input type="hidden" name="style_type" value="<?php echo $_REQUEST["style_type"]; ?>" />
                                                    <input name="index" type="hidden" id="index" value="<?php echo $index; ?>" size="55" />
                                                    <input name="style_id" type="hidden" id="style_id" value="<?php echo $_REQUEST["style_id"]; ?>" />
                                                    <input name="img" type="hidden" id="img" value="<?php echo $_REQUEST["image"]; ?>" />
							<input type="file" name="image" id="image" class="form-control"/>
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
                " alt=""  border="1" /></span>
                        </div>
                    </div>
					<div class="form-group">
          <label class="col-sm-3 control-label">Content</label>
          <div class="col-sm-6">
                           <input type="hidden" name="style_type" value="<?php echo $_REQUEST["style_type"]; ?>" />
                                                    <input name="index" type="hidden" id="index" value="<?php echo $index; ?>" size="55" />
                                                    <input name="style_id" type="hidden" id="style_id" value="<?php echo $_REQUEST["style_id"]; ?>" />
                                                    <input name="img" type="hidden" id="img" value="<?php echo $_REQUEST["image"]; ?>" />
                                                    <!-- id="textarea1" -->
                                                    <textarea cols="50" rows="10"  name="adt_msg">
                                                    
                                                    <?php echo $_REQUEST["adt_des"]; ?>
                                                          </textarea>
                                                
                                                  
                        </div>
            </div>
						<div class="form-group">
						<label class="col-xs-12 " style="text-align:center;"><input name="Submit22" type="reset" class="btn btn-danger" value="Back"  onclick="location.replace('admin1.php')" />
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
                                                      <input name="Submit2" type="reset" class="btn btn-danger" value="Add New" onClick="location.replace('admin1.php?bid=sav')" />
                                                      <?php 
							
							} 
 

 
 ?>
                                                      <input name="Submit" type="reset" class="btn btn-danger" value="Reset" onClick="location.replace('admin1.php?bid=sav')" /></label></div>
						
						</div>
						
   </div>
    <footer class="panel-footer"  >
      <div class="row">
        
        <div class="text-center">
   <span class="style51"> <strong><br />
                                          &nbsp;UPDATED Adt IMAGES</strong><br />
                                          <br />
                                        </span>
                                        <table width="99%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#3366CC" bgcolor="#999999" style="border: solid 1px;   border-color:#999999;">
                                          <tr>
                                             <td width="25%" align="center" bgcolor="#FFFFFF" ><span class="style48">Image</span></td>
                                             <td width="25%" align="center" bgcolor="#FFFFFF" ><span class="style48">Content</span></td>
                                            <td colspan="2" align="center" bgcolor="#FFFFFF" class="style48"><div align="center">Action</div></td>
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
        <?php echo "<a href='admin1.php?bid=up&image=$imaged&adt_des=$adt_des&style_id=$style_id' target='_parent'>"; ?>
            <img src="images/up.png" alt="" />
        <?php echo "</a>"; ?>
    </span>
</td>
<td width="11%" align="center" valign="middle" bgcolor="#FFFFFF">
    <span class="style26">
        <?php echo "<a href='admin1.php?bid=del&image=$imaged&adt_des=$adt_des&style_id=$style_id' target='_parent'>"; ?>
            <img src="images/del.png" alt="" />
        <?php echo "</a>"; ?>
    </span>
</td>
                                          </tr>
                                          <?php
			  
			  }
			  			  ?>
                                      </table>
       
      </div>
    </footer>

  </div>
  <!---728x90--->
</div>
</section></form>
 <!-- footer -->
		  <div class="footer">
			<div class="wthree-copyright">
			  <p>© <?php echo date('Y'); ?> Admin Panel. All rights reserved <a href="#">HOSTIA</a></p>
			</div>
		  </div>
  <!-- / footer -->
</section>

<!--main content end-->
</section>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>

<script src="js/jquery.scrollTo.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.3.2/ckeditor.js" ></script>

<script>
var editor_config = {
    toolbar: [
        {name: 'basicstyles', items: ['Bold','Italic','Underline','Strike','-','RemoveFormat']},
        {name: 'format', items: ['Format']},
        {name: 'paragraph', items: ['Indent','Outdent','-','BulletedList','NumberedList']},
        {name: 'link', items: ['Link','Unlink']},
	{name: 'undo', items: ['Undo','Redo']}
    ],

};

CKEDITOR.replace('textarea1', editor_config );



</script>

</body>

</html>
<?php } ?>