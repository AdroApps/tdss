<?php
include_once "conn.php";
if(isset($_POST['name']))
{
	$username = $_POST['name'];
	$orgname  = $_POST['orgname'];
	$mail = $_POST['mail'];
	$password = $_POST['password'];
	$number  = $_POST['phonenumber'];
	
	$sql= "INSERT INTO `admincreate` (`username` , `organization` , `email` , `password` , `number`) VALUES ('".$username."' , '".$orgname."' , '".$mail."' , '".$password."' , '".$number."')";
	$data = mysqli_query($conn,$sql);
	if($data)
	{
		echo 'moved database';
	}
	else{
		echo 'not moved';
	}
}
$sql1 = "SELECT * FROM `admincreate` ";
$data1 = mysqli_query($conn , $sql1);

?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Login Details</title>
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
						<li><a href=""><i class="icon-switch2"></i> Logout</a></li>
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
				<!--li class=""><a href="admincreate.php"><i class="icon-puzzle4 position-left"></i>AddClients</a></li-->
				<li class="active"><a href="admintable.php"><i class="icon-puzzle4 position-left"></i>Clients</a></li>
			</ul>
		</div>
	</div>
</div>
<!-- /second navbar -->
</div>
<!--/Top navbars position-->
<!--page header-->
	<button type="New" class="btn btn-xs  btn-default" data-toggle="modal" data-target="#myModal">New</button>
<!--page header-->
<div class="panel panel-flat">
<div class="table-responsive pre-scrollable" style="max-height:506px; margin-top: 5px;">
	<table class="table table-hover table-condensed">
		<thead>
			<tr>
				
				<th>Organization Name</th>
				<th>username</th>
				<th>Email</th>
				<th>Password</th>
				<th>Phone Number</th>
			</tr>
		</thead>
		<tbody>
			<?php
			
			while($row=mysqli_fetch_array($data1)){
				
				//echo"<tr>
				//<td>".$row[0]."</td>";
				echo"<tr>
				<td>".$row[1]."</a></td>";
				echo
				"<td>".$row[2]."</td>";
				echo
				"<td>".$row[3]."</td>";
				echo
				"<td>".$row[4]."</td>";
				echo
				"<td>".$row[5]."</td>";
				echo"
				<td><class='text-center'>
							<ul class='icons-list'>
								<li class='dropdown'>
									  <a href='#' class='dropdown-toggle' data-toggle='dropdown' >
										
										  <span class='glyphicon glyphicon-collapse-down'></span>
										</a>
									
									<ul class='dropdown-menu dropdown-menu-right' >
											<li><a href='adminedit.php?edit=$row[0]'> Edit</a></li>
											<li><a href='admindelete.php?delete=$row[0]'>Delete</a></li>
									</ul>
								</li>
							</ul>
					 </td>
				
				</tr>";
			}
			
			?>
		</tbody>
	</table>
</div>
</div>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
<div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">NEW ENTRY</h4>
      </div>
      <div class="modal-body">
        <form action ="" method="POST">
						<div class="form-group">
						<input type = "text" class="form-control" id ="name" name="name" placeholder = "Enter Username">
						</div>
						<div class="form-group">
						<input type = "text" class="form-control" id ="orgname" name="orgname" placeholder = "Enter Organization Name">
						</div>
						<div class="form-group">
						<input type = "email" class="form-control" id ="mail" name="mail" placeholder = "Enter Email">
						</div>
						<div class="form-group">
						<input type = "password" class="form-control" id ="password" name="password" placeholder = "Enter Password">
						</div>
						<div class="form-group">
						<input type = "number" class="form-control" id ="number" name="phonenumber" placeholder = "Enter Phonenumber">
						</div>
						<input type="submit" name="submit" value="submit" class="btn btn-md btn-success">

					</form></div>
</div>
	<!--/modal content-->
</div>
</div>
<!---modal-->
</body>
</html>

