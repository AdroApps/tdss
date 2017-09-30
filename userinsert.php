<?php
include_once "conn.php";
if(isset($_POST['name']))   {
	$ename = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$sql = "INSERT INTO `internal_users`(`emp_name` , `email_id` ,`password`,`auditor_id`) VALUES ('".$ename."' , '".$email."' , '".$password."','".$_SESSION['user_id']."')";  
	
	$query1  = mysqli_query($conn,$sql);
	
	  if($query1) {
    $status='success';
   }
   else {
     $status='failure';
   }
  
   echo json_encode([$status]);
  }
  ?>