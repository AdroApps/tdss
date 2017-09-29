<?php
include_once "conn.php";
include_once "header.php";
if(isset($_POST['name']))   {
	$ename = $_POST['name'];
	$panno = $_POST['panno'];
	$adhara = $_POST['adhara'];
    $orgid=$_POST['orgid'];
	$sql = "INSERT INTO `addemployee`(`employeename` , `pan` ,`adhar`,`userid`,`orgid`) VALUES ('".$ename."' , '".$panno."' , '".$adhara."','".$_SESSION['user_id']."','".$orgid."')";  
	
	$data  = mysqli_query($conn,$sql);
	
	if($data)
	{
		$txt= 'moved database' ;
	}
	else
	{
		$txt= 'not moved'.mysqli_error($conn);
	}
  }
  $sql1 = "SELECT * FROM `addemployee`";
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

<!--page header-->
						

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
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php
				
				while($row = mysqli_fetch_array($data1)){
					
					echo "<tr id=".$row[0].">
					<td class='edit-name'>".$row[2]."</td>";
					echo
					"<td class='edit-pan'>".$row[3]."</td>";
					echo
					"<td class='edit-adhar'>".$row[4]."</td>";
					echo
					"<td class='edit-org'>".getOrganisation($row[5])."</td>";
				
					echo"
				<td>
						<a  data-toggle='modal' data-target='#myAdminEditModal' class='edit_User btn btn-xs btnbg'>
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
<!--/Client Table-->
<!-- Modal -->
<div id="myAdminModal" class="modal fade" role="dialog">
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
				<input type="text" class ="form-control" id="panno" name="panno" Placeholder="Enter Pan Number">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" id="name" name="name" Placeholder="Enter Employee FullName">
			</div>
			<div class="form-group">
				<input type="text" class ="form-control" id="adhara" name="adhara" Placeholder="Enter Adhar Number">
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
		<input type="submit" value="submit" id="edit-submit" class="btn btn-md  btnbg btn-primary">
	</form>
	</div>
	</div>
	<!----/modal Content--->
</div>
</div>
<!---modal--->
<!-- Modal -->
<div id="myAdminEditModal" class="modal fade" role="dialog">
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
				<input type="text" class ="form-control" id="edit-pan" name="panno" maxlength="10" placeholder="Enter Pan Number">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" id="edit-name" name="name"   placeholder="Enter Employee FullName">
			</div>
			<div class="form-group">
				<input type="text" class ="form-control" id="edit-adhar" name="adhara" maxlength="16" placeholder="Enter Adhar Number">
			</div><div class="form-group">
			<select class="form-control" id="edit-orgid" name="orgid">
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
<script>
$( document ).ready(function() {
	$('#buttonplace').html('<button type="New" class="btn btn-xs btncls  btn-default" data-toggle="modal" data-target="#myAdminModal">Add employee</button>');
    console.log( "ready!" );
});
$("body").on("click","#edit-submit",function(){
		var id=$('#edit-id').val();
		var panno=$('#edit-pan').val();
       var name= $('#edit-name').val();
		 var adhara=$('#edit-adhar').val();
        
		var reg = /[^A-Za-z0-9]/;		
if(panno.length!=10 || reg.test(panno)){
	alert('Invalid Pan card Number');
}

else if(adhara.length!=16){
	alert('Invalid Aadhar Number');
}
else{
		$.ajax({
        dataType: 'json',
        type:'POST',
        url: url+'aedit.php',
        data:{id:id,pan:panno,name:name,adhar:adhara}
    }).done(function(data){       
        alert('Record Updated Successfully.');
	//	$('#myUserModal').modal('hide');
		location.reload();
       
    });
}
});
 $("body").on("click",".edit_User",function(){
	 alert(3);
       $tr = $(this).closest('tr');
	   var id=$tr.attr('id');
	   var pan =  $('.edit-pan', $tr).text();
	   var name = $('.edit-name' , $tr).text();
	   var adhar =  $('.edit-adhar', $tr).text();
var org =  $('.edit-org', $tr).text();

		$('#edit-id').val(id);
        $('#edit-pan').val(pan);
        $('#edit-name').val(name);
		 $('#edit-adhar').val(adhar);
		$("#edit-orgid option:contains("+org+")").attr('selected', true).change();
		   //$('#edit-orgid').val('srtry');
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
        url: url+'adelete.php',
        data:{id:id}
    }).done(function(data){
        c_obj.remove();
        alert('Record Deleted Successfully.');
       
    });
 }

});
</script>
