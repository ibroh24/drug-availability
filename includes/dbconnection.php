<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "drugavailability";

$dbConnect = mysqli_connect($server, $username, $password, $database);

if(!$dbConnect){
	echo "cant connect to database!";
}

?>