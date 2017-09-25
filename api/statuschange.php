<?php
include_once "conn.php";
$status=0;
$date = date("Y/m/d h:i:s" );
$updasql="UPDATE clienttable SET status='".$_REQUEST['value']."' WHERE id=".$_REQUEST['recid'];
	$udata = mysqli_query($conn,$updasql);
$sql = "INSERT INTO `notification`(`notification_id` , `user_id` , `rec_id` , `status` , 
	  `message` ,`date`) VALUES ('' , '".$_REQUEST['userid']."' ,
	   '".$_REQUEST['recid']."'  ,'".$status."' ,'".$_REQUEST['value']."', '".$date."')";

	$data = mysqli_query($conn,$sql);
?>