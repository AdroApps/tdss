<?php
include_once "conn.php";

	$id = $_POST['id'];
	
	$sql = "DELETE FROM `usercreate` WHERE `id` = '".$id."'";
	$data = mysqli_query($conn, $sql);
	if($data) {
			$status= "success";
	}
	else {
		$status= "failure";
	}
 echo json_encode([$status]);

?>


