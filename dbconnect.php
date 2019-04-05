<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "formproject";
$db2 = "login";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);
$conn->query("set names utf8");
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$cond = new mysqli($servername, $username, $password, $db2);
$cond->query("set names utf8");
// Check connection
if ($cond->connect_error) {
	die("Connection failed: " . $cond->connect_error);
}
?>
