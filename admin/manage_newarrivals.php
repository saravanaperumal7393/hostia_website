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

			$sql = mysqli_query($db,"update tbl_product set Product_status='0' where product_id='$val'");

		}

		header("Location:manage_newarrivals.php");

	}

	
	
	
	if(isset($_REQUEST["action"]))
	{
	$dele="update tbl_product set Product_status='0' where product_id='".$_REQUEST["pid"]."'";
	mysqli_query($db,$dele);
	
	}
$productselect = "select * from tbl_product where Product_status=1 order by Product_id desc";
$na=1;
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
<script language="javascript" type="text/javascript">

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

			if(confirm("Are you sure to Add this to New Arrival Category?"))

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

			if(confirm("Are you sure to Remove this from New Arrival Category?"))

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
<SCRIPT LANGUAGE="JavaScript" type="text/javascript">
function SetChecked(val)

{

   ptr=document.manage_content;

  len=ptr.elements.length;

  var i=0;

  for(i=0; i<len; i++)

	if (ptr.elements[i].name=='catid[]')



	   ptr.elements[i].checked=val;

	   }

</script>
<script type="text/javascript" language="javascript">
function deletemember(pid)
{
	if(confirm("Are you sure to Delete this Record?"))

			{
			FormName		= document.manage_content;
				FormName.action	= "manage_newarrivals.php?action=delete&pid="+pid
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
      Manage New Arrivals
    </div>
    <div class="row w3-res-tb">
	<div class="col-xs-12 col-sm-9 m-b-xs">
     
      </div>
      <div class="col-xs-12 col-sm-3 m-b-xs">
       <table align="right"  cellpadding="0" cellspacing="0" style="margin-bottom:10px;">
                              <tr>
                                  <td width="59" align="center"><a href="add_newarrivals.php"><img src="images/add.png" height="50" border="0" style="margin-top:  -5px;"/></a></td>
                                  <td width="50" align="center"><input type="image" name="delete" id="delete" src="images/deletes.png" onClick="return ifdel(this);" style="width:50px; height:50px;"></td></td>
                                 
                                  <td width="8">&nbsp;</td>
                                </tr>
                            </table>             
      </div>
    
    </div>
	
   <div class="row" style="margin-left:15px;margin-right:15px;">
				<?php 
	$result = mysqli_query($db,$productselect);	
			require_once("pageList.php");
			$row = mysqli_fetch_array($result);
			$total_records = mysqli_num_rows(mysqli_query($db,$productselect));
			$records_per_page = 500; // no of records per page
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
	while($cat_det = mysqli_fetch_array($productquery)){$i++;
	?>
					<div class="col-xs-12 col-sm-6 col-md-4" style="text-align:center;margin-bottom:20px;">
						<div style="box-shadow: 1px -1px 5px 2px #00000078;" class="product-thumb">
					
							
								<div  class="image">	<img src="<?php echo $cat_det["thumb_image"];?>" alt="" class="img-responsive"/></div>
								
							
							
						
						<div style="background: #eee5ff; padding: 5px;">
									<h4 style="max-height:40px;min-height:40px;font-size:16px;"><?php echo $cat_det["Product_name"];?> </h4>
									<p><a href="add_newarrivals.php?pdt_id=<?php echo $cat_det["product_id"];?>"><img src="images/edit.png" width="16" height="16" border="0" alt=""><span class="style6">Edit</span></a> <label style="float:right;">
                              <input type="checkbox" name="catid[]" id="catid[]" value="<?php echo $cat_det['product_id'];?>" >
                              </label></p>
						</div>
						</div>
					</div>
					
					  <?php
	}
			}
	?>
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