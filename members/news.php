<?php 
$scr=1;
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
		echo $count;
	//header("location: index.php");
	//mysqli_close();
	
}
elseif($count==1)
{
mysqli_close($db);
include("../connection.php");

// get data 
	$desc1 = $_POST["desc1"];
	
	//add data
if ($_POST["Submit"]=="Add"){


				 	$sql= "INSERT INTO tb_news(desce)VALUES('$desc1')";
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
                                    if (!mysqli_query($db,$sql))
                                                  { die('Error: ' . mysqli_error());}
                                           else $msg= "Record is Updated Successfully";
										  
										   
  }			 
if ($_POST["Submit"]=="Delete")
   {
 	$sql = "delete from tb_news WHERE style_id=$_POST[style_id]";
                                    if (!mysqli_query($db,$sql))
                                                  { 
												  echo $delk;
												  die('Error:' . mysqli_error());
												  
												  }
                                           else $msg= "Record is Delete Successfully";
										   
  }										   
   		 
$cc= mysqli_query($db,"Select *from  tb_news"); //check how many records exists in the database
  $count_mem=mysqli_num_rows($cc);
   
   if ($count_mem==0)
    { 
	$index=1;
	
	
	}
	else
	  { 
	   $index=$count_mem+1;
	   
      }
	 $tbn="1"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">

<title> TN- UWDFA Admin Panel </title>
<meta name="description" content="">

<meta name="viewport" content="width=device-width">

<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap-responsive.css">
<link rel="stylesheet" href="css/jquery.fancybox.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/style2.css">
<style type="text/css">
<!--


.style16 {color: #FF0033}
.style26 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; }
.style38 {font-family: Verdana, Arial, Helvetica, sans-serif}
.style39 {color: #FF0033;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
}
.style41 {font-size: 9px}
.style42 {
    font-size: 18px;
    font-weight: 600;

}

@media (max-width: 767px){
  .style42 {
    font-size: 17px;
    font-weight: 600;
    line-height: 20px;
}
input.button {color:#055;
    color: #f7f7f7;
    font-family: 'trebuchet ms',helvetica,sans-serif;
    font-size: 74%;
    font-weight: bolder;
    background-color: #2b50d7;
    width: 20%!important;
    border: 1px solid;
    border-top-color: #7699Cc;
    border-left-color: #7699Cc;
    border-right-color: #7699Cd;
    border-bottom-color: #7699Cc;
    padding: 9px 0px;
   filter:progid:DXImageTransform.Microsoft.Gradient
   (GradientType=0,StartColorStr='#ffffffff',EndColorStr='#7699Cc');
}
}

.style48 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; color: #333333; line-height: 30px; font-weight: bold; }
.style51 {color: #3366CC}
/*span{
  text-align: center;
}*/
input.button {color:#055;
    color: #f7f7f7;
    font-family: 'trebuchet ms',helvetica,sans-serif;
    font-size: 74%;
    font-weight: bolder;
    background-color: #2b50d7;
    width: 10%;
    border: 1px solid;
    border-top-color: #7699Cc;
    border-left-color: #7699Cc;
    border-right-color: #7699Cd;
    border-bottom-color: #7699Cc;
    padding: 9px 0px;
   filter:progid:DXImageTransform.Microsoft.Gradient
   (GradientType=0,StartColorStr='#ffffffff',EndColorStr='#7699Cc');
}



.style52 {
	color: #FFFFFF;
	font-size: 18px;
	font-weight: bold;
}
.style18 {font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 13px;
	font-weight: bold;
}
.style54 {font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 15px;
}

</style>
<script language="javascript">
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
    <script src="../nicEdit.js" type="text/javascript"></script>
<script type="text/javascript">
bkLib.onDomLoaded(function() {
	new nicEditor({fullPanel : true}).panelInstance('desc1');
});
</script>
</head>
<body onLoad="MM_preloadImages('images/submit1.png')">

					

<div class="topbar">
  <div class="container-fluid">
		<a href="#" class='company warningTextareaInfo warningTextareaInfo'> </a>
		<ul class='mini'>
		  <li></li>
			<li>
				<a href="logout.php">
					<img src="images/control-power.png" alt="">
					Logout				</a>			</li>
		</ul>
  </div>
</div>

<div class="main">
	<div class="container-fluid">
	
	<div class="content">
			<div class="row-fluid no-margin">
				<div class="span12"><br>
				  <div class="tab-content default-tab" id="tab1">
                    <!-- This is the target div. id must match the href of this div's tab -->
                    <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#EBEBEB">
                    
                      <tr>
                          <tr width="100%">
                        <td style="text-align: center;font-size: 25px;font-weight: 600; padding-bottom: 10px;text-transform: uppercase;">Update Flash News</td>
                      </tr>
                        <td colspan="2" valign="top" bgcolor="#FFFFFF"><table width="100%"  height="292" border="0" cellpadding="0" cellspacing="0" >
                            <tr>
                              <td height="270" align="left" valign="top" bgcolor="#FFFFFF"><table width="100%" height="171" border="0" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td height="171" valign="top" bgcolor="#FFFFFF"><form action="news.php" method="post" enctype="multipart/form-data" id="style" onSubmit="return Blank_TextField_Validator()">
<br>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
                                          <tr >
                                            <td width="18%" align="right" class="style38 style42">Flash News</td>
                                            <td width="7%" align="center" class="style38 style42">:</td>
                                            <td width="75%" class="style38 style42 style42 style38 style42 style42"><?php
			if($_REQUEST["Submit"]=="Update" ||  $_REQUEST["Submit"]=="Add" || $_REQUEST["bid"]=="up" || $_REQUEST["bid"]=="del")
			{
				$cc= mysqli_query($db,"Select * from tb_news where style_id='".$_REQUEST["style_id"]."'");
				$result11=mysqli_fetch_array($cc);
				$dec=$result11["desce"];
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
                                              </span> </td>
                                  </tr>
                                     <!--      <tr>
                                            <td class="codefont style38 style42 style42">&nbsp;</td>
                                            <td align="center" class="headline style38 style42 style42">&nbsp;</td>
                                            <td class="codefont"><span class="style39 style41 style38 style42"><?php echo  $msg; ?></span></td>
                                          </tr> -->
                                          <tr>
                                            <td height="41" colspan="3" align="center" class="codefont style38 style42 style42">
                                                <?php if($_REQUEST["bid"]=="up")
 { ?>
                                                <input name="Submit" type="submit" class="button" id="Submit" value="Update" />
                                                <?php
							}
							 else if($_REQUEST["bid"]=="del")
							 {
							?>
                                                <input name="Submit" type="submit" class="button" id="Submit" value="Delete" />
                                         <?php
										 }
										 ?>     
                                            </td>
                                          </tr>
                                        </table>
                                    </form></td>
                                  </tr>
                                </table>
                                  <!-- <span class="style51"> &nbsp;<span class="style18">&nbsp;Flash News</span> <br /> -->
                                    <br />
                                  </span>
                                  <table width="99%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#999999" bgcolor="#999999" style="border: 1px solid;  border-color:#999999;">
                                    <tr>
                                      <td height="19" align="center" bgcolor="#FFFFFF" ><div align="center"><span class="style48">&nbsp; Description</span></div></td>
                                      <td align="center" bgcolor="#FFFFFF" class="style48">Update</td>
                                    </tr>
                                    <?php 
  $result = mysqli_query($db,"SELECT * FROM tb_news order by style_id");
$i=1; 
while($row = mysqli_fetch_array($result))
  {
  extract( $row );
			  ?>
                                    <tr>
                                      <td height="32" align="left"  class="generalfont" ><div align="left" style="margin-left:10px;padding:10px; "><span class="style54" style="color: white;background: black;padding:5px;line-height: 25px;">&nbsp;<?php echo $desce; ?></span></div></td>
                                      <td align="center" bgcolor="#FFFFFF" class="hide_btn1" width="25%"><span class="style26" style="font-size:15px; font-weight:bold;background: green;
    padding: 10px;
    color: white;"><?php echo "<a href = 'news.php?bid=up&style_id=$style_id' target=_parent style=color:white;> Click Here To Edit </a>"; ?></span> </td>

<td align="center" bgcolor="#FFFFFF" class="hide_btn"><span class="style26" style="font-size:15px; font-weight:bold;background: green;
    padding: 10px;
    color: white;
    "><?php echo "<a href = 'news.php?bid=up&style_id=$style_id' target=_parent style=color:white;margin-top:30px;> Edit </a>"; ?></span> </td>

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
	  </div>
			
	  </div>
	</div>
</div>	
<p>&nbsp;</p>
<p>
  <script src="js/jquery.js"></script>
  <script src="js/less.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.peity.js"></script>
  <script src="js/jquery.fancybox.js"></script>
  <script src="js/jquery.flot.js"></script>
  <script src="js/jquery.color.js"></script>
  <script src="js/jquery.flot.resize.js"></script>
  <script src="js/jquery.cookie.js"></script>
  <script src="js/jquery.cookie.js"></script>
  <script src="js/custom.js"></script>
  <script src="js/demo.js"></script>
</p>
</body>

</html>
<?php } ?>