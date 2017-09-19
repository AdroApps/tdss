<!--client table-->
<?php
//session_start();
include_once "conn.php";
session_set();
//$id = $_SESSION['id'];
$sql1 = "SELECT * FROM `clienttable` WHERE `email`='".$_SESSION['e']."' ";
$data1 = mysqli_query($conn,$sql1);

//client form

if(isset($_POST['submit'])) {
	$organization = $_POST['organization'];
	$tan = $_POST['tan'];
	$year = $_POST['year'];
	$quarter = $_POST['quarter'];
	$status = $_POST['status'];
	$pname= $_POST['personname'];
	$mail = $_POST['email'];
	$number = $_POST['phonenumber'];
	$service = $_POST['service'];
	$date = date("Y/m/d");
	//echo $sql;
	$sql = "INSERT INTO `clienttable`(`organization` , `tan` , `year` , `quarter` , `status` ,
	  `pname` , `email` , `number` , `service` ,`date`) VALUES ('".$organization."' , '".$tan."' ,
	   '".$year."' , '".$quarter."' , '".$status."' , '".$pname."' , '".$mail."' , '".$number."' ,
	    '".$service."' , '".$date."' )";
	//$sql2 = "INSERT INTO `clienttable`(`organization` , `tan` , `year` , `quarter` , `status` , 
	 //`pname` , `email` , `number` , `service` ,`date`) VALUES ('".$organization."' , '".$tan."' ,
	 // '".$year."' , '".$quarter."' , '".$status."' , '".$pname."' , '".$mail."' , '".$number."' , 
	  //'".$service."' ,'".$date."')";
	
	$data = mysqli_query($conn,$sql);
	//$data2 = mysqli_query($conn2,$sql2);
	
	
		
	
	if($data)  {
		
		header('location :clienttable.php') ;
	}	
	else {
		echo "not moved".mysqli_error($conn);
	}
}

$sql2 = "SELECT * FROM `usercreate` WHERE `email` = '".$_SESSION['e']."' ";
$data2 = mysqli_query($conn , $sql2);

	while($row = mysqli_fetch_assoc($data2)) {
		$organization  = $row['organization'];
		$mail = $row['email'];
		$password = $row['password'];
		$pname = $row['pname'];
		$number  = $row['number'];
		$tan = $row['tan'];
		$city = $row['city'];
		$area = $row['area'];
		$service = $row['service'];
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
						<span><?php echo $organization; ?></span>
						<i class="caret"></i>
					</a> 

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="#"><i class="icon-user-plus"></i> My profile</a></li>
						<li><a href="#"><span class="badge badge-warning pull-right"></span> <i class="icon-comment-discussion"></i> Messages</a></li>
						<li class="divider"></li>
						<li><a href="#"><i class="icon-cog5"></i> Account settings</a></li>
						<li><a href="clientlogout.php"><i class="icon-switch2"></i> Logout</a></li>
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
<!--page header-->
	<button type="New" class="btn btn-xs  btn-default" data-toggle="modal" data-target="#myModal">New</button>
						

<!--page header-->
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
					
					<td><a href='clientdetails.php?clientdetails=$row[0]'>".$row[1]."</a></td>";
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
					  <td><class='text-center'>
							<ul class='icons-list'>
								<li class='dropdown'>
									  <a href='#' class='dropdown-toggle' data-toggle='dropdown' >
										
										  <span class='glyphicon glyphicon-collapse-down'></span>
										</a>
									
									<ul class='dropdown-menu dropdown-menu-right' >
											<li><a href='cedit.php?edit=$row[0]'> Edit</a></li>
											<li><a href='cdelete.php?delete=$row[0]'>Delete</a></li>
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
<!--/Client Table-->
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
        <form action="" method="POST">

		<div class="form-group">
				<input type="text" class="form-control" id="org" name="organization" value = "<?php echo $organization; ?>" Placeholder="Enter Organization Name">
			</div>
			<div class="form-group">
				<input type="text" class ="form-control" id="tan" name="tan" value = "<?php echo $tan; ?>"  Placeholder="Enter Tan">
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
				<input type="text" class="form-control" id="pname" name="personname" value="<?php echo $pname;?>" Placeholder="Enter Authorised Person Name">
			</div>
			<div cass="form-group">
				<input tpye="text" class="form-control" id="mail" name="email" value="<?php echo $mail;?>" Placeholder="Enter Your Email">
			</div>
			<div cass="form-group">
				<input tpye="text" class="form-control" id="number" name="phonenumber" value="<?php echo $number;?>" Placeholder="Enter Your Phonenumber">
			</div>
			<div cass="form-group">
				<input tpye="text" class="form-control" id="service" name="service" value="<?php echo $service;?>" Placeholder="Enter Service Charges">
			</div>
			<input type="button" class="btn btn-lg btn-default" name="cancel" value="Cancel">
                       
			<input type="submit" name="submit" value="submit" class="btn btn-md btn-primary">
		</form>
</div>
	<!--/modal content-->
</div>
</div>

</body>
</html>
