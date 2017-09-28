<?php
//fetch.php
include_once "conn.php";
//$connect = mysqli_connect("localhost", "root", "", "testing");
$columns = array('first_name', 'pno','month1','sal1','tdsamt1','month2','sal2','tdsamt2','month3','sal3','tdsamt3',);

$query = "SELECT * FROM employeetable WHERE userid='".$_SESSION['user_id']."' AND qid='".$_SESSION['clientdetails']."'";

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY id DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$number_filter_row = mysqli_num_rows(mysqli_query($conn, $query));

$result = mysqli_query($conn, $query . $query1);



$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array[] = '<div contenteditable width="5%" class="update" data-id="'.$row["id"].'" data-column="employeename">' . $row["employeename"] . '</div>';
 $sub_array[] = '<div contenteditable  width="5%" class="update" data-id="'.$row["id"].'" data-column="pan">' . $row["pan"] . '</div>';
 $sub_array[] = '<div contenteditable width="5%" class="update" data-id="'.$row["id"].'" data-column="month1">' . $row["month1"] . '</div>';
 $sub_array[] = '<div contenteditable width="5%" class="update" data-id="'.$row["id"].'" data-column="salary1">' . $row["salary1"] . '</div>';
 $sub_array[] = '<div contenteditable width="5%" class="update" data-id="'.$row["id"].'" data-column="tdsamount1">' . $row["tdsamount1"] . '</div>';
 $sub_array[] = '<div contenteditable width="5%" class="update" data-id="'.$row["id"].'" data-column="month2">' . $row["month2"] . '</div>';
 $sub_array[] = '<div contenteditable width="5%" class="update" data-id="'.$row["id"].'" data-column="salary2">' . $row["salary2"] . '</div>';
 $sub_array[] = '<div contenteditable width="5%" class="update" data-id="'.$row["id"].'" data-column="tdsamount2">' . $row["tdsamount2"] . '</div>';
 $sub_array[] = '<div contenteditable width="5%" class="update" data-id="'.$row["id"].'" data-column="month3">' . $row["month3"] . '</div>';
 $sub_array[] = '<div contenteditable width="5%" class="update" data-id="'.$row["id"].'" data-column="salary3">' . $row["salary3"] . '</div>';
 $sub_array[] = '<div contenteditable width="5%" class="update" data-id="'.$row["id"].'" data-column="tdsamount3">' . $row["tdsamount3"] . '</div>';

 $sub_array[] = '<a  class=" btn btn-xs btnbg"><span class="glyphicon glyphicon-trash delete" id="'.$row["id"].'"></span> </a>';
 $data[] = $sub_array;
}

function get_all_data($conn)
{
 $query = "SELECT * FROM employeetable WHERE userid='".$_SESSION['user_id']."' ORDER BY id DESC";
 $result = mysqli_query($conn, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($conn),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);




?>

