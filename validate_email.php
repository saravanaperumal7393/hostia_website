<?php
// Assuming you have a database connection established
include('connection.php');



if(!empty(isset($_POST['email'])) && isset($_POST['email'])){

  $email= $_POST['email'];
  checkEmail($db, $email);
 
}


function checkEmail($db, $email){

 $query = "SELECT 	email FROM members WHERE 	email='$email'";
 $result = $db->query($query);
 if ($result->num_rows > 0) {
   echo "<span style='color:red'> Email already registered. Please enter a new one. </span>";
 }
}


// Exit the script

?>
