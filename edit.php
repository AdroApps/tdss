<?php
include_once "conn.php";

$id = $_POST['id'];

	$neworganization = $_POST['orgname'];
	$newmail = $_POST['mail'];
	$newpassword = $_POST['password'];
	$newnumber = $_POST['number']; 
	$newtan = $_POST['tan'];
	$newcity = $_POST['city'];
	$newarea = $_POST['area'];
	$newservice = $_POST['service'];
   $sql1 = "UPDATE `usercreate` SET `organization`='".$neworganization."',`email`='".$newmail."' , `password`='".$newpassword."' ,`number`='".$newnumber."' , `tan`='".$newtan."' , `city`='".$newcity."' , `area`='".$newarea."', `service`='".$newservice."'  WHERE `id` = '".$id."' ";
   $query1 = mysqli_query($conn ,$sql1); 
   if($query1) {
    $status='success';
   }
   else {
     $status='failure';
   }
  
   echo json_encode([$status]);
?>
