<!DOCTYPE html>
<html>
<head>

	<title>Create New Account</title>
	<!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Lauren added to fix drop down not working -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/signup.css">

</head>
<body>
	<div class="signup-form">
		<form action="" method="post">
			<div class="form-header">
				<h2>Sign Up</h2>
				<p>Fill out this form to create account</p>
			</div>
			<div class="form-group">
				<label>Username</label>
				<input type="text" class="form-control"name="user_name" placeholder="Example: jtheBug" autocomplete="off" required>
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" class="form-control"name="user_pass" placeholder="password" autocomplete="off" required>
			</div>
			<div class="form-group">
				<label>Email Address</label>
				<input type="email" class="form-control"name="user_email" placeholder="someone@site.com" autocomplete="off" required>
			</div>
			

			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block btn-lg" name="sign_up">Sign Up
				</button>
			</div>
			<?php include("signup_user.php"); ?>
		</form>
		<div class="text-center small" style="color: #67428B;">Already have an account? <a href="signin.php">Sign In</a></div>

	</div>

</body>
</html>