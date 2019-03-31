<?php
	require 'databaseConnection.php';
	$message = '';
if(!empty($_POST['email'])&&!empty($_POST['password'])){
	
	$records = $db->prepare("INSERT into form1(email, password) VALUES (:email, :password)");
	
	$records->bindParam(':email', $_POST['email']);
	$records->bindParam(':password', $_POST['password']);
	
	if($records->execute()){
			$message = 'The input record Successfully!';
		} else {
			$message = 'Sorry, Registeration is Failure!';
		}
}
?>

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
   <?php
		if(!empty($message)){
	?> <p> <?php echo $message; ?> </p>
	<?php
		}
	?>
		<form action="register.php" method="post" style="background-color:rgba(23,24,24,0.5);">
			<h2 class="sr-only">Login Form</h2>
			<div class="illustration">
				<h1 class="float-left" style="color:rgb(247,249,251);font-size:50px;">Sign Up</h1>
			</div>
			<div class="form-group"><input class="form-control form-control-lg" type="email" name="email" placeholder="Email" style="font-size:25px;"></div>
			<div class="form-group"><input class="form-control form-control-lg" type="password" name="password" placeholder="Password" style="font-size:25px;"></div>
			<div class="form-group"><input class="form-control form-control-lg" type="password" name="cpassword" placeholder="Confirm Password" style="font-size:25px;"></div>
			<div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="Register">Sign Up</button></div><a href="#" class="forgot" style="color:rgb(245,246,248);font-size:16px;">Forgot your email or password?</a></form>
		<h1 class="float-right" style="color:rgb(38,127,143);font-size:29px;">Already have an account?<a href="login.php" style="color:rgb(38,127,143);">Log in</a>&nbsp;</h1>
	</div>
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>