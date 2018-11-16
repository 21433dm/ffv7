<?php /*index.php*/ include 'header.php'; 

$reg= @$_POST['reg'];
// declaring variables to prevent errors
$fn = ""; // First Name
$ln = ""; // Last Name
$un = ""; // Username
$em = ""; // Email
$em2 = ""; // Email 2
$pswd = ""; // Password
$pswd2 = ""; // Password 2
$d = ""; // Signup date
$ucheck = ""; // Check if username exists

// Registration form
$fn = strip_tags(@$_POST['fname']);
$ln = strip_tags(@$_POST['lname']);
$un = strip_tags(@$_POST['uname']);
$em = strip_tags(@$_POST['email']);
$em2 = strip_tags(@$_POST['email2']);
$pswd = strip_tags(@$_POST['password']);
$pswd2 = strip_tags(@$_POST['password2']);
$d = date("Y-m-d"); // Year - Month - Day

if ($reg) {
if ($em == $em2) {
// Check if user already exists
$ucheck = mysql_query("SELECT uname FROM users WHERE uname='$un'");
// Count the number of rows where uname = $un
$check = mysql_num_rows($ucheck);
if ($check == 0) {
// Check all of the fields have been filled in
if ($fn&&$ln&&$un&&$em&&$em2&&$pswd&&$pswd2) {
// Check that passwords match
if ($pswd == $pswd2) {
// Check the maximum length of username/first name/last name does not exxed 25 characters
if (strlen($un)>25||strlen($fn)>25||strlen($ln)>25) {
echo "The maximum limit for Username, First Name and Surname is 25 characters!";
} 
else
{
// Check the length of the password does not exceed 25 characters and is not less than 5 characters	
if (strlen($pswd)>25||strlen($pswd)<5) {
echo "Your password must be between 5 and 25 characters long!";
}
else	
{
// Encrypt the password and password 2 using md5 before sending to the database
$pswd = md5($pswd);
$pswd2 = md5($pswd2);
$query = mysql_query("INSERT INTO users VALUES ('','$un','$fn','$ln','$em','$pswd','$d','0')");
die("<h2>Welcome to Chesterfield College Higher Computing</h2>Login to your account to get started ...");
}			
}
}
else {
echo "Your passwords don't match!";
}
}
else {
echo "Please fill in all the fields!";
}
}
else {
echo "Username already taken!";
}
}
else {
echo "Your emails don't match!";
}
}

// User login code

if (isset($_POST["ulogin"]) && isset($_POST["plogin"])) {
	$ulogin = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["ulogin"]); // filter everything but numbers and letters
	$plogin = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["plogin"]); // filter everything but numbers and letters
	$plogin_md5 = md5($plogin);
$sql = mysql_query("SELECT id FROM users WHERE uname='$ulogin' AND password='$plogin_md5' LIMIT 1"); // query
	// Check for their existence
	$usercount = mysql_num_rows($sql); // Count the number of rows returned
	if ($usercount == 1) {
		while($row = mysql_fetch_array($sql)) {
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
					<h2>Already a member? Sign in below!</h2>
					<form action="index.php" method="POST">
						<input class="StyleTxtField" type="text" name="ulogin" size="25" placeholder="Username ..." /><br><br>
						<input class="StyleTxtField" type="password" name="plogin" size="25" placeholder="Password ..." /><br><br>
						<input type="submit" name="login" value="Login" />
					</form>
				</td>
				<td width="40%" valign="top">
					<h2>Sign Up Below!</h2>
					<form action="index.php" method="POST">
						<input class="StyleTxtField" type="text" name="fname" size="25" placeholder="First name ..." /><br><br>
						<input class="StyleTxtField" type="text" name="lname" size="25" placeholder="Surname ..." /><br><br>
						<input class="StyleTxtField" type="text" name="uname" size="25" placeholder="Username ..." /><br><br>
						<input class="StyleTxtField" type="text" name="email" size="25" placeholder="Email address ..." /><br><br>
						<input class="StyleTxtField" type="text" name="email2" size="25" placeholder="Confim email address ..." /><br><br>
						<input class="StyleTxtField" type="password" name="password" size="25" placeholder="Password ..." /><br><br>
						<input class="StyleTxtField" type="password" name="password2" size="25" placeholder="Confirm password ..." /><br><br>
						<input type="submit" name="reg" value="Sign Up!" />
					</form>	
				</td>
			</tr>
		</table>
<?php include 'footer.php'; ?>