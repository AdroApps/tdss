<?php
include_once "conn.php";
//session_set();
if(isset($_GET['delete'])) {
	$id = $_GET['delete'];
	$sql = "DELETE FROM `addemployee` WHERE `id` = '".$id."'";
	$data = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($data);
	if($data) {
		header('Location:addemployee.php');
	}
	else {
		echo "not";
	}
}
?>

