<?php error_reporting(0);?>
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
</head>
<body>
<div class="log-w3">
<!---728x90--->
<div class="w3layouts-main">
	<h2 style="color:#fff;">HOSTIA - ADMIN PANEL</h2>
	<?php if($_GET['a']!="") {?><div class="alert alert-error" style="color:#6b0e0e;font-size:18px;"> <?php echo $_GET['a'];?>	<!--<strong>Error!</strong> Please enter an username and a password.-->
		</div><?php } ?>
		<form action="login_check.php"  autocomplete="off" method="post" class="validate">
			<input type="text" class="ggg" name="uname" placeholder="USER-NAME" required="">
			<input type="password" class="ggg" name="pass" placeholder="PASSWORD" required="">
			
				<div class="clearfix"></div>
				<input type="submit" value="Log In" name="login">
		</form>
		
</div>
<!---728x90--->
</div>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>

<script src="js/jquery.scrollTo.js"></script>
</body>


</html>
