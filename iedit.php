<?php
include_once "conn.php";

$id = $_POST['id'];

	$newename = $_POST['name'];
	$newemail = $_POST['email'];
	$newpassword = $_POST['password'];
	$sql1 = "UPDATE `internal_users` SET `employeename`='".$newename."' ,`pan`='".$newemail."' ,`adhar`='".$newpassword."'  WHERE `id` = '".$id."' ";

   $query1 = mysqli_query($conn ,$sql1); 
   if($query1) {
    $status='success';
   }
   else {
     $status='failure';
   }
  
   echo json_encode([$status]);
?>
