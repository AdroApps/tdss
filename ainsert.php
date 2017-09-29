<?php
include_once 'conn.php';
if(isset($_POST['name']))   {
	$ename = $_POST['name'];
	$pan = $_POST['pan'];
	$adhar = $_POST['adhar'];

	$sql = "INSERT INTO `addemployee`(`employeename` , `pan` ,`adhar`,`userid`,`orgid`) VALUES ('".$ename."' , '".$pan."' , '".$adhar."','".$_SESSION['user_id']."','".$_SESSION['user_id']."')";  

	$data  = mysqli_query($conn,$sql);
	
	 if($data) {
    $status='success';
   }
   else {
     $status='failure';
   }
  
   echo json_encode([$status]);
  }
  
  ?>