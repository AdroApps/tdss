<?php
include_once "conn.php";

$id = $_POST['id'];

	$newename = $_POST['name'];
	$newpan = $_POST['pan'];
	$newadhar = $_POST['adhar'];
	$sql1 = "UPDATE `addemployee` SET `employeename`='".$newename."' ,`pan`='".$newpan."' ,`adhar`='".$newadhar."'  WHERE `id` = '".$id."' ";

   $query1 = mysqli_query($conn ,$sql1); 
   if($query1) {
    $status='success';
   }
   else {
     $status='failure';
   }
  
   echo json_encode([$status]);
?>

