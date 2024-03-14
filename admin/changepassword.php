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

if(isset($_REQUEST['change_pass_x'])){
	$old_pass = substr(md5($_REQUEST['old_pass']), 25);
		$new_pass = substr(md5($_REQUEST['new_pass']), 25);
		
		$pass_res = mysqli_query($db,"select * from tbl_admin where admin_pwd='$old_pass'");
		$num = mysqli_num_rows($pass_res);
		if($num > 0){
			$pre_det = mysqli_fetch_array($pass_res);
			$qry = "update tbl_admin set admin_pwd='$new_pass' where admin_id ='".$pre_det['admin_id']."' and admin_pwd='$old_pass'";
			mysqli_query($db,$qry);
			$msg="success";
			}
		else{
	$msg="fail";
	
}}


$selquery="select * from tbl_admin";
$result=mysqli_fetch_array(mysqli_query($db,$selquery));
$home=1;

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
function check_pass(){
		var old_pass = document.frm_change_pass.old_pass.value;
		var new_pass = document.frm_change_pass.new_pass.value;
		var con_pass = document.frm_change_pass.con_pass.value;
		
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
<body onLoad="MM_preloadImages('images/submit1.png')">
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
<form name="frm_change_pass" method="post" id="frm_change_pass" onSubmit="return check_pass();">
	<section class="wrapper">
		<div class="table-agile-info">
		<!---728x90--->
  <div class="panel panel-default">
    <div class="panel-heading">
     CHANGE PASSWORD
    </div>
<center style="color:#ff0000;"><?php 
		
		if($msg =="success"){echo "Password Change Successfully"; }
		else if($msg == "fail"){echo "Invalid Old Password"; }
		?>      </center>
    <div class="panel-body">
	  <div class="form-group">
                        <label class="col-sm-3 control-label">Oldpassword</label>
                        <div class="col-sm-6">
                           
							<input type="password" name="old_pass" id="old_pass" class="form-control">
                        </div>
                    </div><br/>
	<div class="form-group">
                        <label class="col-sm-3 control-label">New Password</label>
                        <div class="col-sm-6">
                           
							<input type="password" name="new_pass" id="new_pass" class="form-control">
                        </div>
                    </div>
					<br/>
	<div class="form-group">
                        <label class="col-sm-3 control-label">Confirm Password</label>
                        <div class="col-sm-6">
                           
							<input type="password" name="con_pass" id="con_pass" class="form-control">
                        </div>
                    </div>
	</div>
    <footer class="panel-footer"  style="margin-top:30px;">
      <div class="row">
        
        <div class="col-xs-12 text-center">
       <input type="image" src="images/submit.png" name="change_pass" width="100" height="21" border="0">
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