<?php
//connection to the database 
$servername = "";
$username = "";
$password = "";
$dbname = "";
	//MySQLi Object-oriented
	// Create connection
try
{
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
} 
catch(PDOException $e)
{
	die("Connection failed: " . $conn->connect_error);
}


?>