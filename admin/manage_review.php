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
mysqli_close();
include("../connection.php");
if(isset($_REQUEST['acti'])){

		foreach($_REQUEST['catid'] as $val){

			$sql = mysqli_query($db,"delete from tbl_review where id='$val'");

		}

		header("Location:manage_review.php?msg=delete");

	}
	if(isset($_REQUEST['actis'])){

		foreach($_REQUEST['catid'] as $val){

			$sql = mysqli_query($db,"update tbl_review set memstatus='1' where id='$val'");
			
		}

		header("Location:manage_review.php?msg=active");

	}
	if(isset($_REQUEST['inacti'])){

		foreach($_REQUEST['catid'] as $val){

			//echo "update category set categoryStatus='0' where categoryID='$val'";

			$sql = mysqli_query($db,"update tbl_review set memstatus='0' where id='$val'");

		}

		header("Location:manage_review.php?msg=inactive");

	}
	if(isset($_REQUEST["action"]))
	{
	$dele="delete from tbl_review where id='".$_REQUEST["pid"]."'";
	mysqli_query($db,$dele);
	
	
	}
	
	

//first of all unset these variables
	
  $mm=1;
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
<style type="text/css">
<!--
.style11 {font-size: 18px;
	font-weight: bold;
	font-family: Arial, Helvetica, sans-serif;
}
.style3 {font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 13px;
}
.style8 {color: #000000}
.style9 {font-family: Arial, Helvetica, sans-serif; font-weight: bold; font-size: 13px; color: #000000; }
-->
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
<script language="javascript">

function selectAll(theBox){

	var aBox = theBox.form["catid[]"];

	var sellAll = false;

	var i;

	

	if(theBox.checked){

		sellAll = true;

	}

	if(aBox.name == "catid[]"){

		aBox.checked = sellAll

		sellAll = !sellAll;

	}

	if(theBox.name == "selectall"){

		for(i=0;i<aBox.length;i++){

			aBox[i].checked = sellAll;

		}

		sellAll = !sellAll;

	}

}





function ifdel()

	{

	

	var flag=false;

	

	var i=0;

	

	for(i=0; i<document.manage_content.elements.length; i++)

		{

		

		if(document.manage_content.elements[i].name=="catid[]")

			{

			 if(document.manage_content.elements[i].checked==true)

				{	

				flag=true;

		

				break;

				}

			}

	

		}

	if(flag)

		{

			if(confirm("Are you sure to Delete this Member?"))

			{
document.manage_content.action= "manage_review.php?acti=delete"
				document.manage_content.submit();

				return true;

			}else 

			{

			return false;

			}

		

		}

	else

		{

		

		alert('Select Atleast one Checkbox')

		

		return false;

		

		}		



	}

	

	function ifActive()

	{

	

	var flag=false;

	

	var i=0;

	

	for(i=0; i<document.manage_content.elements.length; i++)

		{

		

		if(document.manage_content.elements[i].name=="catid[]")

			{

			 if(document.manage_content.elements[i].checked==true)

				{	

				flag=true;

		

				break;

				}

			}

	

		}

	if(flag)

		{

			if(confirm("Are you sure to Active this Category?"))

			{
document.manage_content.action= "manage_review.php?actis=act"
				document.manage_content.submit();

				return true;

			}else 

			{

			return false;

			}

		

		}

	else

		{

		

		alert('Select Atleast one Checkbox')

		

		return false;

		

		}		



	}

	

	function ifInActive()

	{

	

	var flag=false;

	

	var i=0;

	

	for(i=0; i<document.manage_content.elements.length; i++)

		{

		

		if(document.manage_content.elements[i].name=="catid[]")

			{

			 if(document.manage_content.elements[i].checked==true)

				{	

				flag=true;

		

				break;

				}

			}

	

		}

	if(flag)

		{

			if(confirm("Are you sure to Inactive this Category?"))

			{
document.manage_content.action= "manage_review.php?inacti=inact"
				document.manage_content.submit();

				return true;

			}else 

			{

			return false;

			}

		

		}

	else

		{

		

		alert('Select Atleast one Checkbox')

		

		return false;

		

		}		



	}
	
	

</script>
<script type="text/javascript" language="javascript">
function deletemember(pid)
{
  
	FormName		= document.manage_content;
	if(confirm("Are you sure to Delete This Member?"))
	{
	FormName.action	= "manage_review.php?action=delete&pid="+pid;
	FormName.submit();
	}
}
</script>
</head>
<body onLoad="MM_preloadImages('images/checkall1.png','images/uncheckall1.png')">
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
<form name="manage_content" method="post">
	<section class="wrapper">
		<div class="table-agile-info">
		<!---728x90--->
  <div class="panel panel-default">
    <div class="panel-heading">
      Activate Pending Review(s)
    </div>
    <div class="row w3-res-tb">
	<div class="col-xs-12 col-sm-9 m-b-xs">
     
      </div>
      <div class="col-xs-12 col-sm-3 m-b-xs">
       <table align="right"  cellpadding="0" cellspacing="0" style="margin-bottom:10px;">
                             
                    <tr>
                      <td> </td>
                      <td></td>
                      <td><span style="float:left;">
                        <input type="image" name="btn_active" id="btn_active" src="images/active.png" onClick="return ifActive(this);" />
                      </span></td>
                      <td></td>
                    </tr>
                  </table>             
      </div>
    
    </div>
	
   <div class="row" style="margin-left:15px;margin-right:15px;">
		<div class="block-fluid table-sorting clearfix">
                       <div style="text-align:center">
                        <?php if($_REQUEST["msg"]=="active"){?>
                <span class="label label-success" style="text-align:center"> Review Activated Successfully</span>
                <?php } elseif($_REQUEST["msg"]=="inactive"){?>
                <span class="label label-success">Review Deactivated Successfully</span>
                <?php } elseif($_REQUEST["action"]=="delete"){?>
               <span class="label label-success"> Review Deleted Successfully</span>
                <?php } elseif($_REQUEST["msg"]=="update"){ ?>
                <span class="label label-success" style="text-align:center">Review Updated Successfully</span>
                <?php } ?></div>
                
                        <form method="post" name="manage_content" id="manage_content">
                            <table cellpadding="0" cellspacing="0" width="65%" class="table" id="tSortable_2">
                                <thead>
                                    <tr>
                                        <th width="43">&nbsp;</th>
                                        <th width="335">Product Name</th>
                                        
                                        <th width="326">Reviewer Name</th>
                                        <th width="235">Email ID</th>
                                        <th width="500">Review</th>
										<th width="35">Rating</th>
                                        <th width="52">Status</th>  
                                       
                                                                     
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
							
								$sql="select * from tbl_review where memstatus=0";
	$result=mysqli_query($db,$sql);	
			
			$k=1;
	while($cat_det=mysqli_fetch_array($result)){
		$i++;
?>
                                    <tr>
                                        <td><input type="checkbox"  name="catid[]" id="catid[]" value="<?php echo $cat_det['id'];?>" style="width:15px;"/></td>
                                        <td><?php echo $cat_det["product_name"];?></td>
                                        <td><?php echo $cat_det["mname"];?></td>
                                        <td><?php echo $cat_det["summary"];?></td>
                                        <td><?php echo $cat_det["review"];?></td>
										<td><?php echo $cat_det["stars"];?></td>
                                        <td style="color:red"><?php if($cat_det["memstatus"]=='1'){?>
                                          Active 
                                          <?php } else {?>
                                          Inactive 
                                          <?php } ?>
                                      </td>
                                                                   
                                    </tr>
                                    <?php
	}
									?>
                                </tbody>
                            </table>
                            </form>
                      </div>		
    </div>
    <footer class="panel-footer"  style="margin-top:30px;">
      <div class="row">
        
    
        <div class="col-xs-12 text-right text-center-xs">                
          <?php
		    if($total_records<=1000)
		   {}
		   else
		   {
			  $pageL->totalRecords;
			  $pageL->currentPage;
		   	  $pageL->totalPages;
			  echo "Page ";
			  $pageL->displayLink("manage_product.php?cat_id=".$_REQUEST["cat_id"]."&subcat_id=".$_REQUEST["subcat_id"], true, true, 1000); //display as  << < 1 2 3 4 5 6 7 > >> 
		   }
		   ?>
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