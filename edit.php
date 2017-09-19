<?php
include_once "conn.php";
if(isset($_GET['edit'])) {
$id = $_GET['edit'];
$sql = "SELECT * From `usercreate` WHERE `id` = '".$id."' ";
$query = mysqli_query($conn, $sql);

//$id = $_GET['clientdetails'];
//$quarter ="";
//$sql1 = "SELECT * From `clienttable` WHERE `id` = '".$id."' ";
//$data1= mysqli_query($conn,$sql1);
 
while($row = mysqli_fetch_assoc($query)){
  	//print_r($row);
  	$organization = $row['organization'];
	$username = $row['username'];
	$email = $row['email'];
	$password = $row['password'];
	$number  = $row['number'];
	
	}
}
 if(isset($_POST['submit'])){
	$neworganization = $_POST['neworgname'];
	$newname = $_POST['newname'];
	$newmail = $_POST['newmail'];
	$newpassword = $_POST['newpassword'];
	$newnumber = $_POST['newphonenumber']; 
   $sql1 = "UPDATE `usercreate` SET `organization`='".$neworganization."' ,`username`='".$newname."' ,`email`='".$newmail."' , `password`='".$newpassword."' ,`number`='".$newnumber."' WHERE `id` = '".$id."' ";
   $query1 = mysqli_query($conn ,$sql1); 
   if($query1) {
	   
   header('usertable.php');
   }
   else {
	 
    echo "not".mysqli_error($conn);
   }
  }
?>
<!DOCTYPE html>
<html>
<head>
<title>Client Login Details</title>
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
				<li class="active"><a href=""><i class="icon-puzzle4 position-left"></i> TDS</a></li>
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
						<input type = "text" class="form-control" id ="orgname" name="neworgname" value="<?php echo $organization;?>" placeholder = "Enter Organization Name">
						</div>
						<div class="form-group">
						<input type = "text" class="form-control" id ="name" name="newname" value="<?php echo $username;?>" placeholder = "Enter Username">
						</div>
						<div class="form-group">
						<input type = "email" class="form-control" id ="mail" name="newmail" value="<?php echo $email;?>" placeholder = "Enter Email">
						</div>
						<div class="form-group">
						<input type = "password" class="form-control" id ="password" name="newpassword"  value="<?php echo $password;?>"placeholder = "Enter Password">
						</div>
						<div class="form-group">
						<input type = "number" class="form-control" id ="number" name="newphonenumber" value="<?php echo $number;?>" placeholder = "Enter Phonenumber">
						</div>
						<input type="submit" name="submit" value="submit" class="btn btn-md btn-success">

					</form>
				</div>
			</div>
</div>
</div>

</body>
</html>

