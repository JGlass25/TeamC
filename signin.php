<!DOCTYPE html>
<html>
<head>

	<title>Log into account</title>
	<!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Lauren added to fix drop down not working -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/signin.css">

</head>
<body>
	<div class="signin-form">
		<form action="" method="post">
			<div class="form-header">
				<h2>Sign In</h2>
				<p>Login to Account</p>
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" class="form-control"name="email" placeholder="someone@sju.edu" autocomplete="off" required>
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" class="form-control"name="pass" placeholder="password" autocomplete="off" required>
			</div>
			<div class="small">Forgot Password? <a href="forgot_pass.php">Click Here</a></div><br> 
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block btn-lg" name="sign_in">Sign In
				</button>
			</div>
			<?php include("signin_user.php"); ?>
		</form>
		<div class="text-center small" style="color: #67428B;">Don't have an account? <a href="signup.php">Create One</a></div>

	</div>

</body>
</html>