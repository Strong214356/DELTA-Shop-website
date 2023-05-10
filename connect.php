<?php
// TODO : change values with the good ones
$host = "localhost";
$user = "root";
$pass = "";
$db   = "dentreprise";

$mysql = new mysqli($host, $user, $pass, $db);
if($mysql->connect_error) {
	die("Error during database connection : " . $mysql->connect_error);
}
