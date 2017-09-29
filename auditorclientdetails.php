<?php
include_once "conn.php";
include_once "header.php";
//session_set();
$id = $_GET['clientdetails'];
$_SESSION['qid'] = $_GET['clientdetails'];
$quarter ="";
$sql = "SELECT * From `clienttable` WHERE `id` = '".$id."' ";
$data= mysqli_query($conn,$sql);
$quarter ="";

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

$tdsamount1tot = "";
$tdsamount2tot = "";
$tdsamount3tot = "";

$sql1 = "SELECT * FROM `employeetable` WHERE `qid` = '".$id."'  ";
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
$sql4 = "SELECT * FROM `fileuploads` WHERE qid=".$id." ORDER BY date DESC ";
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
			$txt= "error";
		}
		if (move_uploaded_file($fileTmpLoc, $store)) {
			//$path = "http://localhost:8080/tds/fileuploads/$filename";
			
			$sql3 = "INSERT into `fileuploads`(`file` , `date` , `userid`,`qid`) VALUES ('".$filename."' , '".$date."','".$_SESSION['user_id']."','".$id."')";
			$data3 = mysqli_query($conn, $sql3);
			if($data3) {
				$txt= "success";
			}
			else {
				  $txt = "not".mysqli_error($conn);
			 }
		}
	} else {
		$path = "";
		
	}
}
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
<input type="hidden" id="recid" value="<?php echo $_GET['clientdetails'];?>"/>
<input type="hidden" id="userid" value="<?php echo $_SESSION['user_id'];?>"/>

		<!-- Client details -->
  <div class="col-lg-12" style="margin-top:20px";>
		<div class="panel panel-flat newpanel">
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
								<td><?php //echo "$status";?>
								
								<div class="form-group">
				<select  id="status" name="status" class="form-control statuschange">
				        <option <?php echo ($status == '') ? "selected='selected'" : ''; ?>>Select Status</option>
						<option <?php echo (trim($status) == 'Completed') ? "selected='selected'": ''; ?>>Completed</option>
						<option <?php echo (trim($status) == 'Processing') ? "selected='selected'": ''; ?>">Processing</option>
						
                     

				</select>
			</div>
								
								
								
								</td>
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
	<!--employee table header>
		<center><a href="auditornewemployee.php?clientdetails=</center>?php echo $id; ?>" class="btn btn-sm btn-default">New</a></center-->
	<!--/employee table header-->		
		<!--Employee table-->
	<div class="col-lg-12">
	<div class ="panel panel-flat newpanel" style="margin-top:5px"> 
		<div class="table-responsive pre-scrollable">

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
				
				//if(!$data1=""){
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
					  
					 </tr>";
				}
			//}
				?>
		</tbody>

	</table>
</div>
</div>
</div>
<!--Employee table-->

<!-----Attach file form---->
<form action="" method="post" id="file-upload" name="file-upload" enctype="multipart/form-data">
			<center><div >
                            <a class="btn btn-sm btn-default" href="javascript:;" style="    background: #ffffff;margin-bottom:30px">
                                <input type="file" name="file_url">
                            </a>
                            &nbsp;<span class="label label-info" id="img"></span>
                            <input type="submit"  class="btn btn-sm btn-default btnbg" style=" margin-top: -30px;margin-left: 11px" name="filesubmit" value="Submit">
             </div>
            				
</form>
<!-----/Attach file form---->

<!-----Attach File Table--->
	<div class="col-lg-12">
	<div class ="panel panel-flat newpanel"> 
		<div class="table-responsive pre-scrollable" style="max-height:250px">

		<table class="table table-hover table-condensed">
				<thead>
					<tr>
						<th>Name</th>
						<th>View</th>
						<th>Download</th>					
						<th>Date</th>
					</tr>
				</thead>
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
					
					<tr>
					<td><?php echo $roww[2]?></td>
					
					<td><a href="<?php echo $url.$roww[2];?>" target="_blank">View</a></td>
					
					<td><a href="<?php echo $url.$roww[2];?>" download>Download</a></td>
					<?php echo
					"<td>".$roww[3]."</td>";
					echo "<td width='10%' >
						<a class='btn btn-xs btnbg remove-image' id='$roww[0],$roww[2]' >
							<span class='glyphicon glyphicon-trash'></span>
						</a>
					</td>";
					echo "</tr>";
				}
				?>
				
			</tbody>
			
			</table>
	</div>
</div>
</div>
<!-----/Attach File Table--->
<script>
$(document).ready(function() {

    // Monitor your selects for change by classname
    $('.statuschange').on('change', function() { 

         // Save the place increment and value of the select
              var value = $(this).val();

	         var userid= $("#userid").val();
             var recid = $("#recid").val();

         // Send this data to a script somewhere via AJAX
         $.ajax({
             method: "POST",
             url: "api/statuschange.php",
             data: { 
               userid:userid,
			   recid:recid,
               value: value
             }
          })
          .done(function( msg ) {
              alert( "Data Saved");
			  location.reload();
          });
    });
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

</body>
</html>
