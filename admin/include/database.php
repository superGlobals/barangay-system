<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "bis_db";

try {

	$conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {

	echo "Connection Failed" . $e->getMessage();
}