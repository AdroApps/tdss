<?php
include_once "conn.php";
$email=$_GET['email'];
$password=$_GET['password'];

$sql="SELECT * FROM `usercreate` WHERE `email`='".$email."' AND `password`='".$password."' " ;
$result=mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0){
	$json=array('state'=>true);
	echo json_encode($json);
}
else{
		$json=array('state'=>false);
	echo json_encode($json);
}


?>
