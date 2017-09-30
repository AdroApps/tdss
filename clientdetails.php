<?php
include_once "conn.php";
include_once "header.php";
//session_set();
$id = $_GET['clientdetails'];
$_SESSION['qid'] = $_GET['clientdetails'];
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

$sql1 = "SELECT * FROM `clienttable` WHERE `quarter` = '".$quarter."' AND `organization` = '".$organization."'  ";

$data1= mysqli_query($conn,$sql1);
$data2= mysqli_query($conn,$sql1);
$sql_data = "SELECT * FROM `employeetable` WHERE `qid` = '".$id."'  ";
$sql_res= mysqli_query($conn,$sql_data);
while($row = mysqli_fetch_array($sql_res)) {
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
<input type="hidden" id="quarter_id" value="<?php echo $quarter;?>"/>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
 
  <script src="js/jquery.dataTables.min.js"></script>
  <script src="js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
	
<?php

$sql4 = "SELECT * FROM `fileuploads` WHERE userid=".$_SESSION['user_id']." AND qid=".$_GET['clientdetails']." ORDER BY date DESC";
$data4 = mysqli_query($conn, $sql4);
			

	?>

		<!-- Client details -->
	<div class="panel panel-flat panelflat newpanel">
			<table class="table table-hover table-condensed" >
					<h3 style = "margin-left:15px">Organization TDS Information</h3>
						<thead>
							<tr align="center">
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
							<tr align="center">
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
					<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
					<td>Total TDS amount : <?php echo "$tdsamount1tot";?></td>
				</tr>
				<tr>
					<th><?php echo "$month2";?></th><td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
					<td>Total TDS amount  :  <?php echo "$tdsamount2tot";?></td>
				</tr>
				
				<tr>
					<th><?php echo "$month3";?></th><td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
					<td>Total TDS amount  :  <?php echo "$tdsamount3tot";?></td>
				</tr>
				<tr>
					<th></th><td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
					<td>Service Charges : <?php echo "$service";?></td>
				</tr>
				<tr>
					<th></th><td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
					<td>Grand Total : <?php echo "<b>$totaltdsamount</b>";?></td>
				</tr>
			
			</table>
	</div>
	<!-----Quarter Table---->
			
		<!--Employee table-->
	
	<center>
	<!--div class="col-lg-12">
	<div class ="panel panel-flat" style="margin-top:5px"> 
		<div class="table-responsive pre-scrollable" style="max-height:506px"-->
<div class="panel panel-flat panelflat newpanel">
	<div  id="add"  class="btn btn-sm btn-default btnbg" style="text-align:right;">Add New Employee</div>
	<div class="table-responsive pre-scrollable noscroll">
     
<table class="table table-hover table-condensed" id="user_data">
 <thead>
             <tr align="center">
                <th>Employee Fullname</th>
				<th width="5%">Pan Number</th>
				<th width="5%">Month 1</th>
				<th width="4%">salary</th>
				<th width="6%">TDS amount</th>
				<th width="5%">Month 2</th>
				<th width="4%">salary</th>
				<th width="6%">TDS amount</th>
				<th width="5%">Month 3</th>
				<th width="4%">salary</th>
				<th width="6%">TDS amount</th>		
                <th>Delete</th>
             </tr>
     </thead>

	</table>
</div>
</div>
<!--/Employee table-->
<?php
$psql="select pan,employeename from employeetable where userid=".$_SESSION['user_id'];

$pan_res = mysqli_query($conn, $psql);
$panos=array();
while($row = mysqli_fetch_array($pan_res)) {
$panos[$row['employeename']]=$row['pan'];
//	array_push($panos, $row['pan']);
	//$pannos=implode(',',$panos);
}$object = new stdClass();

foreach ($panos as $key => $value)
{
    $object->$key = $value;
}
$object = json_decode(json_encode($array), FALSE);

?>
<input type="hidden" id="pannos" value='<?php echo json_encode($panos);?>'/>

<!-----Attach File form and Table--->
	<div class="col-lg-12">
		<form action="" method="post" id="file-upload" name="file-upload" enctype="multipart/form-data">
			<center><div style="position:relative">
                            <a class="btn btn-sm btn-default" href="javascript:;" style="margin-bottom:30px">
                                <input type="file" name="file_url" >
                            </a>
                            &nbsp;<span class="label label-info" id="img"></span>
                            <input type="submit"   class="btn btn-sm btn-default btnbg" style=" margin-top: -30px;margin-left: 11px" name="filesubmit" value="Submit">
             </div>
            				
		</form>
	<div class="panel panel-flat panelflat newpanel">
					<!--
	<table class="table table-hover table-condensed newt">
	
				<thead>
					<tr align="center">
						<th>Name</th>
						<th>View</th>
						<th >Download</th>
						<th >Date</th>
						<th >Delete</th>
					</tr>
				</thead>
			</table>-->
			<div class="table-responsive pre-scrollable noscroll">
     
 <table class="table table-hover table-condensed">

				<tbody>
			
				<?php
				 $currentPath = $_SERVER['PHP_SELF']; 

				 // output: Array ( [dirname] => /myproject [basename] => index.php [extension] => php [filename] => index ) 
				 $pathInfo = pathinfo($currentPath); 

				 // output: localhost
				 $hostName = $_SERVER['HTTP_HOST']; 

				 // output: http://
				 $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https'?'https':'http';

				 // return: http://localhost/myproject/
				  $url=$protocol.'://'.$hostName.$pathInfo['dirname']."/fileuploads/";

				while($roww = mysqli_fetch_array($data4)){
				 
				 ?>
				 	<tr align="center">
						<th>Name</th>
						<th>View</th>
						<th >Download</th>
						<th >Date</th>
						<th >Delete</th>
					</tr>
				 <tr align="center" >
				 <td ><?php echo $roww[2]?></td>
				 
				 <td ><a href="<?php echo $url.$roww[2];?>" target="_blank">View</a></td>
				 
				 <td ><a href="<?php echo $url.$roww[2];?>" download>Download</a></td>
				 <?php echo
				 "<td>".$roww[3]."</td>";
				 echo "<td  >
						<a class='btn btn-xs btnbg remove-image' id='$roww[0],$roww[2]' >
							<span class='glyphicon glyphicon-trash'></span>
						</a>
					</td>";
				 echo "</tr>";
				}
			$_SESSION['clientdetails']=$_GET['clientdetails'];	?>
				
			</tbody>
			
			</table>
</div>
</div>
<!-----/Attach File form and Table--->

<input type="hidden" id="qid" value="<?php echo $_GET['clientdetails'];?>"/>

<script type="text/javascript" language="javascript" >
 $(document).ready(function(){

//s.appendTo('body');
  fetch_data();

  function fetch_data()
  {
   var dataTable = $('#user_data').DataTable({
    "processing" : true,
    "serverSide" : true,
    "order" : [],
    "ajax" : {
     url:"fetch.php",
     type:"POST"
    }
   });
   
  $("#user_data").css("width","100%");
  }
  
  function update_data(id, column_name, value)
  {
   $.ajax({
    url:"update.php",
    method:"POST",
    data:{id:id, column_name:column_name, value:value},
    success:function(data)
    {
     
     $('#user_data').DataTable().destroy();
     fetch_data();
    }
   });
   setInterval(function(){
    $('#alert_message').html('');
   }, 5000);
  }

  $(document).on('blur', '.update', function(){
   var id = $(this).data("id");
   var column_name = $(this).data("column");
   var value = $(this).text();
   update_data(id, column_name, value);
  });
  
  $('#add').click(function(){
	  var p=JSON.parse($('#pannos').val());
console.log(p);
var s = $('<select />').attr('id','panid').attr('class','form-control');

 for (var key in p) {
      if (p.hasOwnProperty(key)) {
        console.log(key + " -> " + p[key]);
		  var panop=$('<option />', {value: p[key], text: p[key]}).attr('id',key);
		    panop.appendTo(s);
      }
    }
	  var temp = new Array();
// this will return an array with strings "1", "2", etc.
//temp = pannos.split(",");
console.log(s);
	  var month1,month2,month3;
	  var quarter=$('#quarter_id').val();
	  if(quarter == "Q1") {
		month1 = "January";
		month2 = "Febuary";
		month3 = "March";
    } else if(quarter == "Q2") {
		month1 = "April";
		month2 = "May";
		month3 = "June";
    } else if(quarter == "Q3") {
		month1 = "July";
		month2 = "August";
		month3 = "September";
    } else {
		month1 = "October";
		month2 = "November";
		month3 = "December";
    }
   var html = '<tr>';
   html += '<td width="5%" contenteditable id="data1"></td>';
   html += '<td width="5%" contenteditable id="data2"></td>';
    html += '<td width="5%" contenteditable id="data3">'+month1+'</td>';
   html += '<td width="5%" contenteditable id="data4"></td>';
    html += '<td  width="5%" contenteditable id="data5"></td>';
   html += '<td width="5%" contenteditable id="data6">'+month2+'</td>';
    html += '<td width="5%" contenteditable id="data7"></td>';
   html += '<td width="5%" contenteditable id="data8"></td>';
    html += '<td width="5%" contenteditable id="data9">'+month3+'</td>';
   html += '<td width="5%" contenteditable id="data10"></td>';
    html += '<td width="5%" contenteditable id="data11"></td>';
   html += '<td><button type="button" name="insert" id="insert" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-pencil"></span></button></td>';
   html += '<td></td>';
   html += '</tr>';
   $('#user_data tbody').prepend(html);
   $('#data2').append(s);
  });

$(document).on('change','#panid',function(){
 $tr = $(this).parent().parent();
	   console.log($tr);
  var id = $(this).children(":selected").attr("id");
  alert(id);
  $('td#data1', $tr).text(id);
});
  $(document).on('click', '#insert', function(){
   var first_name = $('#data1').text();
   var pno = $('#data2 option:selected').text();
   var month1 = $('#data3').text();
   var sal1 = $('#data4').text();
   var tdsamt1 = $('#data5').text();
   var month2 = $('#data6').text();
   var sal2 = $('#data7').text();
   var tdsamt2 = $('#data8').text();
   var month3 = $('#data9').text();
   var sal3 = $('#data10').text();
   var tdsamt3 = $('#data11').text();
   var qid=$('#qid').val();
   if(first_name != '' && pno != '' && month1!='' && sal1!='' && tdsamt1!='' && month2!='' && sal2!='' && tdsamt2!=''  && month3!='' && sal3!='' && tdsamt3!='')
   {
    $.ajax({
     url:"insert.php",
     method:"POST",
     data:{first_name:first_name, pno:pno,month1:month1,sal1:sal1,tdsamt1:tdsamt1,month2:month2,month3:month3,sal3:sal3,sal2:sal2,tdsamt2:tdsamt2,tdsamt3:tdsamt3,qid:qid},
     success:function(data)
     {
      $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
      $('#user_data').DataTable().destroy();
      fetch_data();
	  location.reload();
     }
    });
    setInterval(function(){
     $('#alert_message').html('');
    }, 5000);
   }
   else
   {
    alert("Both Fields is required");
   }
  });
 
  $(document).on('click', '.delete', function(){
   var id = $(this).attr("id");
   if(confirm("Are you sure you want to remove this?"))
   {
    $.ajax({
     url:"delete.php",
     method:"POST",
     data:{id:id},
     success:function(data){
      $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
      $('#user_data').DataTable().destroy();
      fetch_data();
     }
    });
    setInterval(function(){
     $('#alert_message').html('');
    }, 5000);
   }
  });
  $("#user_data").css("width","100%");
 });
 $("body").on("click",".remove-image",function(){
    var id = $(this).attr('id');
    var c_obj = $(this).parent().parent();
	console.log(c_obj);
   var r = confirm("Are you sure you want to delete this?");
    if (r == true) {
    $.ajax({
        dataType: 'json',
        type:'POST',
        url: url+'fileupload.php',
        data:{id:id,type:'delete'},
    }).done(function(data){
        c_obj.remove();
        alert('File Deleted Successfully.');
       location.reload();
    });
 }

});
 $('#file-upload').submit( function(e) {
    e.preventDefault();

    var data = new FormData(this); // <-- 'this' is your form element
    
		$.ajax({
        type:'POST',
        url: url+'fileupload.php',        
		data: data,
            cache: false,
            contentType: false,
            processData: false,
      }).done(function(data){       
        alert('File uploaded Successfully.');
		location.reload();
    });

	});
</script>


