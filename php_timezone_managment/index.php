<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PHP Time Convertion</title>
	<style>
		iframe{
			border: 1px solid gray;
			display: inline-block;
			width: 100%;
			height: 200px;
		}
	</style>
</head>
<body>
	<h1>Time convertion in PHP, according to user selected timezone</h1>
	<p></p>
	<p>Server Time zone is: <?php echo date_default_timezone_get(); ?></p>

	<iframe src="user1.php" title="" ></iframe>
	<iframe src="user2.php" title="" ></iframe>
</body>
</html>