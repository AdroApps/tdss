<?php
include_once "conn.php";
session_set();
$id = $_GET['clientdetails'];
$sql = "SELECT * From `clienttable` WHERE `id` = '".$id."' ";
$data= mysqli_query($conn,$sql);
$quat;

while($row = mysqli_fetch_assoc($data)) {
	//print_r($row);
	$id = $row['id'];
	$organization = $row['organization'];
	$tan = $row['tan'];
	$year = $row['year'];
	$quarter = $row['quarter'];
	$status = $row['status'];
	$pname = $row['pname'];
	$mail = $row['email'];
	$number = $row['number'];
	$service = $row['service'];//.mysqli_error($conn);
}
//echo "quattttttttttttttttt";
//echo $quat;
$tdsamount1tot = "";
$tdsamount2tot = "";
$tdsamount3tot = "";

$sql1 = "SELECT * FROM `employeetable` WHERE `quarter` = '".$quarter."' AND`organization` = '".$organization."'  ";

$data1= mysqli_query($conn,$sql1);
$data2= mysqli_query($conn,$sql1);

while($row = mysqli_fetch_array($data2)) {
	
	$tdsamount1tot += $row['tdsamount1'];
	$tdsamount2tot += $row['tdsamount2'];
	$tdsamount3tot += $row['tdsamount3'];

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
	$totaltdsamount = $tdsamount1tot + $tdsamount2tot + $tdsamount3tot+$service;
	
?>
<?php
include_once "conn.php";
$sql4 = "SELECT * FROM `fileuploads` ";
$data4 = mysqli_query($conn, $sql4);
			
if(isset($_POST['filesubmit'])) {
	$date = date("Y/m/d");

    //$email = $_POST['email'];
    if(!empty($_FILES['file_url']['name'])) {
		$filename = $_FILES['file_url']['name'];
		$fileTmpLoc = $_FILES['file_url']['tmp_name'];
		$fileType = $_FILES['file_url']['type'];
		$filesize = $_FILES['file_url']['size'];
		$fileErrorMsg = $_FILES['file_url']['error'];
		$store = "fileuploads/" . $filename;
		//$time = date("Y-m-d")."-".time();
		//$created = $time;
		if ($_FILES['file_url']['error'] !== UPLOAD_ERR_OK) {
			die("upload failedwith error code" . $_FILES['file_url']['error']);
			echo "error";
		}
		if (move_uploaded_file($fileTmpLoc, $store)) {
			$path = "http://localhost:8080/tds/fileuploads/$filename";
			echo $path;
			echo "farheen";
			$sql3 = "INSERT into `fileuploads`(`file` , `date`) VALUES ('".$path."' , '".$date."')";
			$data3 = mysqli_query($conn, $sql3);
			if($data3) {
				echo "success";
			}
			else {
				 echo "not".mysqli_error($conn);
			 }
		}
	} else {
		$path = "";
		
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
						<span><?php echo "$organization";?></span>
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

		<!-- Client details -->
  <div class="col-lg-12" style="margin-top:20px";>
		<div class="panel panel-flat" style="margin-top: 25px;">
					<table class="table table condensed">
						<h3 style = "margin-left:15px">Organization TDS Information</h3>
						<thead>
							<tr>
								<th>Organization</th>
								<th>tan</th>
								<th>year</th>
								<th>Quarter</th>
								<th>status</th>
								<th>Person Name</th>
								<th>Email</th>
								<th>Phone Number</th>
					
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo "$organization";?></td>
								<td><?php echo "$tan";?></td>
								<td><?php echo "$year";?></td>
								<td><?php echo "$quarter";?></td>
								<td><?php echo "$status";?></td>
								<td><?php echo "$pname";?></td>
								<td><?php echo "$mail";?></td>
								<td><?php echo "$number";?></td>
								
							</tr>
						</tbody>
					</table>	
			<!-- /client details -->
			
			<!-----Quarter Table---->
					
						<table class= "table table condensed">
						<h3 style = "margin-left:15px">Quarter - <?php echo "$quarter";?></h3>
							<tr>
								<th><?php echo "$month1";?></th>
								<td>Total Tds amount : <?php echo "$tdsamount1tot";?></td>
							</tr>
							<tr>
								<th><?php echo "$month2";?></th>
								<td>Total Tds amount  :  <?php echo "$tdsamount2tot";?></td>
							</tr>
							
							<tr>
								<th><?php echo "$month3";?></th>
								<td>Total Tds amount  :  <?php echo "$tdsamount3tot";?></td>
							</tr>
							<tr>
								<th></th>
								<td>Service Charges : <?php echo "$service";?></td>
							</tr>
							<tr>
								<th></th>
								<td>Grand Total : <?php echo "$totaltdsamount";?></td>
							</tr>
						
						</table>
				</div>
		</div>
	<!-----Quarter Table---->
			
		<!--Employee table-->
	<center><a href="newemployee.php?clientdetails=<?php echo $id; ?>" class="btn btn-sm btn-default">New</a></center>
	<div class="col-lg-12">
	<div class ="panel panel-flat" style="margin-top:5px"> 
		<div class="table-responsive pre-scrollable" style="max-height:506px">

		<table class="table table-hover table-condensed">
		<thead>
			<tr>
			
				<th>Employee Fullname</th>
				<th>Pan Number</th>
				<th>Month 1</th>
				<th>salary</th>
				<th>TDS amount</th>
				<th>Month 2</th>
				<th>salary</th>
				<th>TDS amount</th>
				<th>Month 3</th>
				<th>salary</th>
				<th>TDS amount</th>
			</tr>
		</thead>
		<tbody>
			<?php
				
				//if($data1=""){
					//echo "<tr><td>No Data to Display</td></tr>";
					//}
				//else {
					
				while($row = mysqli_fetch_array($data1)){
					
					echo "<tr>
					<td>".$row[1]."</td>";
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
					echo
					"<td>".$row[10]."</td>";
					echo
					"<td>".$row[11]."</td>";
					echo"
					 <td><class='text-center'>
							<ul class='icons-list'>
								<li class='dropdown'>
									  <a href='#' class='dropdown-toggle' data-toggle='dropdown' >
										
										  <span class='glyphicon glyphicon-collapse-down'></span>
										</a>
									
									<ul class='dropdown-menu dropdown-menu-right' >
											<li><a href='eedit.php?edit=$row[0]'> Edit</a></li>
											<li><a href='edelete.php?delete=$row[0]'>Delete</a></li>
									</ul>
								</li>
							</ul>
					 </td>
					 </tr>";
				}
			//}
				?>
		</tbody>

	</table>
</div>
</div>
</div>
<!--/Employee table-->


<!-----Attach File form and Table--->
	<div class="col-lg-12">
		<form action="" method="post" enctype="multipart/form-data">
			<center><div style="position:relative">
                            <a class="btn btn-sm btn-default" href="javascript:;" style="margin-bottom:30px">
                                <input type="file" name="file_url">
                            </a>
                            &nbsp;<span class="label label-info" id="img"></span>
                            <input type="submit"  class="btn btn-sm btn-default" style=" margin-top: -30px;margin-left: 11px" name="filesubmit" value="Submit">
             </div>
            				
		</form>
	<div class ="panel panel-flat" style="margin-top:5px"> 
		<div class="table-responsive pre-scrollable" style="max-height:250px">

		<table class="table table-hover table-condensed">
				<thead>
					<tr>
						<th>File</th>
						<th>Date</th>
					</tr>
				</thead>
				<tbody>
				<?php
				while($roww = mysqli_fetch_array($data4)){
					
					
					echo "<tr>
					<td><a href=''>".$roww[1]."</a></td>";
					echo
					"<td>".$roww[2]."</td>";
					
					"</tr>";
				}
				?>
				
			</tbody>
			
			</table>
	</div>
</div>
</div>
<!-----/Attach File form and Table--->

			

</body>
</html>

