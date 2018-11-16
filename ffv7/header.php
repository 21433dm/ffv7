<!DOCTYPE html>
<html>
	<head>
		<title>Higher Computing</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
		<script src="js/main.js" type="text/javascript"></script>
	</head>
	<body>
		<div class="headerMenu">
			<div class="wrapper">
				<div class="logo">
					<img src="./img/logo.png" />
				</div>
			</div>
		</div>
<?php  /*header.php*/ include 'connect.php'; 
session_start();
if (!isset($_SESSION['ulogin'])) {
	echo '<div id="menu">
				<a href="signup.php">Sign Up</a>
				<a href="login.php">Log In</a>
			</div>';
}
else if (isset($_SESSION['ulogin'])) {
	echo '<div id="menu">
				<a href="profile.php">Profile</a>
				<a href="acc_settings.php">Account Settings</a>
				<a href="logout.php">Log Out</a>
			</div>';	
}
?>

		
