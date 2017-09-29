<?php
include_once "conn.php";

function active($currect_page){
  $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
  $url = end($url_array);  
  if($currect_page == $url){
      echo 'active'; //class name in css 
  } 
}
?>
<!DOCTYPE html>
<html>
<head>
<script>
var url = "http://localhost/tdsgit/tdss/";
</script>
<title>TDS MANAGEMENT SYSTEM</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel ="stylesheet" href="css/style.css">
	 <style>
	 .main_nav_img {
			    max-height: 30px !important;
				margin-top: -6px !important;
				border-radius: 50%;		
				}
				
		.navbar-main-sm {
			height: 44px !important;
			min-height: 44px !important;
			}
			
		.navbar-second-sm {
			height: 40px !important;
			min-height: 44px !important;
			
			}
	
 
	 </style>
	 <?php
	 include_once "style.php";
	 include_once "script.php";
	 ?>
</head>
<body class="navbar-top-sm-xs">

<!--Top navbars position-->
<div class="navbar-fixed-top">
<!-- Main navbar -->

	<div class="navbar navbar-inverse bg-beige navbar-main-sm">
		<div class="navbar-header">
			<a class="navbar-brand" <h2 style="font-size: 18px;">Adro</h2></a>
		</div>
		<div class="navbar-collapse collapse" id="navbar-first">
			<ul class="nav navbar-nav navbar-right">
				
				<li class="dropdown dropdown-user" id="user-menu">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<span class="glyphicon glyphicon-user" style="font-size: 21px;right: 10px;"></span>
						<span><?php echo $_SESSION['org'];?></span>
						<i class="caret"></i>
					</a> 

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="#"><i class="icon-user-plus"></i> My profile</a></li>
						<li><a href="#"><span class="badge badge-warning pull-right"></span> <i class="icon-comment-discussion"></i> Messages</a></li>
						<li class="divider"></li>
						<li><a href="#"><i class="icon-cog5"></i> Account settings</a></li>
						<li><a href="logout.php"><i class="icon-switch2"></i> Logout</a></li>
						
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->

	<!-- Second navbar -->
<div class="navbar-collapse collapse" id="navbar-second">
	<div class="navbar navbar-default navbar-second-sm">
		<ul class="nav navbar-nav no-border visible-xs-block">
			<li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second-toggle"><i class="icon-menu7"></i></a></li>
		</ul>
		<?php if( $_SESSION['type']=='user'){?>
<!--client menu-->
		<div class="navbar-collapse collapse" id="navbar-second-toggle">
			<ul class="nav navbar-nav navbar-nav-material" style="margin-left: -196px";>
				<!--<li class="<?php //active('');?>"><a href=""><i class="icon-display4 position-left"></i> Dashboard</a></li>-->
				<li class="<?php active('clienttable.php');?>"><a href="clienttable.php"><i class="icon-puzzle4 position-left"></i> TDS</a></li>
				<!--<li class=""><a href="employeetable.php"><i class="icon-puzzle4 position-left"></i>Employee</a></li-->
				<li class="<?php active('addemployee.php');?>"><a href="addemployee.php"><i class="icon-puzzle4 position-left"></i>Employees</a></li>
			</ul>
			<!--page header-->
						

<!--page header-->
		</div>
		<?php }else if($_SESSION['type']=='admin'){?>		
		
		<!--admin menu-->
		<div class="navbar-collapse collapse" id="navbar-second-toggle">
			<ul class="nav navbar-nav navbar-nav-material" style="margin-left: -196px";>
				<li class=""><a href=""><i class="icon-display4 position-left"></i> Dashboard</a></li>
				<!--li class=""><a href="usercreate.php"><i class="icon-puzzle4 position-left"></i>AddUser</a></li-->
				<li class="<?php active('usertable.php');?>"><a href="usertable.php"><i class="icon-puzzle4 position-left"></i>Clients</a></li>
				<li class="<?php active('adminaddemployee.php');?>"><a href="adminaddemployee.php"><i class="icon-puzzle4 position-left"></i>Employees</a></li>
				
			</ul>
		</div>
<?php }?>
<div id="buttonplace"></div>
	</div>
</div>
<!-- /second navbar -->
</div>
<!--/Top navbars position-->

</body>
</html>
	 