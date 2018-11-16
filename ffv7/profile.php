<?php /*profile.php*/ include 'header.php';
					  include 'connect.php';

if (isset($_GET['u'])) {
	$username = mysqli_real_escape_string($con, $_GET['u']);
	if (ctype_alnum($username)) {
	// Check user exists
	$check = mysqli_query($con,"SELECT uname, fname FROM users WHERE uname='$username'");
	if (mysqli_num_rows($check)===1) {
	$get = mysqli_fetch_assoc($check);
	$username = $get['uname'];
	$firstname = $get['fname'];
	}
	else
	{
	echo "<meta http-equiv=\"refresh\" content=\"0; url=http://localhost:7777/ff/index.php\">";
	exit();	
	}
	}
}
?>
<?php 
$ulogin = $_SESSION['ulogin'];
if (isset($_SESSION['ulogin'])) {
	$check = mysqli_query($con,"SELECT uname, fname FROM users WHERE uname='$ulogin'");
	if (mysqli_num_rows($check)===1) {
	$get = mysqli_fetch_assoc($check);
	$firstname = $get['fname'];
}
}
echo <<<_END
<div class="wrapper">
<div class="postForm">
<textarea name="post" rows="4" cols="70" placeholder="Type your message here ..."></textarea>
<input type="submit" name="send" onclick="javascript:send_post()" value="Post" />
</div>
<br>
<div class="profilePosts">Your Posts will go here ...</div>
<img src="" height="200" width="200"alt="$firstname's Profile" title="firstname;'s Profile" />
<br>
<br>
<div class="textHeader">$firstname's Profile</div>
<br>
<div class="profileLeftSideContent">Some content about this persons profile ...</div>
<br>
<div class="textHeader">$firstname's Friends</div>
<br>
<div class="profileLeftSideContent">
<img src="#" height="50" width="40" />&nbsp;&nbsp;
<img src="#" height="50" width="40" />&nbsp;&nbsp;
<img src="#" height="50" width="40" />&nbsp;&nbsp;
<img src="#" height="50" width="40" />&nbsp;&nbsp;
<img src="#" height="50" width="40" />&nbsp;&nbsp;
<img src="#" height="50" width="40" />&nbsp;&nbsp;
<img src="#" height="50" width="40" />&nbsp;&nbsp;
<img src="#" height="50" width="40" />&nbsp;&nbsp;
</div>
</div>
_END
?>
<?php include 'footer.php'; ?>