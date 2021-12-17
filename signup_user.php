<?php 
include ("include/connection.php");

	if(isset($_POST['sign_up'])) {

		$name = htmlentities(mysqli_real_escape_string($con, $_POST['user_name']));
		$pass = htmlentities(mysqli_real_escape_string($con, $_POST['user_pass']));
		$email = htmlentities(mysqli_real_escape_string($con, $_POST['user_email']));
		$rand = rand(1,2);

		if($name == '') {
			echo "<script>alert('We cannot verify your name')</script>";
		}
		if(strlen ($pass) < 8) {
			echo "<script>alert('Password should be minimum 8 characters')</script>";
			exit();
		}
		$check_email = "SELECT * FROM user where user_email='$email'";
		$run_email = mysqli_query($con, $check_email);

		$check = mysqli_num_rows($run_email);

		if ($check == 1) {
			echo "<script>alert('Email already exists, please try again!')</script>";
			echo "<script>window.open('signup.php', '_self')</script>";
			exit();
		}

		if($rand == 1) 
			$profile_pic = "images/pic1.jpg";
		else if ($rand == 2) 
			$profile_pic = "images/pic2.jpg";

		$insert = "INSERT INTO user (user_name, user_pass, user_email, user_profile) VALUES ('$name', '$pass', '$email', '$profile_pic')";
		$query = mysqli_query($con, $insert);

		if($query) {
			echo "<script>('Congrats $name, your account was created successfully')</script>";

			echo "<script>window.open('signin.php', '_self')</script>";
		}
		else {
			echo "<script>('Registration failed, try again!')</script>";
			echo "<script>window.open('signup.php', '_self')</script>";
		}

		
	}

?>