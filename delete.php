<?php
include_once "conn.php";
if(isset($_GET['delete'])) {
	$id = $_GET['delete'];
	$sql = "DELETE FROM `usercreate` WHERE `id` = '".$id."'";
	$data = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($data);
	if($data) {
		header('Location:usertable.php');
	}
	else {
		echo "not";
	}
}
?>

