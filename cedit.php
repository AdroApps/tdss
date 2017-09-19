<?php
include_once "conn.php";
//session_set();
if(isset($_GET['edit'])){
 $id = $_GET['edit'];
 $sql1 = "SELECT * FROM `clienttable` where `id` = '".$id."' ";
 $query1 = mysqli_query($conn,$sql1);
 
 while($row = mysqli_fetch_assoc($query1)){
	 $organization = $row['organization'];
	 $tan = $row['tan'];
	 $year = $row['year'];
	 $quarter = $row['quarter'];
	 $status = $row['status'];
	 $pname = $row['pname'];
	 $mail = $row['email'];
	 $number = $row['number'];
	 $service = $row['service'];
	}
}
if(isset($_POST['submit'])){
	$neworganization = $_POST['neworganization'];
	 $newtan = $_POST['newtan'];
	 $newyear = $_POST['newyear'];
	 $newquarter = $_POST['newquarter'];
	 $newstatus = $_POST['newstatus'];
	 $newpname = $_POST['newpersonname'];
	 $newmail = $_POST['newemail'];
	 $newnumber = $_POST['newphonenumber'];
	 $newservice = $_POST['newservice'];
	 
	 echo $sql;
	 $sql = "UPDATE `clienttable` SET `organization` = '".$neworganization."' ,`tan` = '".$newtan."' , `year` = '".$newyear."' ,`quarter` = '".$newquarter."' , `status` = '".$newstatus."' , `pname` = '".$newpname."' , `email` = '".$newmail."' ,`number` = '".$newnumber."' , `service` = '".$newservice."' WHERE `id` = '".$id."'";
	 $query = mysqli_query($conn ,$sql); 
   if($query) {
    echo header('Location:clienttable.php');
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
<!--/Top navbars position>

<div class="panel panel-flat"> 
<div class="container">

<div class="col-lg-4 col-md-2 col-md-offset-4"-->
	<div class="container-fluid">
			 <div class="col-lg-6 col-md-3 col-md-offset-3">
			  <div class="panel panel-white" style="margin-top:50px">
				 <div class="panel-heading">
				   <h6 class="panel-title">Edit</h6>
	
		<form  method="POST" action ="" style="margin-top:50px";>
		<div class="form-group">
			<input type="text" class="form-control" id="org" name="neworganization" value="<?php echo $organization;?>" Placeholder="Enter Organization Name">
		</div>
		<div class="form-group">
			<input type="text" class ="form-control" id="tan" name="newtan" value ="<?php echo $tan;?>" Placeholder="Enter Tan">
		</div>

		<?php 
		if(isset($_GET['edit'])){
			switch($year){
				case "2017-2018" :
				echo "<div class='form-group'>
						<label>Year</label>
							<select id='year' name='newyear' class='form-control'>
								<option value=''>-----Select Financial Year----</option>
								<option value='2017-2018'selected>2017-2018</option>
								<option value='2016-2017'>2016-2017</option>
								<option value='2015-2016'>2015-2016</option>
								<option value='2014-2015'>2014-2015</option>
							
							</select>
				
				</div>";
				break;
				case "2016-2017" :
				echo "<div class='form-group'>
						<label>Year</label>
							<select id='year' name='newyear' class='form-control'>
								<option value=''>-----Select Financial Year----</option>
								<option value='2017-2018'>2017-2018</option>
								<option value='2016-2017'selected>2016-2017</option>
								<option value='2015-2016'>2015-2016</option>
								<option value='2014-2015'>2014-2015</option>
							
							</select>
				
				</div>";
				break;
				case "2015-2016" :
				echo "<div class='form-group'>
						<label>Year</label>
							<select id='year' name='newyear' class='form-control'>
								<option value=''>-----Select Financial Year----</option>
								<option value='2017-2018'>2017-2018</option>
								<option value='2016-2017'>2016-2017</option>
								<option value='2015-2016'selected>2015-2016</option>
								<option value='2014-2015'>2014-2015</option>
							
							</select>
				
				</div>";
				break;
				case "2014-2015" :
				echo "<div class='form-group'>
						<label>Year</label>
							<select id='year' name='newyear' class='form-control'>
								<option value=''>-----Select Financial Year----</option>
								<option value='2017-2018'>2017-2018</option>
								<option value='2016-2017'>2016-2017</option>
								<option value='2015-2016'>2015-2016</option>
								<option value='2014-2015'selected>2014-2015</option>
							
							</select>
				
				</div>";
				break;
				}
			}
		?>
		<?php 
		if(isset($_GET['edit'])){
			switch($quarter){
				case "Q1" :
				echo "<div class='form-group'>
						<label>Quarter</label>
							<select id='quarter' name='newquarter' class='form-control'>
								<option value=''>-------Select Quarter------</option>
								<option value='Q1'selected>Q1</option>
								<option value='Q2'>Q2</option>
								<option value='Q3'>Q3</option>
								<option value='Q4'>Q4</option>
							</select>
				</div>";
				break;
				case "Q2" :
				echo "<div class='form-group'>
						<label>Quarter</label>
							<select id='quarter' name='newquarter' class='form-control'>
								<option value=''>-------Select Quarter------</option>
								<option value='Q1'>Q1</option>
								<option value='Q2'selected>Q2</option>
								<option value='Q3'>Q3</option>
								<option value='Q4'>Q4</option>
							</select>
				</div>";
				break;
				case "Q3" :
				echo "<div class='form-group'>
						<label>Quarter</label>
							<select id='quarter' name='newquarter' class='form-control'>
								<option value=''>-------Select Quarter------</option>
								<option value='Q1'>Q1</option>
								<option value='Q2'>Q2</option>
								<option value='Q3'selected>Q3</option>
								<option value='Q4'>Q4</option>
							</select>
				</div>";
				break;
				case "Q4" :
				echo "<div class='form-group'>
						<label>Quarter</label>
							<select id='quarter' name='newquarter' class='form-control'>
								<option value=''>-------Select Quarter------</option>
								<option value='Q1'>Q1</option>
								<option value='Q2'>Q2</option>
								<option value='Q3'>Q3</option>
								<option value='Q4'selected>Q4</option>
							</select>
				</div>";
				break;
			}
		}
		?>
		
		<?php
			 if(isset($_GET['edit'])) {
					Switch($status) {
						case "Processing" :
						 echo "<div class='form-group'>
								<label>Status</label>
									<select id='status' name='newstatus' class='form-control'>
										<option value=''>---------Select Status-------</option> 
										<option value='Processing'Selected>Processing</option> 
										<option value='Completed'>Completed</option>
									</select>
								</div>";
						  break;
							case "Completed" :
							 echo "<div class='form-group'>
									<label>Status</label>
										<select id='status' name='newstatus' class='form-control'>
											<option value=''>---------Select Status-------</option> 
											<option value='Processing'>Processing</option> 
											<option value='Completed'Selected>Completed</option>
										</select>
									</div>";
							  break;
							 }
							}
							?>
		<div class="form-group">
			<input type="text" class="form-control" id="pname" name="newpersonname" value="<?php echo $pname;?>" Placeholder="Enter Authorised Person Name">
		</div>
		<div cass="form-group">
			<input type="text" class="form-control" id="mail" name="newemail" value="<?php echo $mail;?>" Placeholder="Enter Your Email">
		</div>
		<div cass="form-group">
			<input type="text" class="form-control" id="number" name="newphonenumber" value="<?php echo $number;?>" Placeholder="Enter Your Phonenumber">
		</div>
		<div cass="form-group">
			<input type="text" class="form-control" id="service" name="newservice" value ="<?php echo $service;?>" Placeholder="Enter Service Charges">
		</div>
		<input type="submit" name="submit" value="submit" class="btn btn-md btn-primary">
	</form>
</div>
</div>
</div>
</body>
</html>
