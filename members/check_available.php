<?php
// Assuming you have a database connection established
include('../connection.php');

// Retrieve the member_id sent via AJAX
// $member_id = $_POST['member_id'];


// // Perform a query to check if the member_id exists in the database
// // Example assuming you're using MySQLi
// $query = "SELECT COUNT(*) AS count FROM members WHERE member_id = '$member_id'";
// $stmt = $mysqli->prepare($query);
// $stmt->bind_param("s", $member_id);
// $stmt->execute();
// $result = $stmt->get_result();
// $row = $result->fetch_assoc();

// // Send a response indicating whether the member_id exists or not
// if ($row['count'] = 0) {
//     echo "exists";
// } else {
//     echo "available";
// }



if(!empty(isset($_POST['member_id'])) && isset($_POST['member_id'])){

  $member_id= $_POST['member_id'];
  checkEmail($db, $member_id);
 
}


function checkEmail($db, $member_id){

 $query = "SELECT 	members_id FROM members WHERE 	members_id='$member_id'";
 $result = $db->query($query);
 if ($result->num_rows > 0) {
   echo "<span style='color:red'> Member ID alredy exists -Enter another ID  </span>";
 }
}


// Exit the script

?>
