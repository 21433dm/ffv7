<?php /*send_post.php*/
include 'connect.php'; 

$post = $_POST['post'];
if ($post != "") {
$date_added = date("Y-m-d");
$added_by = "test123";
$user_posted_to = "test123";

$query = mysqli_query($con,"INSERT INTO posts VALUES('','$post','$date_added','$added_by','$user_posted_to')")
or die (mysqli_error());
}
else
{
echo "You must enter something in the post field before you can send it ...";	
}
?>