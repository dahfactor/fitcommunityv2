<?php 
//$server = "localhost";
//$username = "root";
//$password = "";
//$database = "fitcommunity";

$server = "mysql5.000webhost.com";
$database = "a7881654_fitcom";
$username = "a7881654_root";
$password = "ece211";

$con = mysql_connect($server, $username, $password) or die ("Could not connect: " . mysql_error());

mysql_select_db($database, $con);

$name = mysql_real_escape_string($_POST["name"]);
$email = mysql_real_escape_string($_POST["email"]);
$age = mysql_real_escape_string($_POST["age"]);
$gender = mysql_real_escape_string($_POST["gender"]);
$password = mysql_real_escape_string($_POST["password"]);

if ($name == "" or $email == "" or $age == "" or $gender == "" or $password == ""){
	exit();
}

$sqlcheck = mysql_query("SELECT * from accounts where email = '$email'", $con);
$sqlcheckcount = mysql_num_rows($sqlcheck);

if ($sqlcheckcount > 0){
	$message = 1;
	echo json_encode($message);

}else{

	$sql = "INSERT INTO accounts (fullname, age, gender, email, password) VALUES ('$name', '$age', '$gender', '$email', '$password')";

	if (!mysql_query($sql, $con)) {
		$message = die('Error: ' . mysql_error());
		echo json_encode($message);
	} else {
		//success
	}
}

mysql_close($con);
?>