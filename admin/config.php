<?php
//for hosting hostname , user, db sarver password

$hostname="localhost";
$db_login="root";
$db_pass="";

// new database name
$database ="divazconsultancy";

//$db_login="zodiac1_user";
//$db_pass="F4PIIfB9Z7TR";

// new database name
//$database ="zodiac1_product";
// Initial UserName and Password
   $ad_login = "Admin";
	$ad_pass = "Admin";
	
// connects to host
$con = mysqli_connect($hostname, $db_login, $db_pass) or die("Could not connect");   
 mysqli_select_db($database, $con) or die('Could not select database');

   ?>