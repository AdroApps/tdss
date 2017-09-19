<?php
include_once "conn.php";
if(isset($_GET['edit'])) {
$id = $_GET['edit'];
$sql1 = "SELECT * From `employeetable` WHERE `id` = '".$id."' ";
$query1 = mysqli_query($conn, $sql1);

//$id = $_GET['clientdetails'];
//$quarter ="";
//$sql1 = "SELECT * From `clienttable` WHERE `id` = '".$id."' ";
//$data1= mysqli_query($conn,$sql1);
 
while($row = mysqli_fetch_assoc($query1)){
  	//print_r($row);
	$ename = $row['employeename'];
	$pan = $row['pan'];
	$month1 = $row['month1'];
	$salary1 = $row['salary1'];
	$tdsamount1 = $row['tdsamount1'];
	$month2 = $row['month2'];
	$salary2 = $row['salary2'];
	$tdsamount2 = $row['tdsamount2'];
	$month3 = $row['month3'];
	$salary3 = $row['salary3'];
	$tdsamount3 = $row['tdsamount3'];
	$organization = $row['organization'];

	}
}
 if(isset($_POST['submit'])){
	$newename = $_POST['newname'];
	$newpan = $_POST['newnumber'];
	//$newmonth1 = $_POST['newmonth1'];
	$newsalary1 = $_POST['newsalary1'];
	$newtdsamount1 = $_POST['newtdsamount1'];
	//$newmonth2 = $_POST['newmonth2'];
	$newsalary2 = $_POST['newsalary2'];
	$newtdsamount2 = $_POST['newtdsamount2'];
	//$newmonth3 = $_POST['newmonth3'];
	$newsalary3 = $_POST['newsalary3'];
	$newtdsamount3 = $_POST['newtdsamount3'];
	
   $sql = "UPDATE `employeetable` SET `employeename`='".$newename."' ,`pan`='".$newpan."' ,`salary1`='".$newsalary1."' , `tdsamount1`='".$newtdsamount1."' ,`salary2`='".$newsalary2."' , `tdsamount2`='".$newtdsamount2."', `salary3`='".$newsalary3."' , `tdsamount3`='".$newtdsamount3."'WHERE `id` = '".$id."' ";
   $query = mysqli_query($conn ,$sql); 
   if($query) {
	   
   header('clientdetails.php');
   }
   else {
	 
    echo "not".mysqli_error($conn);
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
				   <h6 class="panel-title">Details</h6>
					<form action ="" method="POST">
							<div class="form-group">
								<input type="text" class="form-control" id="name" value="<?php echo $ename; ?>"  name="newname" Placeholder="Enter Employee FullName">
							</div>
							<div class="form-group">
								<input type="text" class ="form-control" id="pan" value="<?php echo $pan; ?>" name="newnumber" Placeholder="Enter Pan Number">
							</div>
							<div class="form-group">
								<input type="text" class ="form-control" id="org"  name="organization"  value=<?php echo $organization; ?>>
							</div>
							
							<div class="form-group">
							
								<label><b><?php echo $month1; ?></b></label>
									
							</div>
					
							<div class="form-group">
									<input type="text" class ="form-control" id="salary1" value="<?php echo $salary1; ?>" name="newsalary1" Placeholder="Enter Salary">
								</div>
							<div class="form-group">
								<input type="text" class ="form-control" id="tds1"  value="<?php echo $tdsamount1; ?>"name="newtdsamount1" Placeholder="Enter Tds Amount">
							</div>
							<div class="form-group">
								<label><b><?php echo $month2;?></b></label>
									
							</div>
							<div class="form-group">
									<input type="text" class ="form-control" id="salary2" value="<?php echo $salary2; ?>"name="newsalary2" Placeholder="Enter Salary">
								</div>
							<div class="form-group">
								<input type="text" class ="form-control" id="tds2" value="<?php echo $tdsamount2; ?>" name="newtdsamount2" Placeholder="Enter Tds Amount">
							</div>
							<div class="form-group">
								<label><b><?php echo $month3;?></b></label>
									
							</div>
							<div class="form-group">
									<input type="text" class ="form-control" id="salary3" value="<?php echo $salary3; ?>" name="newsalary3" Placeholder="Enter Salary">
							</div>
							<div class="form-group">
								<input type="text" class ="form-control" id="tds3" name="newtdsamount3" value="<?php echo $tdsamount3; ?>"Placeholder="Enter Tds Amount">
							</div>
						<input type="submit" name="submit" value="submit" class="btn btn-md btn-primary">
					</form>
				</div>
			</div>
</div>
</div>

</body>
</html>
