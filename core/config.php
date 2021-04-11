<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpw = "tgdfq5";
$db = "journal";

$con = mysqli_connect($dbhost, $dbuser, $dbpw, $db);

if (!$con) {
	die("Error : " . mysqli_connect_error());
}
/* 
Por si a caso lo necesito
mysqli_close($conn);
*/

$logged = $_SESSION['logged'] ?? '';
$usrid = $_SESSION['id'] ?? '';
$usrnm = $_SESSION['user'] ?? '';