<?php /*login.php*/ include 'header.php'; 

// User login code

if (isset($_POST["ulogin"]) && isset($_POST["plogin"])) {
	$ulogin = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["ulogin"]); // filter everything but numbers and letters
	$plogin = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["plogin"]); // filter everything but numbers and letters
	$plogin_md5 = md5($plogin);
$sql = mysqli_query($con,"SELECT id FROM users WHERE uname='$ulogin' AND password='$plogin_md5' LIMIT 1"); // query
	// Check for their existence
	$usercount = mysqli_num_rows($sql); // Count the number of rows returned
	if ($usercount == 1) {
		while($row = mysqli_fetch_array($sql)) {
			$id = $row["id"];
	}
		$_SESSION["ulogin"] = $ulogin;
		header("location: home.php");
		exit();
		} else {
		echo "That information is incorrect, please try again ...";
		exit();
	}
}
?>
		<div class="table">
		<table>
			<tr>
				<td width="60%" valign="top">
					<h2>Sign in below!</h2>
					<form action="login.php" method="POST">
						<input class="StyleTxtField" type="text" name="ulogin" size="25" placeholder="Username ..." /><br><br>
						<input class="StyleTxtField" type="password" name="plogin" size="25" placeholder="Password ..." /><br><br>
						<input type="submit" name="login" value="Login" />
					</form>
				</td>
			</tr>
		</table>
<?php include 'footer.php'; ?>