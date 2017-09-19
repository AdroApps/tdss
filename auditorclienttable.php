<!--client table-->
<?php
include_once "conn.php";
$organization = $_GET['organization'];
$sql1 = "SELECT * FROM `clienttable`  WHERE `organization` = '".$organization."' ";
$data1 = mysqli_query($conn,$sql1);
$sql2 = "SELECT * FROM `admincreate` WHERE `email` = '".$_SESSION['e']."' ";
$data2 = mysqli_query($conn , $sql2);

	while($row = mysqli_fetch_assoc($data2)) {
	$username = $row['username'];
	$orgname  = $row['organization'];
	$mail = $row['email'];
	$password = $row['password'];
	$number  = $row['number'];
	
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Client Form</title>
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
						<span><?php echo $orgname ;?></span>
						<i class="caret"></i>
					</a> 

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="#"><i class="icon-user-plus"></i> My profile</a></li>
						<li><a href="#"><span class="badge badge-warning pull-right"></span> <i class="icon-comment-discussion"></i> Messages</a></li>
						<li class="divider"></li>
						<li><a href="#"><i class="icon-cog5"></i> Account settings</a></li>
						<li><a href="adminlogout.php"><i class="icon-switch2"></i> Logout</a></li>
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
				<!--li class=""><a href="employeetable.php"><i class="icon-puzzle4 position-left"></i>Employee</a></li-->
			</ul>
		</div>
	</div>
</div>
<!-- /second navbar -->
</div>
<!--/Top navbars position-->

<!--Client Table-->
<div class="panel panel-flat">
<div class="table-responsive pre-scrollable" style="max-height:506px">
					
	<table class="table table-hover table-condensed">
		<thead>
			<tr>
				
				<th>Oraganization Name</th>
				<th>Tan</th>
				<th>Financial Year</th>
				<th>Quarter</th>
				<th>Status</th>
				<th>Authorised Person Name</th>
				<th>Email</th>
				<th>PhoneNumber</th>
				<th>Date</th>
			</tr>
		</thead>
		<tbody>
			<?php
				
				while($row = mysqli_fetch_array($data1)){
					
					echo "<tr>
					
					<td><a href='auditorclientdetails.php?clientdetails=$row[0]'>".$row[1]."</a></td>";
					echo
					"<td>".$row[2]."</td>";
					echo
					"<td>".$row[3]."</td>";
					echo
					"<td>".$row[4]."</td>";
					echo
					"<td>".$row[5]."</td>";
					echo
					"<td>".$row[6]."</td>";
					echo
					"<td>".$row[7]."</td>";
					echo
					"<td>".$row[8]."</td>";
					echo
					"<td>".$row[9]."</td>";
					echo"
					 
					 </tr>";
					
				
				}
			
				?>
		</tbody>

	</table>
</div>
</div>
<!--/Client Table-->
</body>
</html>
