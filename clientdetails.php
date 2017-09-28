<?php
include_once "conn.php";
include_once "header.php";
//session_set();
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

$sql1 = "SELECT * FROM `clienttable` WHERE `quarter` = '".$quarter."' AND `organization` = '".$organization."'  ";

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
	
?>  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
 
  <script src="js/jquery.dataTables.min.js"></script>
  <script src="js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
	
<?php

$sql4 = "SELECT * FROM `fileuploads` WHERE userid=".$id." ORDER BY date DESC";
$data4 = mysqli_query($conn, $sql4);
			
if(isset($_POST['filesubmit'])) {
	$date = date("Y/m/d h:i:s");

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
			//$path = "http://localhost:8080/tds/fileuploads/$filename";
			//echo $path;
			$sql3 = "INSERT into `fileuploads`(`file` , `date` , `userid`) VALUES ('".$filename."' , '".$date."','".$id."')";
			$data3 = mysqli_query($conn, $sql3);
			if($data3) {
				$txt = "success";
			}
			else {
				 $txt= "not".mysqli_error($conn);
			 }
		}
	} else {
		$path = "";
		
	}
}
	?>

		<!-- Client details -->
	<div class="panel panel-flat panelflat newpanel">
			<table class="table table-hover table-condensed" >
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
      <tr>
      <th>Employee Fullname</th>
				<th width="5%">Pan Number</th>
				<th width="5%">Month 1</th>
				<th width="5%">salary</th>
				<th width="5%">TDS amount</th>
				<th width="5%">Month 2</th>
				<th width="5%">salary</th>
				<th width="5%">TDS amount</th>
				<th width="5%">Month 3</th>
				<th width="5%">salary</th>
				<th width="5%">TDS amount</th>
		
       <th>Delete</th>
      </tr>
     </thead>

	</table>
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
                            <input type="submit"  class="btn btn-sm btn-default btnbg" style=" margin-top: -30px;margin-left: 11px" name="filesubmit" value="Submit">
             </div>
            				
		</form>
	<div class="panel panel-flat panelflat newpanel">
					
	<table class="table table-hover table-condensed">
	
				<thead>
					<tr>
						<th width="25%">Name</th>
						<th width="25%">View</th>
						<th width="25%">Download</th>
						<th width="25%">Date</th>
					</tr>
				</thead>
			</table>
			<div class="table-responsive pre-scrollable noscroll">
     
 <table class="table table-hover table-condensed">

				<tbody>
				<!--?php
				while($roww = mysqli_fetch_array($data4)){
					
					
					echo "<tr>
					<td><a href=''>".$roww[1]."</a></td>";
					echo
					"<td>".$roww[2]."</td>";
					
					"</tr>";
				}
				?-->
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
				 
				 <tr>
				 <td width="25.5%"><?php echo $roww[3]?></td>
				 
				 <td width="25.5%"><a href="<?php echo $url.$roww[3];?>" target="_blank">View</a></td>
				 
				 <td width="25.5%"><a href="<?php echo $url.$roww[3];?>" download>Download</a></td>
				 <?php echo
				 "<td>".$roww[4]."</td>";
				 
				 "</tr>";
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
   var html = '<tr>';
   html += '<td width="5%" contenteditable id="data1"></td>';
   html += '<td width="5%" contenteditable id="data2"></td>';
    html += '<td width="5%" contenteditable id="data3"></td>';
   html += '<td width="5%" contenteditable id="data4"></td>';
    html += '<td  width="5%" contenteditable id="data5"></td>';
   html += '<td width="5%" contenteditable id="data6"></td>';
    html += '<td width="5%" contenteditable id="data7"></td>';
   html += '<td width="5%" contenteditable id="data8"></td>';
    html += '<td width="5%" contenteditable id="data9"></td>';
   html += '<td width="5%" contenteditable id="data10"></td>';
    html += '<td width="5%" contenteditable id="data11"></td>';
   html += '<td><button type="button" name="insert" id="insert" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-pencil"></span></button></td>';
   html += '<td></td>';
   html += '</tr>';
   $('#user_data tbody').prepend(html);
  });
  
  $(document).on('click', '#insert', function(){
   var first_name = $('#data1').text();
   var pno = $('#data2').text();
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
</script>


