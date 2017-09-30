
<?php	
include_once 'conn.php';

		$file = $_FILES['file']['tmp_name'];
		$handle = fopen($file, "r");
		$c = 0;
		while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
		{
			
		if( $filesop[0]!='Pan Number'){
			echo "<pre>";
			print_r($filesop);			
			echo "</pre>";
		//$date = $filesop[1];
      //  $newDate = date("Y-m-d", strtotime($date));			
			$pan = $filesop[0];
			$name = $filesop[1];
			$adar = $filesop[2];
			$orgid=getOrganisation($filesop[3]);
			$userid=getUserId($filesop[4]);
            $count=checkMail($filesop[0]);
			echo $count;
			$ldate=date('Y-m-d H:i:s');
			if($count)
			{ $query = "insert into addemployee(userid,employeename,pan,adhar, orgid) values ('$userid', '$name','$pan','$adar','$orgid')";
			 $rgetorg=mysqli_query($conn, $query);
			}
		     $c = $c + 1;
			$i++;
		}
	
		}		if($sql){
				echo "You database has imported successfully. You have inserted ". $c ." records";
			}else{
				echo "Sorry! There is some problem.";
			}

function getOrganisation($id){
$conn = mysqli_connect(DB_HOST, DB_UNAME, DB_PASSWORD, DB_NAME);

 $getorg="SELECT id FROM usercreate WHERE organization='".$id."'";

$rgetorg=mysqli_query($conn, $getorg);
$row = mysqli_fetch_assoc($rgetorg);
return $row['id'];
}
function checkMail($pan){
$conn = mysqli_connect(DB_HOST, DB_UNAME, DB_PASSWORD, DB_NAME);

 $getorg="SELECT count(*) as count FROM addemployee WHERE pan='".$pan."'";

$rgetorg=mysqli_query($conn, $getorg);
$row = mysqli_fetch_assoc($rgetorg);
if( $row['count']>0){
	return false;
}
else{
	return true;
}
}
function getUserId($id){
$conn = mysqli_connect(DB_HOST, DB_UNAME, DB_PASSWORD, DB_NAME);
 $getuserorg="SELECT id FROM usercreate WHERE email='".$id."'";
$getorg="SELECT id FROM admincreate WHERE email='".$id."'";
$rgetorg=mysqli_query($conn, $getorg);
$userorg=mysqli_query($conn, $getuserorg);
if( mysqli_num_rows($rgetorg)>0){
	$row = mysqli_fetch_assoc($rgetorg);
}
if( mysqli_num_rows($userorg)>0){
	$row = mysqli_fetch_assoc($userorg);
}
return $row['id'];
}
	?>