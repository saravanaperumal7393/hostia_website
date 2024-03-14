<?php
 // error_reporting(0);
ob_start();
session_start();
?>
<style type="text/css">
<!--
.style1 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
}
-->
</style>

<?php
	  include("../connection.php");
	  
	  	$ip = "";

if (!empty($_SERVER["HTTP_CLIENT_IP"]))
{
 //check for ip from share internet
 $ip = $_SERVER["HTTP_CLIENT_IP"];
}
elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
{
 // Check for the Proxy User
 $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
}
else
{
 $ip = $_SERVER["REMOTE_ADDR"];
}


$date = date('Y-m-d H:i:s');

	$uname=$_POST["uname"];
	$pass=$_POST["pass"];
	$username1=mysqli_real_escape_string($db,stripslashes($uname));
	$password1=mysqli_real_escape_string($db,stripslashes($pass));
	$password1=substr(md5(mysqli_real_escape_string($db,stripslashes($pass))), 25);
	$selquery="select * from tbl_admin where admin_uname='$username1' and admin_pwd='$password1'";
	$result=mysqli_query($db,$selquery);
	$count=mysqli_num_rows($result);
	
	if($count==1) 	{



mysqli_query($db,"insert into logs(name1,pwd1,ip1,ldate1,attempt1)values('$username1','$password1','$ip','$date','pass')");
//echo "insert into logs(name,pwd,ip,ldate,attempt)values('".$username1."',".$password1."','".$ip."','".$date."','pass')";
//mysqli_query($db,"update tbl_admin set admin_status=1 where admin_uname='$username1' and admin_pwd='$password1'");
		$det=mysqli_fetch_array($result);
		//session_register("uname");
		//session_register("pass");
		$_SESSION["hacses156"]=$det["admin_pwd"];
		$_SESSION["hacses157"]=$ip;
		$_SESSION["hacses158"]=$date;
		
	
		
		header("location: admin1.php?cat_id=1&catname=PRODUCTS");
		ob_end_flush();
	} 	
	else
	{
		mysqli_query($db,"insert into logs(name1,pwd1,ip1,ldate1,attempt1)values('".$username1."','".$password1."','".$ip."','".$date."','fail')");

	header("location:index.php?a=Please Enter Correct Username Or Password");
	ob_end_flush();
	}
?>
<div align="center"><a href="index.php" class="style1">Back</a></div>
<?php
ob_end_flush();
?>