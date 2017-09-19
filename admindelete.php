<?php
include_once "conn.php";
if(isset($_GET['delete'])) {
	$id = $_GET['delete'];
	$sql = "DELETE FROM `admincreate` WHERE `id` = '".$id."'";
	$data = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($data);
	if($data) {
		header('Location:admintable.php');
	}
	else {
		echo "not";
	}
}
?>


