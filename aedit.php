<?php
include_once "conn.php";
if(isset($_GET['edit'])) {
$id = $_GET['edit'];
$sql = "SELECT * From `addemployee` WHERE `id` = '".$id."' ";
$query = mysqli_query($conn, $sql);

//$id = $_GET['clientdetails'];
//$quarter ="";
//$sql1 = "SELECT * From `clienttable` WHERE `id` = '".$id."' ";
//$data1= mysqli_query($conn,$sql1);
 
while($row = mysqli_fetch_assoc($query)){
  	//print_r($row);
  	$ename = $row['employeename'];
	$pan = $row['pan'];
	$adhar = $row['adhar'];
	
	}
}
 if(isset($_POST['submit'])){
	$newename = $_POST['newemployeename'];
	$newpan = $_POST['newpan'];
	$newadhar = $_POST['newadhar'];
	$sql1 = "UPDATE `addemployee` SET `employeename`='".$newename."' ,`pan`='".$newpan."' ,`adhar`='".$newadhar."'  WHERE `id` = '".$id."' ";
   $query1 = mysqli_query($conn ,$sql1); 
   if($query1) {
	   
   header('admintable.php');
   }
   else {
	 
    echo "not".mysqli_error($conn);
   }
  }
?>
<!DOCTYPE html>
<html>
<head>
<title>employee Table</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel = "stylesheet" href="css/style.css">
	 
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
				<li class="active"><a href="addemployee.php"><i class="icon-puzzle4 position-left"></i>Addemployee</a></li>
				<!--li class=""><a href=""><i class="icon-puzzle4 position-left"></i>Employee</a></li-->
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
				   <h6 class="panel-title"><b>Edit Details</b></h6>
					<form action ="" method="POST">
						
						<div class="form-group">
						<input type = "text" class="form-control" id ="employeename" name="newemployeename" value="<?php echo $ename;?>" placeholder = "Enter employeeName">
						</div>
						<div class="form-group">
						<input type = "text" class="form-control" id ="number" name="newpan" value="<?php echo $pan;?>" placeholder = "Enter Username">
						</div>
						<div class="form-group">
						<input type = "text" class="form-control" id ="number" name="newadhar" value="<?php echo $adhar;?>" placeholder = "Enter Email">
						</div>
						
						<input type="submit" name="submit" value="submit" class="btn btn-md btn-success">

					</form>
				</div>
			</div>
</div>
</div>

</body>
</html>



