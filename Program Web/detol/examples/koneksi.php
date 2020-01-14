<?php
$servername = "localhost";
$username = "root";
$password = "hahaha111";
$database = "gerbangtol";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn) {
	echo "";
}
else{
	echo "Tidak";
}

?>
