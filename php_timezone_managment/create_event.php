<?php

$mysqli = new mysqli("localhost", "root", "", "php_timezone_managment");
if ($mysqli->connect_errno) {
	echo "Failed to connect to MySQL: " . $mysqli->connect_error;
	exit();
}

$sql1 = "INSERT INTO `events` (`event_name`, `event_time`) VALUES ('Event scheduled at 8AM, +0', '2022-01-06 08:00:00');";
$sql2 = "INSERT INTO `events` (`event_name`, `event_time`) VALUES ('Event scheduled at 8AM, +5', '2022-01-06 08:00:00');";
$sql3 = "INSERT INTO `events` (`event_name`, `event_time`) VALUES ('Event scheduled at 8AM, +8', '2022-01-06 08:00:00');";


$mysqli -> query('SET time_zone = "+00:00";');
$mysqli->query($sql1);

$mysqli -> query('SET time_zone = "+05:00";');
$mysqli->query($sql2);

$mysqli -> query('SET time_zone = "+08:00";');
$mysqli->query($sql3);


?>