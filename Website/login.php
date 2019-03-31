<?php 
	session_start();
	require('databaseConnection.php');
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		// username and password sent from form 
		
		$myusername = mysqli_real_escape_string($db,$_POST['email']);
		$mypassword = mysqli_real_escape_string($db,$_POST['password']); 
		
		$sql = "SELECT email FROM form1 WHERE email = '$myusername' and passcode = '$mypassword'";
		$result = mysqli_query($db,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$active = $row['active'];
		
		$count = mysqli_num_rows($result);
		
		// If result matched $myusername and $mypassword, table row must be 1 row
		
		if($count == 1) {
			session_register("myusername");
			$_SESSION['login_user'] = $myusername;
			header("location: loginsuccess.php");
		}else {
			$error = "Your Login Name or Password is invalid";
			header("location: loginsuccess.php");
		}
	}?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>login</title>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
	<link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
	<div class="login-dark">
		<form action="login.php" method="post" style="background-color:rgba(30,40,51,0.54);">
			<h2 class="sr-only">Login Form</h2>
			<div class="illustration">
				<h1 class="float-left" style="color:rgb(247,249,251);font-size:50px;">Log In</h1>
			</div>
			<div class="form-group"><input class="form-control form-control-lg" type="email" name="email" placeholder="Email" style="font-size:25px;"></div>
			<div class="form-group"><input class="form-control form-control-lg" type="password" name="password" placeholder="Password" style="font-size:25px;"></div>
			<div class="form-group"><button class="btn btn-primary btn-block" type="submit">Log In</button></div><a href="#" class="forgot" style="color:rgb(245,246,248);font-size:16px;">Forgot your email or password?</a></form>
		<h1 class="float-right" style="color:rgb(38,127,143);font-size:29px;">Creat account?<a href="register.php" style="color:rgb(38,127,143);">Sign up</a>&nbsp;</h1>
	</div>
	<div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>