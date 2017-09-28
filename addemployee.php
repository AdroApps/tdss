<?php
include_once "conn.php";
include_once "header.php";
if(isset($_POST['ename']))   {
	$ename = $_POST['ename'];
	$pan = $_POST['number'];
	$adhar = $_POST['num'];

	$sql = "INSERT INTO `addemployee`(`employeename` , `pan` ,`adhar`,`userid`) VALUES ('".$ename."' , '".$pan."' , '".$adhar."','".$_SESSION['user_id']."')";  

	$data  = mysqli_query($conn,$sql);
	
	if($data)
	{
		$txt= 'moved database' ;
	}
	else
	{
		$txt =  'not moved'.mysqli_error($conn);
	}
  }
  $sql1 = "SELECT * FROM `addemployee` WHERE userid=".$_SESSION['user_id'];
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

<button type="New" class="btn btn-xs btncls btn-default" data-toggle="modal" data-target="#myModal">New Employee</button>
	

<div class="panel panel-flat panelflat newpanel">
<table class="table table-hover table-condensed">
		<thead>
			<tr>
				

				<th width="25%">Employee Name</th>
				<th width="25%">Pan Number</th>
				<th width="25%">Adhar Number</th>
				<th width="10%">Edit</th>
				<th width="10%">Delete</th>
				
			</tr>
		</thead>
		</table>
<div class="table-responsive pre-scrollable newtable">
					
	<table class="table table-hover table-condensed">
	
		<tbody>
			<?php
				
				while($row = mysqli_fetch_array($data1)){
					
					echo "<tr id=".$row[0].">
					<td width='25.5%' class='edit-pan'>".$row[2]."</td>";
					echo
					"<td width='25.5%' class='edit-name'>".$row[3]."</td>";
					echo
					"<td width='25.5%' class='edit-adhar'>".$row[4]."</td>";
					echo"
					 <td width='10%'>
						<a data-toggle='modal' data-target='#myEmployeeModal' class='edit_addemployee btn btn-xs btnbg'>
							<span class='glyphicon glyphicon-edit'></span>
						</a>
					</td>
					<td width='10%'>
						<a href='adelete.php?delete=$row[0]' class='btn btn-xs btnbg'>
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
				<input type="text" class ="form-control" id="pan" name="number" Placeholder="Enter Pan Number">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" id="name" name="ename" Placeholder="Enter Employee FullName">
			</div>
			<div class="form-group">
				<input type="text" class ="form-control" id="adhar" name="num" Placeholder="Enter Adhar Number">
			</div>
			
		<input type="submit" value="submit"  class="btn btn-md btn-primary">
	</form>
	</div>
	</div>
	<!----/modal Content--->
</div>
</div>
<!---modal--->

<!-----EDIT MODAL---->

<!-- Modal -->
<div id="myEmployeeModal" class="modal fade" role="dialog">
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
				<input type="text" class ="form-control" id="edit-pan" name="number" Placeholder="Enter Pan Number">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" id="edit-name" name="ename" Placeholder="Enter Employee FullName">
			</div>
			<div class="form-group">
				<input type="text" class ="form-control" id="edit-adhar" name="num" Placeholder="Enter Adhar Number">
			</div>
			
		<input type="button" value="submit"  id="edit-submit" class="btn btn-md btn-primary btnbg">
	</form>
	</div>
	</div>
	<!----/modal Content--->
</div>
</div>
<!---modal--->

<script>
var url = "http://localhost/tds_cleaned/";

$("body").on("click","#edit-submit",function(){
		var id=$('#edit-id').val();
		var name= $('#edit-name').val();
		var number=$('#edit-pan').val();
		 var adhar=$('#edit-adhar').val();

		$.ajax({
        dataType: 'json',
        type:'POST',
        url: url+'aedit.php',
        data:{id:id,number:number,name:name,adhar:adhar}
    }).done(function(data){       
        alert('Record Updated Successfully.');
		$('#myEmployeeModal').modal('hide');
        location.reload();
    });
	
});
 $("body").on("click",".edit_addemployee",function(){
      var $tr = $(this).closest('tr');
	   
	  console.log($('.edit-name' , $tr).text());
	  console.log($('.edit-name' , $tr).html());
	   var id=$tr.attr('id');
	   var name = $('.edit-name' , $tr).text();
	  // console.log(name);
	   var pan =  $('.edit-pan', $tr).text();
	   var adhar =  $('.edit-adhar', $tr).text();
	   
		$('#edit-id').val(id);
        $('#edit-pan').val(pan);
        $('#edit-name').val(name);
		$('#edit-adhar').val(adhar);
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