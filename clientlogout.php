<?php
include_once "conn.php";

session_destroy();
header('Location: clientlogin.php');
exit;
?>

