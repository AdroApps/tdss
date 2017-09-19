<?php
include_once "conn.php";

if(isset($_POST['organization']))
{
	$organization = $_POST['organization'];
	$tan = $_POST['tan'];
	$year = $_POST['year'];
	$quarter = $_POST['quarter'];
	$status = $_POST['status'];
	$pname= $_POST['personname'];
	$mail = $_POST['email'];
	$number = $_POST['phonenumber'];
	$service = $_POST['service'];
	//$date = date("Y/m/d");
	//echo $sql;
	$sql = "INSERT INTO `clienttable`(`organization` , `tan` , `year` , `quarter` , `status` ,  `pname` , `email` , `number` , `service` ,`date`) VALUES ('".$organization."' , '".$tan."' , '".$year."' , '".$quarter."' , '".$status."' , '".$pname."' , '".$mail."' , '".$number."' , '".$service."' ,now())";

	$data = mysqli_query($conn,$sql);
	
		
	echo $sql;
	if($data)
	{
		echo 'moved to database' ;
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
<title>Client Form</title>
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
				<li class=""><a href="clienttable.php"><i class="icon-puzzle4 position-left"></i> TDS</a></li>
				<li class=""><a href="employeetable.php"><i class="icon-puzzle4 position-left"></i>Employee</a></li>
			</ul>
		</div>
	</div>
</div>
<!-- /second navbar -->
</div>
<!--/Top navbars position-->

<div class="panel panel-flat"> 
<div class="container">

<div class="col-lg-4 col-md-2 col-md-offset-4">
	
	
	<form  method="POST" action ="" style="margin-top:50px";>
		<div class="form-group">
			<input type="text" class="form-control" id="org" name="organization" Placeholder="Enter Organization Name">
		</div>
		<div class="form-group">
			<input type="text" class ="form-control" id="tan" name="tan" Placeholder="Enter Tan">
		</div>
		<div class="form-group">
			<select id="year" name="year" class="form-control">
				<option>----Financial Year----</option>
				<option>2017-2018</option>
				<option>2016-2017</option>
				<option>2015-2016</option>
				<option>2014-2015</option>
			</select>
		</div>
		<div class="form-group">
			<select  id="quarter" name="quarter" class="form-control">
				<option>--------Quarter---------</option>
				<option>Q1</option>
				<option>Q2</option>
				<option>Q3</option>
				<option>Q4</option>
			</select>
		</div>
		<div class="form-group">
			<select  id="status" name="status" class="form-control">
				<option>--------Status----------</option>
				<option>Processing</option>
				<option>Completed</option>
			</select>
		</div>
		<div class="form-group">
			<input type="text" class="form-control" id="pname" name="personname" Placeholder="Enter Authorised Person Name">
		</div>
		<div cass="form-group">
			<input tpye="text" class="form-control" id="mail" name="email" Placeholder="Enter Your Email">
		</div>
		<div cass="form-group">
			<input tpye="text" class="form-control" id="number" name="phonenumber" Placeholder="Enter Your Phonenumber">
		</div>
		<div cass="form-group">
			<input tpye="text" class="form-control" id="service" name="service" Placeholder="Enter Service Charges">
		</div>
		<input type="submit" value="submit" class="btn btn-md btn-primary">
	</form>
</div>
</div>
</div>
</body>
</html>
