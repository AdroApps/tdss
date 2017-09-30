<?php
include_once "conn.php";
include_once "header.php";

  $sql1 = "SELECT * FROM `internal_users` where auditor_id=".$_SESSION['user_id'];
  $data1 = mysqli_query($conn, $sql1);
 
	if($data1)
	{
		$txt= '' ;
	}
	else
	{
		$txt= 'not moved'.mysqli_error($conn);
	}
  
?>

<!-- Modal -->
<div id="myuserModal" class="modal fade" role="dialog">
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
				<input type="text" class ="form-control" id="name" name="name" Placeholder="Enter Employee Name">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" id="email" name="email" Placeholder="Enter Email Id">
			</div>
			<div class="form-group">
				<input type="text" class ="form-control" id="password" name="password" Placeholder="Enter Password">
			</div>
		<input type="button" value="submit" id="add-submit"  class="btn btn-md btnbg btn-primary">
	</form>
	</div>
	</div>
	<!----/modal Content--->
</div>
</div>
<!---modal--->

<!---internal_users table-->
<div class="panel panel-flat newpanel">
<div class="table-responsive pre-scrollable" style="min-height:506px">
					
	<table class="table table-hover table-condensed">
		<thead>
			<tr>
				

				<th>Employee Name</th>
				<th>Email</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php
				
				while($row = mysqli_fetch_array($data1)){
					
					echo "<tr  align='center' id=".$row[0].">
					<td class='edit-name'>".$row[2]."</td>";
					echo
					"<td class='edit-email'>".$row[3]."</td>";
					echo"
					<td class='edit-password' style='display:none';>".$row[4]."</td>
				<td>
						<a  data-toggle='modal' data-target='#myInternalUserModal' class='edit_addUser btn btn-xs btnbg'>
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
<!---internal_users table-->


<!-----EDIT MODAL---->

<!-- Modal -->
<div id="myInternalUserModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
<div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">EDIT ENTRY</h4>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
		<input type="hidden" id="edit-id"/>
			<div class="form-group">
				<input type="text" class ="form-control" id="edit-name" name="name" Placeholder="Enter Employee Name">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" id="edit-email" name="email" Placeholder="Enter Email Id">
			</div>
			<div class="form-group">
				<input type="text" class ="form-control" id="edit-password" name="num" Placeholder="Enter Password">
			</div>
			
		<input type="submit" value="submit"  id="edit-submit" class="btn btn-md btnbg btn-primary">
	</form>
	</div>
	</div>
	<!----/modal Content--->
</div>
</div>
<!---modal--->
<script>
$( document ).ready(function() {
	$('#buttonplace').html('<button type="New" class="btn btn-xs btncls  btn-default" data-toggle="modal" data-target="#myuserModal">Add User</button>');
    console.log( "ready!" );
});
$("body").on("click","#edit-submit",function(){
		var id=$('#edit-id').val();
		var name=$('#edit-name').val();
       var email= $('#edit-email').val();
		 var password=$('#edit-password').val();
       
		$.ajax({
        dataType: 'json',
        type:'POST',
        url: url+'iedit.php',
        data:{id:id,name:name,email:email,password:password}
    }).done(function(data){       
        alert('Record Updated Successfully.');
		$('#myUserModal').modal('hide');
		location.reload();
       
    });
	
});
 $("body").on("click",".edit_addUser",function(){
       $tr = $(this).closest('tr');
	   var id=$tr.attr('id');
	   var name =  $('.edit-name', $tr).text();
	   var email = $('.edit-email' , $tr).text();
	   var password =  $('.edit-password', $tr).text();
	  alert(password);
		$('#edit-id').val(id);
        $('#edit-name').val(name);
        $('#edit-email').val(email);
		 $('#edit-password').val(password);
        });
	$("body").on("click","#add-submit",function(){
	var name=$('#name').val();
   var email= $('#email').val();
	 var password=$('#password').val();

	$.ajax({
	dataType: 'json',
	type:'POST',
	url: url+'userinsert.php',
	data:{name:name,email:email,password:password}
}).done(function(data){       
	alert('Inserted Successfully.');
	$('#myUserModal').modal('hide');
	location.reload();
   
});
	
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
        url: url+'idelete.php',
        data:{id:id}
    }).done(function(data){
        c_obj.remove();
        alert('Record Deleted Successfully.');
       
    });
 }

});
</script>

