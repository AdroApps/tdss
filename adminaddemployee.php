<?php
include_once "conn.php";
include_once "header.php";
if(isset($_POST['name']))   {
	$ename = $_POST['name'];
	$pan = $_POST['pan'];
	$adhar = $_POST['adhar'];
    $orgid=$_POST['orgid'];
	$sql = "INSERT INTO `addemployee`(`employeename` , `pan` ,`adhar`,`userid`,`orgid`) VALUES ('".$ename."' , '".$pan."' , '".$adhar."','".$_SESSION['user_id']."','".$orgid."')";  
	
	$data  = mysqli_query($conn,$sql);
	
	if($data)
	{
		echo 'moved database' ;
	}
	else
	{
		echo 'not moved'.mysqli_error($conn);
	}
  }
  $sql1 = "SELECT * FROM `addemployee`";
  $data1 = mysqli_query($conn, $sql1);
 
	if($data1)
	{
		echo '' ;
	}
	else
	{
		echo 'not moved'.mysqli_error($conn);
	}
  
?>

<!--page header-->
	<button type="New" class="btn btn-xs btncls  btn-default" data-toggle="modal" data-target="#myModal">New</button>
						

<!--page header-->
<div class="panel panel-flat newpanel">
<div class="table-responsive pre-scrollable" style="max-height:506px">
					
	<table class="table table-hover table-condensed newtable">
		<thead>
			<tr>
				

				<th>Employee Name</th>
				<th>Pan Number</th>
				<th>Adhar Number</th>
				<th>Organization Name</th>
			</tr>
		</thead>
		<tbody>
			<?php
				
				while($row = mysqli_fetch_array($data1)){
					
					echo "<tr>
					<td>".$row[2]."</td>";
					echo
					"<td>".$row[3]."</td>";
					echo
					"<td>".$row[4]."</td>";
					echo
					"<td>".getOrganisation($row[5])."</td>";
					echo"
					  <td><class='text-center'>
							<ul class='icons-list'>
								<li class='dropdown'>
									  <a href='#' class='dropdown-toggle' data-toggle='dropdown' >
										
										  <span class='glyphicon glyphicon-collapse-down'></span>
										</a>
									
									<ul class='dropdown-menu dropdown-menu-right' >
											<li><a href='aedit.php?edit=$row[0]'> Edit</a></li>
											<li><a href='adelete.php?delete=$row[0]'>Delete</a></li>
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
				<input type="text" class ="form-control" id="pan" name="pan" Placeholder="Enter Pan Number">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" id="name" name="name" Placeholder="Enter Employee FullName">
			</div>
			<div class="form-group">
				<input type="text" class ="form-control" id="adhar" name="adhar" Placeholder="Enter Adhar Number">
			</div><div class="form-group">
			<select class="form-control" id="orgid" name="orgid">
 <option selected="selected"> Select Client</option>
<?php $sql_getorg="SELECT id,organization FROM usercreate";

$res_getorg=mysqli_query($conn, $sql_getorg);


 while($row_org = mysqli_fetch_array($res_getorg)){

 ?>
 <option value="<?php echo $row_org[0];?>"><?php echo $row_org[1];?></option>
 
 <?php
  }
?>
</select>	</div>
		<input type="button" value="submit" id="edit-submit" class="btn btn-md  btnbg btn-primary">
	</form>
	</div>
	</div>
	<!----/modal Content--->
</div>
</div>
<!---modal--->

<?php 
function getOrganisation($id){
$conn = mysqli_connect(DB_HOST, DB_UNAME, DB_PASSWORD, DB_NAME);
 $getorg="SELECT organization FROM usercreate WHERE id=".$id;
$rgetorg=mysqli_query($conn, $getorg);
$row = mysqli_fetch_assoc($rgetorg);
return $row['organization'];
}
?>
