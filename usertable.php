<?php
include_once "conn.php";
include_once "header.php";

$sql2 = "SELECT * FROM `usercreate` WHERE `userid` = '".$_SESSION['user_id']."' ";

$data1 = mysqli_query($conn , $sql2);


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
	if($data)
	{
		$txt =  'moved database';
	}
	else{
		$txt =  'not moved'.mysqli_error($conn);
	}
}
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
				echo "<tr id=".$row[0].">
				<td class='edit-orgname'><a href='auditorclienttable.php?organization=$row[1]'>".$row[1]."</a></td>";
				echo
				"<td class='edit-mail'>".$row[2]."</td>";
				echo
				"<td class='edit-password'>".$row[3]."</td>";
				echo
				"<td class='edit-pname'>".$row[4]."</td>";
				echo
				"<td class='edit-number'>".$row[5]."</td>";
				echo
				"<td class='edit-tan'>".$row[6]."</td>";
				echo
				"<td class='edit-city'>".$row[7]."</td>";
				echo
				"<td class='edit-area'>".$row[8]."</td>";
				echo
				"<td class='edit-service'>".$row[9]."</td>";
				
				echo"
				<td>
						<a  data-toggle='modal' data-target='#myUserModal' class='edit_User btn btn-xs btnbg'>
							<span class='glyphicon glyphicon-edit'></span>
						</a>
					</td>
					<td>
						<a id='$row[0]' class='btn btn-xs btnbg remove-item'>
							<span class='glyphicon glyphicon-trash'></span>
						</a>
					</td>
				
				</tr>";
			}
			
			?>
		</tbody>
	</table>
</div>
</div>

<!----EDIT MODAL--->

<!-- Modal -->
<div id="myUserModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
<div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">EDIT ENTRY</h4>
      </div>
      <div class="modal-body">
        <form action ="" method="POST">
		<input type="hidden" id="edit-id"/>
						<div class="form-group">
						<input type = "text" class="form-control" id ="edit-orgname" name="organization" placeholder = "Enter Organization Name">
						</div>
						<div class="form-group">
						<input type = "email" class="form-control" id ="edit-mail" name="mail" placeholder = "Enter Email">
						</div>
						<div class="form-group">
						<input type = "password" class="form-control" id ="edit-password" name="password" placeholder = "Enter Password">
						</div>
						<div class="form-group">
						<input type="text" class="form-control" id="edit-pname" name="personname" Placeholder="Enter Authorised Person Name">
					    </div>
						<div class="form-group">
						<input type = "number" class="form-control" id ="edit-number" name="phonenumber" placeholder = "Enter Phonenumber">
						</div>
						<div class="form-group">
						<input type="text" class ="form-control" id="edit-tan" name="tan" Placeholder="Enter Tan">
						</div>
						<div class="form-group">
						<input type="text" class ="form-control" id="edit-city" name="city" Placeholder="Enter City">
						</div>
						<div class="form-group">
						<input type="text" class ="form-control" id="edit-area" name="area" Placeholder="Enter Area">
						</div>
						<div class="form-group">
						<input type="text" class="form-control" id="edit-service" name="service" Placeholder="Enter Service Charges">
					    </div>
						<input type="button" name="submit" value="submit" id="edit-submit" class="btn btn-md btn-success btnbg">
						<input type="button" class="btn btn-md btn-default btnbg" name="cancel" value="Cancel" data-dismiss="modal">
            
					</form>
</div>
</div>
	<!--/modal content-->
</div>
</div>
<!---modal-->


<script>

$("body").on("click","#edit-submit",function(){
		var id=$('#edit-id').val();
		var orgname=$('#edit-orgname').val();
       var mail= $('#edit-mail').val();
		 var password=$('#edit-password').val();
        var pname=$('#edit-pname').val();
        var number=$('#edit-number').val();
        var tan=$('#edit-tan').val();
        var city=$('#edit-city').val();
		var area=$('#edit-area').val();
		var service=$('#edit-service').val();

		$.ajax({
        dataType: 'json',
        type:'POST',
        url: url+'edit.php',
        data:{id:id,orgname:orgname,mail:mail,password:password,pname:pname,number:number,tan:tan ,city:city,area:area,service:service}
    }).done(function(data){       
        alert('Record Updated Successfully.');
		$('#myUserModal').modal('hide');
		location.reload();
       
    });
	
});
 $("body").on("click",".edit_User",function(){
       $tr = $(this).closest('tr');
	   var id=$tr.attr('id');
	   var orgname =  $('.edit-orgname', $tr).text();
	   var mail = $('.edit-mail' , $tr).text();
	   var password =  $('.edit-password', $tr).text();
	   var pname = $('.edit-pname' , $tr).text();
	   var number =  $('.edit-number', $tr).text();
	   var tan = $('.edit-tan' , $tr).text();
	   var city =  $('.edit-city', $tr).text();
	   var area =  $('.edit-area', $tr).text();
	   var service =  $('.edit-service', $tr).text();

		$('#edit-id').val(id);
        $('#edit-orgname').val(orgname);
        $('#edit-mail').val(mail);
		 $('#edit-password').val(password);
        $('#edit-pname').val(pname);
		 $('#edit-number').val(number);
        $('#edit-tan').val(tan);
		 $('#edit-city').val(city);
        $('#edit-area').val(area);
        $('#edit-service').val(service);
	  });
$("body").on("click",".remove-item",function(){
    var id = $(this).attr('id');
    var c_obj = $(this).parent().parent();
	console.log(c_obj);
   var r = confirm("Are you sure you want to delete this?");
    if (r == true) {
    $.ajax({
        dataType: 'json',
        type:'POST',
        url: url+'udelete.php',
        data:{id:id}
    }).done(function(data){
        c_obj.remove();
        alert('Record Deleted Successfully.');
       
    });
 }

});
</script>

