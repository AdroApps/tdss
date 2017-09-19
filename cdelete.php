<?php
include_once "conn.php";
//session_set();
if(isset($_GET['delete'])) {
	$id = $_GET['delete'];
	$sql = "DELETE FROM `clienttable` WHERE `id` = '".$id."'";
	$data = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($data);
	if($data) {
		header('Location:clienttable.php');
	}
	else {
		echo "not";
	}
}
?>
