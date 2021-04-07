<?php
$dbhost = "localhost";
$dbuser = "crealivi_kuki-dv";
$dbpw = "Kukii091DB";
$db = "crealivi_kukidev";

$con = mysqli_connect($dbhost, $dbuser, $dbpw, $db);

if (!$con) {
	die("Error : " . mysqli_connect_error());
}
/* 
Por si a caso lo necesito
mysqli_close($conn);
*/

$sdtsql = "SELECT * FROM config";
$stres = mysqli_query($con, $sdtsql);
$wbcnf = mysqli_fetch_assoc($stres);
