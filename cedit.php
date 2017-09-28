<?php
include_once "conn.php";
//session_set();

 $id = $_POST['id'];

	
	 $newtan = $_POST['tan'];
	 $newyear = $_POST['year'];
	 $newquarter = $_POST['quarter'];
	 $newpname = $_POST['pname'];
	 $newmail = $_POST['mail'];
	 $newnumber = $_POST['no'];
	 
	 $sql = "UPDATE `clienttable` SET  `tan` = '".$newtan."' , `year` = '".$newyear."'  ,`quarter` = '".$newquarter."' ,`pname` = '".$newpname."' , `email` = '".$newmail."' ,`number` = '".$newnumber."'  WHERE `id` = '".$id."'";
	 $query = mysqli_query($conn ,$sql); 
   if($query) {
    $status='success';
   }
   else {
     $status='failure';
   }
  
   echo json_encode([$status]);