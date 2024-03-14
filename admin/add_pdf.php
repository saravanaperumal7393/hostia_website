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
mysqli_close($db);
include("../connection.php");
if($_REQUEST["cat_id"]==1)
{
$cat=4;
}
if($_REQUEST["cat_id"]==2)
{
$cat=5;
}

if($_REQUEST["cat_id"] && $_REQUEST["subcat_id"]!=""){
$sel="select * from tbl_subcategory where subcat_id='".$_REQUEST["subcat_id"]."' and cat_id='".$_REQUEST["cat_id"]."'";
$result=mysqli_fetch_array(mysqli_query($db,$sel));
if($_REQUEST["update_x"]){


        mysqli_query($db,$update1);
header("location:manage_subcategory.php?cat_id=".$_REQUEST["cat_id"]."&catname=".$_REQUEST["catname"]);
		}
		}
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
	function redirect_page(){
		window.location.href = 'manage_subcategory.php?cat_id=<?php echo $_REQUEST["cat_id"];?>&catname=<?php echo $_REQUEST["catname"];?>';
	}
	</script>
     <script type="text/javascript" language="javascript">
	function validate()
	{
	if(document.add_subcategory.subcat_name.value=="")
	{
	alert("Please Enter Subcategory Name");
	document.add_subcategory.subcat_name.focus();
	return false;
	}

  function validate1()
  {
  if(document.add_subcategory.subcat_des.value=="")
  {
  alert("Please Enter Subcategory Name");
  document.add_subcategory.subcat_des.focus();
  return false;
  }
//var extensions = new Array("jpg","jpeg","gif","png","bmp");
//
///*
//// Alternative way to create the array
//
//var extensions = new Array();
//
//extensions[1] = "jpg";
//extensions[0] = "jpeg";
//extensions[2] = "gif";
//extensions[3] = "png";
//extensions[4] = "bmp";
//*/
//
//var image_file = document.add_subcategory.image_file.value;
//
//var image_length = document.add_subcategory.image_file.value.length;
//
//var pos = image_file.lastIndexOf('.') + 1;
//
//var ext = image_file.substring(pos, image_length);
//
//var final_ext = ext.toLowerCase();
//
//for (i = 0; i < extensions.length; i++)
//{
//    if(extensions[i] == final_ext)
//    {
//    return true;
//    }
//
//
//alert("You must upload an image file with one of the following extensions: "+ extensions.join(', ') +".");
//return false;
//}
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
<style type="text/css">
  .style19 {
  font-size: 12px;
  font-family: Arial, Helvetica, sans-serif;
  font-weight: bold;
  color: #FF0000;
}
</style>
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
      Add PDF Category
    </div>
    <div class="row w3-res-tb">
	<div class="col-sm-12 m-b-xs"><p style="text-align:center;font-size:20px;color:#82072e;"><?php echo $_REQUEST["catname"];?></p></div>
   
     
    </div>
	 <?php if($_REQUEST["msg"]=="success"){?>
       <center>     <span class="style16"> Category Added Successfully</span>
           </center>
            <?php } ?>
			       <form method="post" enctype="multipart/form-data">
              <div class="panel-body">
          <?php
            // If submit button is clicked
            if (isset($_POST['submit']))
            {
            // get name from the form when submitted
            $name = $_POST['name'];         
            // echo  'name'.$name;
            
            if (isset($_FILES['pdf_file']['name']))
            {
            // If the ‘pdf_file’ field has an attachment
              $file_name = $_FILES['pdf_file']['name'];
              $file_tmp = $_FILES['pdf_file']['tmp_name'];
              // echo  $file_name;
              // echo $file_tmp;
              // Move the uploaded pdf file into the pdf folder
              move_uploaded_file($file_tmp,"./pdf/".$file_name);
              // Insert the submitted data from the form into the table
              $sql = "UPDATE tbl_subcategory SET filename = '$file_name'  WHERE subcat_name = '$name'";
              // echo $sql;
if ($db->query($sql) === TRUE) {
  // echo "Record updated successfully";
} 
                else
                {
                ?>
                <div class=
                "alert alert-danger alert-dismissible fade show text-center">
                  <a class="close" data-dismiss="alert" aria-label="close">
                  ×
                  </a>
                  <strong>Failed!</strong> Try Again!
                </div>
                <?php
                }
              }
              else
              {
              ?>
                <div class=
                "alert alert-danger alert-dismissible fade show text-center">
                <a class="close" data-dismiss="alert" aria-label="close">
                  ×
                </a>
                <strong>Failed!</strong> File must be uploaded in PDF format!
                </div>
              <?php
              }// end if
            }// end if
          ?>
          
          <div class="form-input py-2">
          <!--  <div class="form-group">
              <input type="text" class="form-control"
                placeholder="Enter your name" name="name">
            </div>   -->

    <div class="form-group">
                    <?php
       
         $pdf_name = mysqli_query($db,"SELECT * FROM tbl_subcategory ");
             $pdf_name1 = mysqli_query($db,"SELECT * FROM tbl_products ");
          // foreach ($category as $cat) {
        // $tat = $cat['name'];
        // echo $tat;

      
        ?>

                        <label class="col-sm-3 control-label">Category Name</label>
                        <div class="col-sm-6">
                           
            <!--  <input type="text" name="subcat_name" id="subcat_name" value="<?php if($_REQUEST["subcat_id"]) echo $result["subcat_name"];?>" class="form-control"> -->
            <!-- onchange= "onchangeproject(this.value);" -->
             <select name="name" id="name" class="form-control" >

               <?php
       
         $pdf_name = mysqli_query($db,"SELECT * FROM tbl_subcategory ");
           echo $pdf_name;
            // foreach ($category as $cat) {
        // $tat = $cat['name'];
        // echo $tat;
      while($cat = mysqli_fetch_array($pdf_name))
  {
      
        ?>
        
       <option value="<?php echo $cat['subcat_name'] ?>" ><?php echo $cat['subcat_name'] ?></option>
          
       
       <?php  }?>
                           
                             
                               
                          </select>
                        </div>


                    </div>  
         <!--             <div class="form-group">
                        <label class="col-sm-3 control-label">PDF File</label>
                        <div class="col-sm-6">
                           
                          
              <input type="text" class="form-control" name="projectidvalues2" id="projectidvalues2" style="font-weight: 600;"  >
           
            
                        </div>


                    </div> -->
              
                   <div class="form-group">
                        <label class="col-sm-3 control-label">PDF File</label>
                        <div class="col-sm-6">
                           
                          
              <input type="file" name="pdf_file"
                class="form-control" accept=".pdf" required/>
           
            <span class="style19">&nbsp;&nbsp;(Upload Max PDF Size is 2 MB For Website Convenience )</span>
                        </div>


                    </div>`
            <div class="form-group text-center">
              <input type="submit"
                class="btnRegister" name="submit" value="Submit">
            </div>
          </div>
        </div>
        </form>
			
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
<script type="text/javascript">
    function onchangeproject(idvalue){
   
       // $.post('query.php', {'brand' : val}, function(data){
       //      var jsonData = JSON.parse(data); // turn the data string into JSON
       //      var newHtml = ""; // Initialize the var outside of the .each function
       //      $.each(jsonData, function(item) {
       //          newHtml += "<option>" + item['model'] + "</option>";
       //      })
       //      $("#size").html(newHtml);
       //  });

   // $.ajax({
   //      method:"POST",
   //      url: "available.php",
   //      data:{name:name},
   //      success: function(data){
   //        $('#available').html(data);
   //      }
   //    });
//    var idvalue = idvalue;
    
// const textarea = document.getElementById('projectidvalues2');
//  textarea.value = idvalue;
// alert(idvalue);
   }
</script>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>

<script src="js/jquery.scrollTo.js"></script>
</body>

</html>
<?php } ?>