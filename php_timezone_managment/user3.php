<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<h2>This user lives in Karachi +5</h2>
<?php

$mysqli = new mysqli("localhost", "root", "", "php_timezone_managment");
if ($mysqli->connect_errno) {
	echo "Failed to connect to MySQL: " . $mysqli->connect_error;
	exit();
}
$mysqli -> query('SET time_zone = "+00:00";');

/* $sql1 = "INSERT INTO `events` (`event_name`, `event_time`) VALUES ('Event scheduled at 8AM, +0', '2022-01-10 08:00:00');";
$sql2 = "INSERT INTO `events` (`event_name`, `event_time`) VALUES ('Event scheduled at 8AM, +0', '2022-01-09 08:00:00');";
$sql3 = "INSERT INTO `events` (`event_name`, `event_time`) VALUES ('Event scheduled at 8AM, +0', '2022-01-09 22:20:00');";



$mysqli->query($sql1);
$mysqli->query($sql2);
$mysqli->query($sql3); */


//$mysqli -> query('SET time_zone = "+00:00";');
if ($result = $mysqli->query("SELECT * FROM events where event_time >= now() AND event_time < ADDTIME(now(), '0:30:00')	")) {
	while($row = $result->fetch_assoc()){
		printf ("%s -> %s -> [%s] <br>\n", $row["id"], $row["event_name"], $row["event_time"]);
	}
	$result -> free_result();
}
$mysqli -> close();
?>
	
</body>
</html>