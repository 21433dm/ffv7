<?php /*home.php*/ include 'header.php';
$ulogin = $_SESSION['ulogin'];
if (isset($_SESSION['ulogin'])) {
	$check = mysqli_query($con,"SELECT uname, fname FROM users WHERE uname='$ulogin'");
	if (mysqli_num_rows($check)===1) {
	$get = mysqli_fetch_assoc($check);
	$firstname = $get['fname'];
}
}
 echo <<<_END
	<h2>Hello, $firstname</h2>
	<br>Welcome to the Higher Computing Social Network!
	<br>Click Profile to continue or Log Out to logout ....
_END
?>
<?php include 'footer.php'; ?>