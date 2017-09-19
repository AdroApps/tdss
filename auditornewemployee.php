<?php
include_once "conn.php";
$id = $_GET['clientdetails'];
$quarter ="";
$sql = "SELECT * From `clienttable` WHERE `id` = '".$id."' ";
$data= mysqli_query($conn,$sql);

while($row = mysqli_fetch_assoc($data)) {
	//print_r($row);
	$id = $row['id'];
	$organization = $row['organization'];
	$tan = $row['tan'];
	$year = $row['year'];
	$quarter = $row['quarter'];
	$quat = $row['quarter'];
	$status = $row['status'];
	$pname = $row['pname'];
	$mail = $row['email'];
	$number = $row['number'];//.mysqli_error($conn);
}
	if($quarter == "Q1") {
		$month1 = "January";
		$month2 = "Febuary";
		$month3 = "March";
    } else if($quarter == "Q2") {
		$month1 = "April";
		$month2 = "May";
		$month3 = "June";
    } else if($quarter == "Q3") {
		$month1 = "July";
		$month2 = "August";
		$month3 = "September";
    } else {
		$month1 = "October";
		$month2 = "November";
		$month3 = "December";
    }

	
	if(isset($_POST['name']))   {
	$ename = $_POST['name'];
	$pan = $_POST['number'];
	//$month1 = $_POST['month1'];
	/*$salary1 = $_POST['salary1'];
	$tdsamount1 = $_POST['tdsamount1'];
	//$month2 = $_POST['month2'];
	$salary2 = $_POST['salary2'];
	$tdsamount2 = $_POST['tdsamount2'];
	//$month3 = $_POST['month3'];
	$salary3 = $_POST['salary3'];
	$tdsamount3 = $_POST['tdsamount3'];
	//$organization = $row['organization'];
	//$quarter = $row['quarter'];*/
	
	
	$sql1 = "INSERT INTO `employeetable`(`employeename` , `pan` ,`month1` , `month2`, `month3` , `organization`, `quarter`) VALUES ('".$ename."' , '".$pan."' , '".$month1."' , '".$month2."'  , '".$month3."' ,'".$organization."', '".$quarter."')";  
	//$sql1 = "INSERT INTO `employeetable`(`employeename` , `pan` , `month1` , `salary1` , `tdsamount1` , `month2` , `salary2` , `tdsamount2` ,`month3` , `salary3` , `tdsamount3`, `organization`, `quarter`) VALUES ('".$ename."' , '".$pan."' , '".$month1."' , '".$salary1."' , '".$tdsamount1."' , '".$month2."' , '".$salary2."' , '".$tdsamount2."' , '".$month3."' , '".$salary3."' , '".$tdsamount3."', '".$organization."', '".$quarter."')";  
	
	$data1 = mysqli_query($conn,$sql1);
	//$data1 = mysqli_query($conn1,$sql1);
	
	//echo $sql;
	if($data1)
	{
		echo '' ;
	}
	else
	{
		echo 'not moved'.mysqli_error($conn);
	}
  }
  
?>
<!DOCTYPE html>
<html>
<head>
<title>Auditor Client Form</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	 <style>
	 .main_nav_img {
			    max-height: 30px !important;
				margin-top: -6px !important;
				border-radius: 50%;		
				}
				
		.navbar-main-sm {
			height: 44px !important;
			min-height: 44px !important;
			}
			
		.navbar-second-sm {
			height: 40px !important;
			min-height: 44px !important;
			
			}
	form{
	width:100%;
	height:400px;
	overflow-y:scroll;
}
 
	 </style>
	 <?php
	 include_once "style.php";
	 include_once "script.php";
	 ?>
</head>
<body class="navbar-top-sm-xs">

<!--Top navbars position-->
<div class="navbar-fixed-top">
<!-- Main navbar -->

	<div class="navbar navbar-inverse bg-beige navbar-main-sm">
		<div class="navbar-header">
			<a class="navbar-brand" <h2 style="font-size: 18px;">Adro</h2></a>
		</div>
		<div class="navbar-collapse collapse" id="navbar-first">
			<ul class="nav navbar-nav navbar-right">
				
				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<img class="main_nav_img" src="assets/images/placeholder.jpg" alt="">
						<span>User</span>
						<i class="caret"></i>
					</a> 

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="#"><i class="icon-user-plus"></i> My profile</a></li>
						<li><a href="#"><span class="badge badge-warning pull-right"></span> <i class="icon-comment-discussion"></i> Messages</a></li>
						<li class="divider"></li>
						<li><a href="#"><i class="icon-cog5"></i> Account settings</a></li>
						<li><a href="logout.php"><i class="icon-switch2"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->

	<!-- Second navbar -->
<div class="navbar-collapse collapse" id="navbar-second">
	<div class="navbar navbar-default navbar-second-sm">
		<ul class="nav navbar-nav no-border visible-xs-block">
			<li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second-toggle"><i class="icon-menu7"></i></a></li>
		</ul>

		<div class="navbar-collapse collapse" id="navbar-second-toggle">
			<ul class="nav navbar-nav navbar-nav-material" style="margin-left: -196px";>
				<li class=""><a href=""><i class="icon-display4 position-left"></i> Dashboard</a></li>
				<li class="active"><a href="clienttable.php"><i class="icon-puzzle4 position-left"></i> TDS</a></li>
				<li class=""><a href="employeetable.php"><i class="icon-puzzle4 position-left"></i>Employee</a></li>
			</ul>
		</div>
	</div>
</div>
<!-- /second navbar -->
</div>
<!--/Top navbars position-->
<!--div class="container">
<div class="col-lg-4 col-md-2 col-md-offset-4"-->
<div class="container-fluid">
			 <div class="col-lg-6 col-md-3 col-md-offset-3">
			  <div class="panel panel-white" style="margin-top:50px">
				 <div class="panel-heading">
				   <h6 class="panel-title"><b>New Employee</b></h6>
	<form action ="" method="POST">
			<div class="form-group">
				<input type="text" class="form-control" id="name" name="name" Placeholder="Enter Employee FullName">
			</div>
			<div class="form-group">
				<input type="text" class ="form-control" id="pan" name="number" Placeholder="Enter Pan Number">
			</div>
			
		<input type="submit" value="submit" class="btn btn-md btn-primary">
	</form>
</div>
</div>
</div>
</div>
</body>
</html>
	 

