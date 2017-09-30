<!--client table-->
<?php
include_once "conn.php";
include_once "header.php";
//session_set();
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


<!--Client Table-->
<div class="panel panel-flat newpanel">
<div class="table-responsive pre-scrollable " style="min-height:506px;">
	<table class="table table-hover table-condensed ">
		<thead>
			<tr>
				
				<th>Organization Name</th>
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