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

if(isset($_REQUEST['add_x'])){
if($_REQUEST["cat_name"]=="")
{
header("Location:add_category.php?msg=fail");
}
else
{
	$sel1="select max(cat_id) as suid from tbl_category";
	$result1=mysqli_fetch_array(mysqli_query($db,$sel1));
	$suid=$result1["suid"]+1;
	$sel2="select max(sortid) as sid from tbl_category";
	$result2=mysqli_fetch_array(mysqli_query($db,$sel2));
	$sid=$result2["sid"]+1;
$intQuery="insert into tbl_category(cat_name,cat_status,cat_id,sortid)values('".mysqli_real_escape_string($db,$_REQUEST["cat_name"])."','1',".$suid.",".$sid.")";
mysqli_query($db,$intQuery);
header("Location:add_category.php?msg=success");
}
}
if($_REQUEST["cat_id"] !=""){
$sel="select * from tbl_category where cat_id='".$_REQUEST["cat_id"]."'";
$result=mysqli_fetch_array(mysqli_query($db,$sel));
if($_REQUEST["update_x"]){

$update="update tbl_category set cat_name='".mysqli_real_escape_string($db,$_REQUEST["cat_name"])."' where cat_id='".$_REQUEST["cat_id"]."'";
								mysqli_query($db,$update);
header("location:manage_category.php");
		}
		}


		$mp="1";
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
function redirect_page(){
		window.location.href = 'manage_category.php';
	}
	function validate()
	{
	var f1=document.add_product;
	if(f1.cat_name.value=="")
	{
	alert("Please Enter Cateogry Name");
	f1.pdt_name.focus();

	}
	}
	</script>
<SCRIPT LANGUAGE="JavaScript">
function SetChecked(val)

{

   ptr=document.manage_content;

  len=ptr.elements.length;

  var i=0;

  for(i=0; i<len; i++)

	if (ptr.elements[i].name=='catid[]')



	   ptr.elements[i].checked=val;

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
<form class="form-horizontal bucket-form" method="post" enctype="multipart/form-data" name="add_product" onSubmit="return validate();">
	<section class="wrapper">
		<div class="table-agile-info">
		<!---728x90--->
  <div class="panel panel-default">
    <div class="panel-heading">
      Add/Edit Category
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-12 m-b-xs">
     
       <a href="manage_category.php">Manage Category</a> >> Add Category
         
               
      </div>
     
    </div>
	 <?php if($_REQUEST["msg"]=="success"){?>
       <center>     <span class="style16">Category Added Successfully</span>
           </center>
            <?php } ?>
			<form >
			<div class="panel-body">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Category Name</label>
                        <div class="col-sm-6">
                           
							<input type="text" name="cat_name" id="cat_name" value="<?php echo $result["cat_name"];?>" class="form-control">
                        </div>
                    </div>
   </div>
    <footer class="panel-footer"  >
      <div class="row">
        
        <div class="col-sm-12 text-center">
       <div align="center">
                                    <?php if($_REQUEST["cat_id"]==""){?>
                                    <a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('add','','images/submit1.png',1)" style="text-decoration:none;">
                                    <input type="image" name="add" id="add" src="images/submit.png" style="margin-bottom: -5px;"/>
                                    </a>
                                    <?php } else { ?>
                                    <a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('update','','images/update1.png',1)" style="text-decoration:none;">
                                    <input type="image" name="update" id="update" src="images/update.png" style="margin-bottom: -5px;"/>
                                    </a>
                                    <?php } ?>
<a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image1','','images/back1.png',1)"><img src="images/back.png" name="Image1" width="100" height="21" border="0" id="Image1" onClick="return redirect_page();"/></a></div>
        </div>
       
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