<?php
include_once "conn.php";
//session_set();

	$id = $_POST['id'];
	$sql = "DELETE FROM `addemployee` WHERE `id` = '".$id."'";
	$data = mysqli_query($conn, $sql);
	  if($data) {
    $status='success';
   }
   else {
     $status='failure';
   }
  
   echo json_encode([$status]);
?>

