<?php
include_once "conn.php";
if(isset($_POST['first_name']))   {
	$ename = $_POST['first_name'];
	$pan = $_POST['pno'];
	$month1 = $_POST['month1'];
	$salary1 = $_POST['sal1'];
	$tdsamount1 = $_POST['tdsamt1'];
	$month2 = $_POST['month2'];
	$salary2 = $_POST['sal2'];
	$tdsamount2 = $_POST['tdsamt2'];
	$month3 = $_POST['month3'];
	$salary3 = $_POST['sal3'];
	$tdsamount3 = $_POST['tdsamt3'];
	$organization = $_SESSION['user_id'];
	//$quarter = $row['quarter'];
	$date = date("Y/m/d h:i:s" );
	$qid=$_POST['qid'];
	
	$sql1 = "INSERT INTO `employeetable`(`employeename` , `pan` , `month1` , `salary1` , `tdsamount1` , `month2` , `salary2` , `tdsamount2` ,`month3` , `salary3` , `tdsamount3`,  `quarter`,`created_date`,`userid`,`qid`) VALUES ('".$ename."' , '".$pan."' , '".$month1."' , '".$salary1."' , '".$tdsamount1."' , '".$month2."' , '".$salary2."' , '".$tdsamount2."' , '".$month3."' , '".$salary3."' , '".$tdsamount3."', '".$quarter."','".$date."','".$organization."','".$qid."')";  
	
	echo $sql1;
	//$sql1 = "INSERT INTO `employeetable`(`employeename` , `pan` , `month1` , `salary1` , `tdsamount1` , `month2` , `salary2` , `tdsamount2` ,`month3` , `salary3` , `tdsamount3`, `organization`, `quarter`) VALUES ('".$ename."' , '".$pan."' , '".$month1."' , '".$salary1."' , '".$tdsamount1."' , '".$month2."' , '".$salary2."' , '".$tdsamount2."' , '".$month3."' , '".$salary3."' , '".$tdsamount3."', '".$organization."', '".$quarter."')";  
	
	$data1 = mysqli_query($conn,$sql1);
	//$data1 = mysqli_query($conn1,$sql1);
	
	//echo $sql;
	if($data1)
	{
		echo 'data inserted' ;
	}
	else
	{
		echo 'not moved'.mysqli_error($conn);
	}
  }
  
?>
