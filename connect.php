<?php

//variables
$servername = "localhost";
$db = "vividcustoms";
$table = "user";
$username = "root"; //TODO add real escape string to the this line and the next
$password = "";

//creating connection
$conn = new mysqli($servername, "root", "", $db);
//checking connection
if($conn->connect_error){
	die("We are just not connecting anymore " . $conn->connect_error);
}
echo "<p>Connection established!</p>";

?>