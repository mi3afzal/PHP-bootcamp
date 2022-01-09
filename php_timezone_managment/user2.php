<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<h2>This user lives in London +0</h2>
<?php

$mysqli = new mysqli("localhost", "root", "", "php_timezone_managment");
if ($mysqli->connect_errno) {
	echo "Failed to connect to MySQL: " . $mysqli->connect_error;
	exit();
}

$mysqli -> query('SET time_zone = "+08:00";');
if ($result = $mysqli->query("SELECT * FROM events")) {
	while($row = $result->fetch_assoc()){
		printf ("%s -> %s -> [%s] -> (%s) <br>\n", $row["id"], $row["event_name"], $row["event_time"], $row["created_at"]);
	}
	$result -> free_result();
}
$mysqli -> close();
?>
	
</body>
</html>