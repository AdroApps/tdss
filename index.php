<?php	
include_once "conn.php";

if(isset($_POST['sub'])){
	$mail = $_POST['mail'];
    $pwd = $_POST['password'];
    $email="";
    $password="";
    $client_sql = "SELECT * FROM `usercreate` WHERE `email` = '".$mail."' AND `password` = '".$pwd."'";
    $client_result = mysqli_query($conn , $client_sql);
	$admin_sql = "SELECT * FROM `admincreate` WHERE email = '".$mail."' AND password = '".$pwd."'";
    $admin_result = mysqli_query($conn , $admin_sql);
    //echo $sql;
    if(mysqli_num_rows($client_result) != 0) {
		  while($client_row=mysqli_fetch_assoc($client_result)) {
			$email=$client_row['email'];
			$password=$client_row['password'];
			$_SESSION['user_id'] = $client_row['id'];		
			$_SESSION['org']=$client_row['organization'];
		}
		if($email == $mail && $password == $pwd) {
			header('Location:clienttable.php');
			$_SESSION['e'] = $_POST['mail'];
			 $_SESSION['type']='user';
			
		}
	}
	else if(mysqli_num_rows($admin_result) != 0){
		while($admin_row=mysqli_fetch_assoc($admin_result)) {
			$email=$admin_row['email'];
			$password=$admin_row['password'];
			$_SESSION['user_id'] = $admin_row['id'];
			$_SESSION['org']=$admin_row['organization'];
		}
		if($email == $mail && $password == $pwd) {
			
			header('Location:usertable.php');
			$_SESSION['e'] = $_POST['mail'];
				$_SESSION['type']='admin';

		}
    
      }
    else {
        echo "<center><h2 style='margin-top:10px;color:#273246;font-size:18px'>Invalid Email/Password</h2></center>";
    }
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
 <link rel = "stylesheet" href="css/style.css">
    <title>LOGIN</title>
	 <?php 
	include_once  "style.php";
	?>
</head>
<body>
	<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default" style="margin-top:50%">
                <div class="panel-heading">
                    <center><h3 class="panel-title"><b>LOGIN</b></h3></center>
                </div>
                <div class="panel-body">
                    <form action="" method="POST">
						<fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Email" name="mail" type="text" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password">
                            </div>

                            <!-- Change this to a button or input when using this as a form -->
			<input type="submit" name="sub" value="Login" class="btnbg btn btn-lg btn-success btn-block">
                      
			<!--input type="submit" name="submit" value="submit" class="btn btn-md btn-primary"-->
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
 <?php 
	include_once  "script.php";
	?>
</body>
</html>


