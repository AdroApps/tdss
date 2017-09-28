<?php
include_once "conn.php";
include_once "header.php";

$sql2 = "SELECT * FROM `usercreate` WHERE `userid` = '".$_SESSION['user_id']."' ";

$data1 = mysqli_query($conn , $sql2);

/*
if(isset($_POST['organization']))
{
	$organization  = $_POST['organization'];
	$mail = $_POST['mail'];
	$password = $_POST['password'];
	$pname = $_POST['personname'];
	$number  = $_POST['phonenumber'];
	$tan = $_POST['tan'];
	$city = $_POST['city'];
	$area = $_POST['area'];
	$service = $_POST['service'];
	$userid = $_SESSION['user_id'];
	
	
	$sql = "INSERT INTO `usercreate` ( `organization` , `email` , `password` , `pname` , `number` , `tan` , `city` , `area` , `service` , `username`,`userid`) VALUES ('".$organization."' , '".$mail."' , '".$password."' , '".$pname."' , '".$number."' , '".$tan."' , '".$city."' , '".$area."' , '".$service."' , '".$username."', '".$userid."')";
	$data = mysqli_query($conn,$sql);
	echo $sql;
	if($data)
	{
		$txt =  'moved database';
	}
	else{
		$txt =  'not moved'.mysqli_error($conn);
	}
}*/
?>


<!--/Top navbars position-->
<!--page header-->
	<button type="New" class="btn btn-xs btnbg btncls btn-default" data-toggle="modal" data-target="#myModal">New</button>
<!--page header-->
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
						<input type = "text" class="form-control" id ="orgname" name="organization" placeholder = "Enter Organization Name">
						</div>
						<div class="form-group">
						<input type = "email" class="form-control" id ="mail" name="mail" placeholder = "Enter Email">
						</div>
						<div class="form-group">
						<input type = "password" class="form-control" id ="password" name="password" placeholder = "Enter Password">
						</div>
						<div class="form-group">
						<input type="text" class="form-control" id="pname" name="personname" Placeholder="Enter Authorised Person Name">
					    </div>
						<div class="form-group">
						<input type = "number" class="form-control" id ="number" name="phonenumber" placeholder = "Enter Phonenumber">
						</div>
						<div class="form-group">
						<input type="text" class ="form-control" id="tan" name="tan" Placeholder="Enter Tan">
						</div>
						<div class="form-group">
						<input type="text" class ="form-control" id="city" name="city" Placeholder="Enter City">
						</div>
						<div class="form-group">
						<input type="text" class ="form-control" id="area" name="area" Placeholder="Enter Area">
						</div>
						<div class="form-group">
						<input type="text" class="form-control" id="service" name="service" Placeholder="Enter Service Charges">
					    </div>
						<input type="submit" name="submit" value="submit" class="btn btn-md btnbg btn-success">

					</form>
</div>
</div>
	<!--/modal content-->
</div>
</div>
<!---modal-->
<div class="panel panel-flat newpanel">
<div class="table-responsive pre-scrollable" style="max-height:506px;">
	<table class="table table-hover table-condensed newtable">
		<thead>
			<tr>
				
				<th>Organization Name</th>
				<th>Email</th>
				<th>Password</th>
				<th>Authorised Personname</th>
				<th>Phone Number</th>
				<th>Tan</th>
				<th>City</th>
				<th>Area</th>
				<th>Service</th>
			</tr>
		</thead>
		<tbody>
			<?php
			
			while($row=mysqli_fetch_array($data1)){

				//echo"<tr>
				//<td>".$row[0]."</td>";
				echo"<tr>
				<td><a href='auditorclienttable.php?organization=$row[1]'>".$row[1]."</a></td>";
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
											<li><a href='edit.php?edit=$row[0]'> Edit</a></li>
											<li><a href='delete.php?delete=$row[0]'>Delete</a></li>
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

