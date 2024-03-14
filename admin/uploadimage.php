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
		echo $count;
	//header("location: index.php");
	//mysqli_close();
	
}
elseif($count==1)
{
mysqli_close($db);
include("../connection.php");
$sql6="select cat_name from tbl_category where cat_id=".$_REQUEST["catid"]." ";
			 $result6=mysqli_query($db,$sql6);
			 while($db_field6 = mysqli_fetch_array($result6))
			 {
				 $catname=$db_field6["cat_name"];
			 }

$sql6="select subcat_name from tbl_subcategory where subcat_id=".$_REQUEST["subcatid"]." ";
			 $result6=mysqli_query($db,$sql6);
			 while($db_field6 = mysqli_fetch_array($result6))
			 {
				 $subcatname=$db_field6["subcat_name"];
				 
			 }
$sql6="select Product_name from tbl_product where Product_id=".$_REQUEST["pid"]." ";
			 $result6=mysqli_query($db,$sql6);
			 while($db_field6 = mysqli_fetch_array($result6))
			 {
				 $pdtname=$db_field6["Product_name"];
			 }

$mp="1";
$a="products";
$pid=$_GET['pid'];
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
<link href="css/uploadfilemulti.css" rel="stylesheet">
<!--<script src="js/jquery-1.8.0.min.js"></script>-->
<script src="js/jquery.fileuploadmulti.min.js"></script>
<script type="text/javascript" language="javascript">
	function redirect_page(){
		window.location.href = 'manage_product.php?cat_id=<?php echo $_REQUEST["catid"];?>&subcat_id=<?php echo $_REQUEST["subcatid"]?>&catname=<?php echo $catname;?>&subcatname=<?php echo $subcatname;?>';
	}
	function validate()
	{
	var f1=document.add_product;
	if(f1.pdt_name.value=="")
	{
	alert("Please Enter Product Amount");
	f1.pdt_name.focus();
	return false;
	}
	if(f1.pdt_code.value=="")
	{
	alert("Please Enter Product Code");
	f1.pdt_code.focus();
	return false;
	}

	var imgpath = document.getElementById('image_file').value;
if(imgpath=="")
{
alert("Invalid File Format Selected");
return false;
}
if(imgpath != "")

{

// code to get File Extension..

var arr1 = new Array;

arr1 = imgpath.split("\\");

var len = arr1.length;

var img1 = arr1[len-1];

var filext = img1.substring(img1.lastIndexOf(".")+1);

// Checking Extension

if(filext == "jpg" || filext == "jpeg" || filext == "gif" || filext == "bmp" || filext == "png")

document.getElementById('imgUser').src = imgpath;

else

{

alert("Invalid File Format Selected");

document.getElementById('image_file').value = "";

return false;

}

}

	}
	</script>

	
    <script type="text/javascript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
//-->
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
    <div class="panel-heading" style="font-size:13px;">
      Upload More <?php echo $pdtname;?> Images 
    </div>
    <div class="row w3-res-tb">
	 
      <div class="col-sm-12 m-b-xs" style="float:right;">
     <a href="add_product.php?catid=<?php echo $_REQUEST["catid"];?>&subcatid=<?php echo $_REQUEST["subcatid"];?>&pdt_id=<?php echo $_REQUEST["pid"];?>&catname=<?php echo $catname;?>&subcatname=<?php echo $subcatname;?>">Back</a>
     <!--   <a href="manage_category.php">Manage Category</a> >> <a href="manage_subcategory.php?cat_id=<?php echo $_REQUEST["catid"];?>&catname=<?php echo $catname;?>&subcatname=<?php echo $subcatname;?>">Manage Sub Category</a> >> <a href="manage_product.php?cat_id=<?php echo $_REQUEST["catid"];?>&subcat_id=<?php echo $_REQUEST["subcatid"];?>&subcatname=<?php echo $subcatname;?>&catname=<?php echo $catname;?>">Manage Product</a> >> <a href="add_product.php?catid=<?php echo $_REQUEST["catid"];?>&subcatid=<?php echo $_REQUEST["subcatid"];?>&pdt_id=<?php echo $_REQUEST["pid"];?>&catname=<?php echo $catname;?>&subcatname=<?php echo $subcatname;?>"><?php echo $pdtname;?></a> >> Upload Images
         
               -->
      </div>
   
    </div>
	
			<form >
			<div class="panel-body">
                 <div id="mulitplefileuploader">Upload</div>
	        <div id="status"></div>
<script>

$(document).ready(function()
{

var settings = {
	url: "upload.php",
	method: "POST",
	allowedTypes:"jpg,jpeg,png,gif",
	fileName: "myfile",
	formData: {"pid":"<?php echo $pid?>"},
	multiple: true,
	onSuccess:function(files,data,xhr)
	{
		$("#status").html("<font color='green'>Upload is success</font>");
		
	},
    afterUploadAll:function()
    {
        alert("all images uploaded!!");
    },
	onError: function(files,status,errMsg)
	{		
		$("#status").html("<font color='red'>Upload is Failed</font>");
	}
}
$("#mulitplefileuploader").uploadFile(settings);

});
</script>
   </div>
    <footer class="panel-footer"  >
      <div class="row">
        
        <div class="col-sm-12 text-center">
   
       
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
</body>

</html>
<?php } ?>