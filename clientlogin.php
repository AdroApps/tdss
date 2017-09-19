<?php	
include_once "conn.php";
//echo "started";
if(isset($_POST['sub'])){
	$mail = $_POST['mail'];
    $pwd = $_POST['password'];
    $email="";
    $password="";
    //echo $mail;

    $sql = "SELECT * FROM `usercreate` WHERE `email` = '".$mail."' AND `password` = '".$pwd."'";
    //echo $sql;
    $result = mysqli_query($conn , $sql);
    if(mysqli_num_rows($result) != 0) {
	  while($row=mysqli_fetch_assoc($result)) {
        $email=$row['email'];
        $password=$row['password'];
        //$name = $row['name'];
    }
    if($email == $mail && $password == $pwd) {
		//echo "success";
        
        header('Location:clienttable.php');
        $_SESSION['e'] = $_POST['mail'];
        echo $_SESSION['e'];
        echo $_POST['mail'];
        $_SESSION['id'] = $row['id'];
        
    }
}
    else {
        echo "<center><h2 style='margin-top:10px;color:red;font-size:18px'>incorrect Email/Password</h2></center>";
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

    <title>Client Login</title>
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
                    <center><h3 class="panel-title"><b>Client Login</b></h3></center>
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
			<input type="submit" name="sub" value="submit" class="btn btn-lg btn-success btn-block">
                        
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


