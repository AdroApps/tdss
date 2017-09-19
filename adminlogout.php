<?php
include_once "conn.php";

$_SESSION = array();
session_destroy();
header('Location: adminlogin.php');
?>

