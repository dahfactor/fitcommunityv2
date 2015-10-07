<?php 
header('Content-type: application/json');
//$server = "localhost";
//$username = "root";
//$password = "";
//$database = "fitcommunity";

$server = "mysql.dfactor.impactsw.com";
$database = "itr_dfactor";
$username = "dfactor";
$password = "daryl2@12";

$con = mysql_connect($server, $username, $password) or die ("Could not connect: " . mysql_error());

mysql_select_db($database, $con);

$email = mysql_real_escape_string($_POST["email"]);
$comment = mysql_real_escape_string($_POST["comment"]);

$sql = "INSERT INTO comments (email, comment) ";
$sql .= "VALUES ('$email', '$comment')";

if (!mysql_query($sql, $con)) {
	die('Error: ' . mysql_error());
} else {
	echo "Comment added";
}

mysql_close($con);
?>