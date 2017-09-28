<?php
include_once "conn.php";
//$connect = mysqli_connect("localhost", "root", "", "testing");
if(isset($_POST["id"]))
{
 $value = mysqli_real_escape_string($conn, $_POST["value"]);
 $query = "UPDATE employeetable SET ".$_POST["column_name"]."='".$value."' WHERE id = '".$_POST["id"]."'";
 echo $query;
 if(mysqli_query($conn, $query))
 {
  echo 'Data Updated';
 }
}
/*if(isset($_POST["id"]))
{
 $value = mysqli_real_escape_string($conn, $_POST["value"]);
 $query = "UPDATE employeetable SET ".$_POST["column_name"]."='".$value."' WHERE id = '".$_POST["id"]."'";
 if(mysqli_query($conn, $query))
 {
  echo 'Data Updated';
 }
}*/
	
?>

