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
if(isset($_REQUEST['delete_x'])){

		foreach($_REQUEST['catid'] as $val){

			$sql = mysqli_query($db,"delete from tbl_category where cat_id='$val'");

		}

		header("Location:manage_category.php?msg=delete");

	}

	if(isset($_REQUEST['btn_active_x'])){

		foreach($_REQUEST['catid'] as $val){

			$sql = mysqli_query($db,"update tbl_category set cat_status='1' where cat_id='$val'");

		}

		header("Location:manage_category.php?msg=active");

	}
	if(isset($_REQUEST['btn_inactive_x'])){

		foreach($_REQUEST['catid'] as $val){

			//echo "update category set categoryStatus='0' where categoryID='$val'";

			$sql = mysqli_query($db,"update tbl_category set cat_status='0' where cat_id='$val'");

		}

		header("Location:manage_category.php?msg=inactive");

	}
		if(isset($_REQUEST["action"]))
	{
	$dele="delete from tbl_category where cat_id='".$_REQUEST["pid"]."'";
	mysqli_query($db,$dele);
	
	
	}
	
	$whereclause="";
	if($_REQUEST["search_x"])
	{
	$whereclause.= "where cat_name like '%".$_REQUEST["keyword"]."%'";
	} 
$productselect = "select * from tbl_category order by cat_id asc";
$mp="1";
?>
<!DOCTYPE html>

<head>
<title>southindian TAILORS - ADMIN PANEL</title>
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

			if(confirm("Are you sure to Delete this Category?"))

			{

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
  if(confirm("Are you sure to Delete this Record?"))

			{
	FormName		= document.manage_content;
	FormName.action	= "manage_category.php?action=delete&pid="+pid;
	FormName.submit();
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
    <h2>southindian TAILORS</h2>
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
      Manage Category
    </div>
    <div class="row w3-res-tb">
      <div class="col-xs-12 col-sm-12 m-b-xs">
       <table align="right"  cellpadding="0" cellspacing="0" style="margin-bottom:10px;">
                              <tr>
                                  <td width="59" align="center"><a href="add_category.php"><img src="images/add.png" height="50" border="0" style="margin-top:  -5px;"/></a></td>
                                  <td width="50" align="center"><input type="image" name="delete" id="delete"  src="images/dele.png" onClick="return ifdel(this);"/></td>
                                  <td width="67"><div align="center">
                                    <input type="image" name="btn_active" id="btn_active" src="images/active.png" onClick="return ifActive(this);" />
                                  </div></td>
                                  <td width="66"><input type="image" name="btn_inactive" id="Inactive" src="images/inactive.png" onClick="return ifInActive(this);"/></td>
                                  <td width="8">&nbsp;</td>
                                </tr>
                            </table>             
      </div>
     
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
            
            </th>
            <th>Category Name</th>
            <th>Status</th>
     
            <th style="width:80px;">Action</th>
          </tr>
        </thead>
        <tbody>
		<?php 
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
          <tr>
            <td><input name="catid[]" type="checkbox" id="catid[]" value="<?php echo $cat_det['cat_id'];?>" /></td>
            <td><a href="manage_subcategory.php?cat_id=<?php echo $cat_det['cat_id'];?>&catname=<?php echo $cat_det["cat_name"];?>" style=" <?php if($cat_det["cat_status"]=='1'){?> color:#993333;<?php } else{?>  color:#333333; <?php }?> font-weight:bold; font-family:Arial, Helvetica, sans-serif;"><?php echo $cat_det["cat_name"];?></a></td>
            <td> <span class="text-ellipsis" style=" <?php if($cat_det["cat_status"]=='1'){?> color:#993333;<?php } else{?>  color:#333333; <?php }?>; font-weight:bold;"><?php if($cat_det["cat_status"]=='1'){?>
                                    Active
                                    <?php } else {?>
                                    Inactive
                                    <?php } ?></span></td>
           
            <td>
             <a href="add_category.php?cat_id=<?php echo $cat_det['cat_id'];?>"><img src="images/edit.png" width="16" height="16" border="0" /></a> &nbsp; <a href="javascript:deletemember('<?php echo $cat_det['cat_id'];?>');" class="style5"><img src="images/delete.png" width="20" height="20" border="0" /></a>
            </td>
          </tr>
     <?php }} ?>
                                <?php if($total_records<=0){?>
                                <tr>
                                  <td height="43" colspan="4" class="desccol"><div align="center"><font color="#FF0000">No Category Added</font></div></td>
                                </tr>
                                <?php }?>
        </tbody>
      </table>
    </div>
    <footer class="panel-footer"  style="margin-top:30px;">
      <div class="row">
        
        <div class="col-sm-5 text-center">
        <table width="210" border="0" align="left" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td width="100"><a href="javascript:SetChecked(1)" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image5','','images/checkall1.png',1)"><img src="images/checkall.png" name="Image5" width="100" height="21" border="0" id="Image5" onClick="CheckAll(document.manage_content.catid)"/></a></td>
                                  <td width="13">&nbsp;</td>
                                  <td width="110"><a href="javascript:SetChecked(0)" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image6','','images/uncheckall1.png',1)"><img src="images/uncheckall.png" name="Image6" width="117" height="21" border="0" id="Image6" onClick="CheckAll(document.manage_content.catid)"0/></a></td>
                                </tr>
                            </table>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <?php
		   if($total_records<=100)
		   {}
		   else
		   {
			  $pageL->totalRecords;
			  $pageL->currentPage;
		   	  $pageL->totalPages;
			  echo "Page ";
			  $pageL->displayLink("manage_category.php", true, true, 1000); //display as  << < 1 2 3 4 5 6 7 > >> 
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
			  <p>© <?php echo date('Y'); ?> Admin Panel. All rights reserved <a href="#">southindian TAILORS</a></p>
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