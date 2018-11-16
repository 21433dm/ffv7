<?php /*connect.php*/
$con = mysqli_connect("localhost","root","") or die ("Couldn't connect to SQL server");
mysqli_select_db($con,"ff") or die ("Couldn't select database");
?>