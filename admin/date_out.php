<?php 
error_reporting(0);
 include("../connection.php");?>
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
<style type="text/css">
	.button_2 {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 10px 22px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

table{
  width: 100%;
  margin: 10px 5px;
}

table th{
  border: 1px solid #000;
  padding: 5px;
  font-weight: 600;
  text-align: center;
}

table tr td{
  border: 1px solid #000;
  padding: 5px;
  text-align: center;

}
</style>
<!--sidebar start-->
<?php include("left.php");?>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
<form class="form-horizontal bucket-form" action="date_out.php" method="POST">
	<section class="wrapper">
		<div class="table-agile-info">
		<!---728x90--->
  <div class="panel panel-default">
    <div class="panel-heading">
      Customer List
    </div>

	
    <div class="">
	<div class="" style="overflow: auto">
    <table >
        <tbody>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Whatsapp Number </th>
            <th>City</th>
            <th>Address</th>
          <!--   <td>Sub_total</td>
            <td>Discount </td> -->
            <th> Total  </th>
            <th> Date</th>
          </tr>
       <tr> 
    <?php
      $start_date=$_POST['start_date'];
      $end_date=$_POST['end_date'];

      // echo  $start_date;
      // echo $end_date;

           $sql2 = "SELECT * FROM details WHERE cus_date BETWEEN '".$start_date."' AND '".$end_date."'";
$result2=mysqli_query($db,$sql2);
$num=1;
while ($db_field2 = mysqli_fetch_array($result2)) {
        
 
    ?>  

         
            <td><?php echo $db_field2["name"]?></td>
            <td><?php echo $db_field2["email"]?></td>
            <td><?php echo $db_field2["wh_number"]?> </td>
            <td><?php echo $db_field2["city"]?></td>
            <td><?php echo $db_field2["address"]?></td>
           <!--  <td><?php echo $db_field2["sub_total"]?></td>
            <td><?php echo $db_field2["discount"]?> </td> -->
            <td> <?php echo $db_field2["overall_total"]?>  </td>
            <td> <?php echo $db_field2["cus_date"]?></td>
          </tr>
    <?php } ?>
     </tbody>
      </table>

   
  
  </div>
  </div>        
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
