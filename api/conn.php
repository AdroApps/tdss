<?php
session_start();

define ('DB_HOST' , 'localhost');

define ('DB_UNAME' , 'root');

define ('DB_PASSWORD' , '');

define ('DB_NAME' , 'tds');

 ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED); 
$conn = mysqli_connect(DB_HOST, DB_UNAME, DB_PASSWORD, DB_NAME);

function session_set()
{
    if(empty($_SESSION['e'])){
     header('Location: clientlogin.php');
    echo $_SESSION['e'];
    }
}
	
/*if($conn) {
	echo "connected to db";
	} else {
		echo "not connected to db";
		}
	
?>*/
?>


