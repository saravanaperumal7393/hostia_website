<?php 
error_reporting(0);
ob_start();
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
mysqli_close();
include("../connection.php");
//include("../resize.php"); 

$image_path = "water.png";
$image_path1 = "strip.png";
$water_mark_text_2 = $_REQUEST["pdt_name"];
$font_path = "trebuc.ttf";
$font_size = 35;
function watermark_image($oldimage_name, $new_image_name, $ext){
    global $image_path,$font_path, $font_size, $water_mark_text_1, $water_mark_text_2,$image_path1;
    list($owidth,$oheight) = getimagesize($oldimage_name);
	
	list($image_width, $image_height) = getimagesize($oldimage_name);
	$width = $height = 1400;  
		//if($image_width>$width || $image_height >$height){
			$proportions = $image_width/$image_height;
			
			if($image_width>$image_height){
				if($image_width<$width) 
				{
				$new_width=$image_width;
				$new_height=$image_height;
				}
				else
				{
				 $new_width = $width;
				 $new_height = round($width/$proportions);
				}
				
			}		
			else{
				if($image_height<$height) {
					 $new_height=$image_height;
					 $new_width=$image_width;
				}
				else {
					$new_height = $height;
				$new_width = round($height*$proportions);
				}
			}	
	
     $im = imagecreatetruecolor($new_width, $new_height);
	 if($ext=="jpeg" or $ext=="jpg"  or $ext=="JPEG" or  $ext=="JPG")
    $img_src = imagecreatefromjpeg($oldimage_name);

	elseif($ext=="png" or $ext=="PNG")
	 $img_src = imagecreatefrompng($oldimage_name);
	 
	 elseif($ext=="gif" or $ext=="GIF")
	 $img_src = imagecreatefromgif($oldimage_name);

	 
	 
    imagecopyresampled($im, $img_src, 0, 0, 0, 0, $new_width, $new_height, $owidth, $oheight);
    $watermark = imagecreatefrompng($image_path);
    list($w_width, $w_height) = getimagesize($image_path);  
	//$watermark1 = imagecreatefrompng($image_path);
  //  list($w_width, $w_height) = getimagesize($image_path);
	$blue = imagecolorallocate($im, 0, 0, 0);
	//$yy=($new_height/2)-100;
//	$xx=($new_width-149)/2;
   // imagettftext($image, $font_size, 0, 30, 190, $black, $font_path, $water_mark_text_1);
  // 	imagecopy($im, $watermark1, $xx, $yy, 0, 0, $w_width, $w_height);
  //  imagettftext($im, $font_size, 0, 280, 655, $blue, $font_path, $water_mark_text_2);      
    $pos_x = $new_width - $w_width; 
    $pos_y = $new_height - $w_height;
   // imagecopy($im, $watermark, $pos_x, $pos_y, 0, 0, $w_width, $w_height);
   if($ext=="jpeg" or $ext=="jpg"  or $ext=="JPEG" or $ext=="JPG")
    imagejpeg($im, $new_image_name, 80);

	elseif($ext=="png" or $ext=="PNG")
	imagejpeg($im, $new_image_name, 80);
 
	elseif($ext=="gif" or $ext=="GIF")
	imagegif($im, $new_image_name, 80);
  
    imagedestroy($im);
    unlink($oldimage_name);
		//}
    return true;
}

if(isset($_REQUEST['add_x'])){

 $demo_image= "";
 $path = "products/";
    $valid_formats = array("jpg",  "bmp","jpeg");
	$name = $_FILES['imgfile']['name'];
	if(strlen($name))
{
  // list($txt, $ext) = explode(".", $name);
   $ext = pathinfo($name, PATHINFO_EXTENSION);
   if(in_array($ext,$valid_formats)&& $_FILES['imgfile']['size'] <= 1256*1024)
	{
    $upload_status = move_uploaded_file($_FILES['imgfile']['tmp_name'], $path.$_FILES['imgfile']['name']);
    if($upload_status){
        $new_name = $path.time().".".$ext;
        if(watermark_image($path.$_FILES['imgfile']['name'], $new_name, $ext))
                $demo_image = $new_name;
								//if(watermark_text($demo_image, $new_name))
               // $demo_image = $new_name;
        // $path1=makeimage($demo_image,'thumbnail_','thumbnail/',400,519);       
    }
	}
	else
	$msg="File size Max 1256 KB or Invalid file format supports .jpg and .bmp";
	}


$pdrate=0;
if($_REQUEST["pdt_rate"]==""){
	$pdrate=0;
}
else{
$pdrate=$_REQUEST["pdt_rate"];}
	
$intQuery="insert into tbl_product(cat_id,subcat_id,Product_name,Product_desc,Product_type,Product_rate,thumb_image,Product_image,Product_status)values(".$_REQUEST["catid"].",".$_REQUEST["subcatid"].",'".mysqli_real_escape_string($db,$_REQUEST["pdt_name"])."','".mysqli_real_escape_string($db,$_REQUEST["pdt_desc"])."',".$pdrate.",'".mysqli_real_escape_string($db,$_REQUEST["pdt_type"])."','".mysqli_real_escape_string($db,$demo_image)."','".mysqli_real_escape_string($db,$demo_image)."',".$_REQUEST["pdt_new"].")";

mysqli_query($db,$intQuery);

$lid=mysqli_insert_id($db);
$cat_id=$_REQUEST["catid"];
$subcat_id=$_REQUEST["subcatid"];

	$intQuerys="insert into tbl_images(Product_id,Product_image,thumb_image)values(".$lid.",'".$demo_image."','". $demo_image."')";
mysqli_query($db,$intQuerys);
$sqlQuery="insert into keywords(pid,keywords)values(".$lid.",'".mysqli_real_escape_string($db,$_REQUEST["pdt_name"])."')";
	mysqli_query($db,$sqlQuery);

	$sqlQuery="insert into keywords(pid,keywords)values(".$lid.",'".mysqli_real_escape_string($db,$_REQUEST["subcatname"])."')";
	mysqli_query($db,$sqlQuery);
	$sqlQuery="insert into keywords(pid,keywords)values(".$lid.",'".mysqli_real_escape_string($db,$_REQUEST["catname"])."')";
	mysqli_query($db,$sqlQuery);

$mss=1;
header("Location:add_product.php?catid=".$_REQUEST["catid"]."&subcatid=".$_REQUEST["subcatid"]."&catname=".$_REQUEST["catname"]."&subcatname=".$_REQUEST["subcatname"]."&msg=success");
//header("Location:uploadimage.php?catid=".$_REQUEST["catid"]."&subcatid=".$_REQUEST["subcatid"]."&pid=".$lid);
ob_end_flush();
}

if($_REQUEST["catid"] && $_REQUEST["subcatid"] && $_REQUEST["pdt_id"]!=""){
$sel="select * from tbl_product where  product_id='".$_REQUEST["pdt_id"]."' and cat_id='".$_REQUEST["catid"]."' and subcat_id='".$_REQUEST["subcatid"]."'";
$result=mysqli_fetch_array(mysqli_query($db,$sel));
if($_REQUEST["update_x"]){
	


$pdrate=0;
if($_REQUEST["pdt_rate"]==""){
	$pdrate=0;
}
else{
$pdrate=$_REQUEST["pdt_rate"];}

if($_FILES["image_file1"]["name"]=="")
{

$update="update tbl_product set Product_name='".mysqli_real_escape_string($db,$_REQUEST["pdt_name"])."',Product_desc='".mysqli_real_escape_string($db,$_REQUEST["pdt_desc"])."',Product_rate=".$pdrate.",Product_status=".$_REQUEST["pdt_new"]." where product_id=".$_REQUEST["pdt_id"]." and cat_id=".$_REQUEST["catid"]." and subcat_id=".$_REQUEST["subcatid"]."";


}
else
{
	$res1 = mysqli_fetch_array(mysqli_query($db,"SELECT * FROM tbl_product WHERE product_id=".$_REQUEST["pdt_id"].""));
		unlink($res1["Product_image"]);
		unlink($res1["thumb_image"]);
	
$demo_image="";
$path = "products/";
    $valid_formats = array("jpg","bmp","jpeg","png","gif");
	$name = $_FILES['image_file1']['name'];
	if(strlen($name))
{
  // list($txt, $ext) = explode(".", $name);
   $ext = pathinfo($name, PATHINFO_EXTENSION);
   if(in_array($ext,$valid_formats)&& $_FILES['image_file1']['size'] <= 1256*1024)
	{
    $upload_status = move_uploaded_file($_FILES['image_file1']['tmp_name'], $path.$_FILES['image_file1']['name']);
    if($upload_status){
        $new_name = $path.time().".".$ext;
        if(watermark_image($path.$_FILES['image_file1']['name'], $new_name, $ext))
                $demo_image = $new_name;
		
                
    }
	}
	else
	$msg="File size Max 1256 KB or Invalid file format supports .jpg and .bmp";
	}

//$path1=makeimage($demo_image,'thumbnail_','thumbnail/',400,519);
	
	

$update="update tbl_product set Product_name='".mysqli_real_escape_string($db,$_REQUEST["pdt_name"])."',Product_desc='".mysqli_real_escape_string($db,$_REQUEST["pdt_desc"])."',Product_rate=".$pdrate.",thumb_image='".mysqli_real_escape_string($db,$demo_image)."',Product_image='".mysqli_real_escape_string($db,$demo_image)."',Product_status=".$_REQUEST["pdt_new"]." where product_id='".$_REQUEST["pdt_id"]."' and cat_id='".$_REQUEST["catid"]."' and subcat_id='".$_REQUEST["subcatid"]."'";


$sqla="select * from tbl_images where Product_id=".$_REQUEST["pdt_id"]."";
			 $resulta=mysqli_query($db,$sqla);
			 $num=1;
			 while($db_fielda = mysqli_fetch_array($resulta))
			 
			 {
				 
				  $iid=$db_fielda["image_id"];
			 break;
			 }
$updates="update tbl_images set Product_image='".$demo_image."',thumb_image='".$demo_image."' where image_id=".$iid."";
mysqli_query($db,$updates);

}
mysqli_query($db,"delete from keywords where pid=".$_REQUEST["pdt_id"]."");


		
$sqlQuery="insert into keywords(pid,keywords)values(".$_REQUEST["pdt_id"].",'".mysqli_real_escape_string($db,$_REQUEST["pdt_name"])."')";
	mysqli_query($db,$sqlQuery);

	$sqlQuery="insert into keywords(pid,keywords)values(".$_REQUEST["pdt_id"].",'".mysqli_real_escape_string($db,$_REQUEST["subcatname"])."')";
	mysqli_query($db,$sqlQuery);
$sqlQuery="insert into keywords(pid,keywords)values(".$_REQUEST["pdt_id"].",'".mysqli_real_escape_string($db,$_REQUEST["catname"])."')";
	mysqli_query($db,$sqlQuery);
								mysqli_query($db,$update);
							
header("location:manage_product.php?cat_id=".$_REQUEST["catid"]."&subcat_id=".$_REQUEST["subcatid"]."&catname=".$_REQUEST["catname"]."&subcatname=".$_REQUEST["subcatname"]);
		}
		
		}
		
if($_REQUEST["action"]=="delete")
	{
	$dele="delete from tbl_images where image_id='".$_REQUEST["i_id"]."'";
	mysqli_query($db,$dele);
	$msg="Image Deleted Successfully";
	
	}		
$productselect = "select * from tbl_product where cat_id='".$_REQUEST["cat_id"]."' and subcat_id='".$_REQUEST["subcat_id"]."' $whereclause order by Product_name asc";

	$arr="1";

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
<script type="text/javascript" language="javascript">
function deletemember(pid)
{
	if(confirm("Are you Sure to Delete?"))
	{
					
				window.location.href	= "add_product.php?action=delete&i_id="+pid+"&catid=<?php echo $_REQUEST["catid"];?>&subcatid=<?php echo $_REQUEST["subcatid"];?>&subcatname=<?php echo $_REQUEST["subcatname"];?>&catname=<?php echo $_REQUEST["catname"];?>&pdt_id=<?php echo $_REQUEST["pdt_id"];?>#delimg";
	
	}

				

			
	
}
</script>
<script type="text/javascript" language="javascript">
	function redirect_page(){
		window.location.href = 'manage_product.php?cat_id=<?php echo $_REQUEST["catid"];?>&subcat_id=<?php echo $_REQUEST["subcatid"]?>&catname=<?php echo $_REQUEST["catname"];?>&subcatname=<?php echo $_REQUEST["subcatname"];?>';
	}
	function validate()
	{
	var f1=document.add_product;
	if(f1.pdt_name.value=="")
	{
	alert("Please Enter Product Name");
	f1.pdt_name.focus();
	return false;
	}
	
	
<?php if($_REQUEST["pdt_id"]=="")
										  {
?>
	var imgpath = document.getElementById('imgfile').value;
	if(imgpath=="")
{
alert("Invalid File Format Selected");
return false;
}
	<?php } else {?>
	var imgpath = document.getElementById('image_file1').value;
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
<?php if($_REQUEST["pdt_id"]=="")
										  {
?>

document.getElementById('imgfile').value = "";
<?php } else {?>
	var imgpath = document.getElementById('image_file1').value;
	<?php } ?>

return false;

}

}

	}
	</script>
	<style type="text/css">
<!--
.style1 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 18px;
	font-weight: bold;
}
.style3 {	font-family: Arial, Helvetica, sans-serif;
	font-size: 13px;
	color: #000000;
}
.style2 {
	font-size: 12px;
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
}
.style7 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 13px;
}
.style8 {font-size: 13px}
.style19 {
	font-size: 12px;
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #FF0000;
}
.style21 {font-size: 12px}
-->
    </style>
	
    <script type="text/javascript">
<!--
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
//-->
</script>
<script src="../nicEdit.js" type="text/javascript"></script>
<script type="text/javascript">
bkLib.onDomLoaded(function() {
	new nicEditor({fullPanel : true}).panelInstance('pdt_desc');
});
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
<form class="form-horizontal bucket-form" method="post" enctype="multipart/form-data" name="add_product" onSubmit="return validate();">
	<section class="wrapper">
		<div class="table-agile-info">
		<!---728x90--->
  <div class="panel panel-default">
    <div class="panel-heading">
      Edit New Arrivals
    </div>
    <div class="row w3-res-tb">
	 <div class="col-sm-12 m-b-xs"><p style="text-align:center;font-size:20px;color:#82072e;"><?php echo $_REQUEST["subcatname"];?></p></div>
      <div class="col-sm-12 m-b-xs">
     
        <a href="manage_subcategory.php?cat_id=<?php echo $_REQUEST["catid"];?>&catname=<?php echo $_REQUEST["catname"];?>&subcatname=<?php echo $_REQUEST["subcatname"];?>">Manage New Arrivals</a> >> <a href="manage_product.php?cat_id=<?php echo $_REQUEST["catid"];?>&subcat_id=<?php echo $_REQUEST["subcatid"];?>&subcatname=<?php echo $_REQUEST["subcatname"];?>&catname=<?php echo $_REQUEST["catname"];?>">Manage Arrivals</a> >> Edit New Arrivals
         
               
      </div>
    
    </div>
	<?php if($mss=="1" or $_REQUEST["msg"]=="success"){?>
       <center>     <span class="style16">Product Added Successfully</span>
	      <br>
                                <strong><a href="uploadimage.php?catid=<?php echo $cat_id;?>&subcatid=<?php echo $subcat_id;?>&pid=<?php echo $lid;?>">Upload More Images Click Here</a></strong><br>
           </center>
            <?php } ?>
			<form >
			<div class="panel-body">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Product Name</label>
                        <div class="col-sm-8">
                           
							<input type="text" name="pdt_name" id="pdt_name" value="<?php if($_REQUEST["pdt_id"])  echo $result["Product_name"];?>" class="form-control">
                        </div>
                    </div>

                     <div class="form-group" >
                        <label class="col-sm-3 control-label">Product Type</label>
                        <div class="col-sm-3">
                           
                        	<select name="pdt_type" id="pdt_type" class="form-control">
 								 <option value="volvo">1 Box</option>
 								 <option value="saab">1 PKTS</option>
 								 <option value="mercedes">Pieces</option>
									 
							</select>

							
                        </div>
                    </div>

					 <div class="form-group" >
                        <label class="col-sm-3 control-label">Old Price</label>
                        <div class="col-sm-2">
                           
							<input type="number" name="pdt_old" id="pdt_old"id="pdt_rate" value="<?php if($_REQUEST["pdt_id"])  echo $result["Product_old"];?>" class="form-control">
                        </div>
                    </div>
					  <div class="form-group" >
                        <label class="col-sm-3 control-label">New Price</label>
                        <div class="col-sm-2">
                           
							<input type="number" name="pdt_rate"  id="pdt_rate" value="<?php if($_REQUEST["pdt_id"])  echo $result["Product_rate"];?>" class="form-control">
                        </div>
                    </div>
					
				
				
					<div class="form-group" style="display: none;">
                        <label class="col-sm-3 control-label">Set As New Arrival</label>
                        <div class="col-sm-8">
                           
							<select class="form-control text-capitalize" name="pdt_new" id="pdt_new" style="float:left;margin-right:10px;width:10%;min-width:90px;">
  <option <?php if($_REQUEST["pdt_id"]) { if($result["Product_status"]=="0"){ ?>selected<?php } } ?> value="0">NO</option>  
  <option value="1" <?php if($_REQUEST["pdt_id"]) {  if($result["Product_status"]=="1"){ ?>selected<?php }} ?> >YES</option>
  
  </select>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-3 control-label">Product Image</label>
                        <div class="col-sm-8">
                           <?php if($_REQUEST["pdt_id"]=="")
										  {
?>
                                                <input name="imgfile" type="file" id="imgfile">
                                              <?php }
else
{
?>
                                            <input name="image_file1" type="file" id="image_file1">
                                             <br>
<br>
<strong><a href="uploadimage.php?catid=<?php echo $_REQUEST["catid"];?>&subcatid=<?php echo $_REQUEST["subcatid"];?>&pid=<?php echo $_REQUEST["pdt_id"];?>">Upload More Images Click Here</a></strong>
                                                <?php }?>
                                              <span class="style19">&nbsp;&nbsp;(Max Image Size is 1 MB)</span>
                        </div>
                    </div>
   </div>
    <footer class="panel-footer"  >
      <div class="row">
        
        <div class="col-sm-12 text-center">
       <div align="center">
                                        <?php if($_REQUEST["catid"] && $_REQUEST["subcatid"] && $_REQUEST["pdt_id"]==""){?>
                                          <a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('add','','images/submit1.png',1)">
                                            <input type="image" name="add" id="add" src="images/submit.png"  style="margin-bottom:-5px;"/>
                                        </a>
                                          <?php } else { ?>
                                          <a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('update','','images/update1.png',1)">
                                            <input type="image" name="update" id="update" src="images/update.png" style="margin-bottom:-5px;"/>
                                          </a>
                                          <?php } ?>
                                        &nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image2','','images/back1.png',1)"><img src="images/back.png" name="Image2" width="100" height="21" border="0" id="Image2" onClick="return redirect_page();"/></a></div>
        </div>
       
      </div>
    </footer><a name="delimg"></a>
	<div class="row" style="margin-left:15px;margin-right:15px;">
	<div class="col-xs-12" style="text-align:center;"><br/><br/><strong>Product IMAGES</strong><br/><br/><br/></div>
	<?php 
			$productselect = "select * from tbl_images where Product_id='".$_REQUEST["pdt_id"]."' order by Product_id";

	$result = mysqli_query($db,$productselect);	
			require_once("pageList.php");
			$row = mysqli_fetch_array($result);
			$total_records = mysqli_num_rows(mysqli_query($db,$productselect));
			$records_per_page = 100; // no of records per page
			$current_page_no = 1;
			if ($_REQUEST['page'])
			{
				$current_page_no = $_REQUEST['page'];
			} 
			$pageL = new pageList($total_records, $records_per_page, $current_page_no);
			$pageL->generate();
			if($total_records !=0)
			{
			  $productselect2=$productselect." LIMIT $pageL->startRecord,$pageL->numOfRows";				
			  $productquery=mysqli_query($db,$productselect2);
			  $serial=$pageL->startRecord;
			  
			  $s=1; 
			if($_REQUEST['page']){
				$p = $_REQUEST['page']-1;
				$i = $p*$records_per_page;
			}
			else{
				$i = 0;
			}
			$k=1;
	while($cat_det = mysqli_fetch_array($productquery)){$i++;?>
	
	<div class="col-xs-6 col-sm-4 col-md-3" style="text-align:center;margin-bottom:20px;">
						<div style="box-shadow: 1px -1px 5px 2px #00000078;">
					
							
								<img src="<?php echo $cat_det["thumb_image"];?>" alt="" class="img-responsive"/>
								
							
							
						
						<div style="background: #eee5ff; padding: 5px;">
									
									<p >&nbsp; <a <?php if($k==1){?>style="display:none;"<?php } ?> href="javascript:deletemember('<?php echo $cat_det['image_id'];?>');"><img src="images/delete.png" width="20" height="20" border="0" alt=""><span class="style6">Delete</span></a></p>
						</div>
						</div>
					</div>
					 <?php $k++;}} ?>
					 <?php if($total_records<=0){?>
                                                    <div align="center" class="style31" style="color:#FF0000;">No Images Available </div>
                                                      <?php }?>
	</div>
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
</body>

</html>
<?php } ?>