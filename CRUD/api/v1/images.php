<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: GET');

$db_name = "../../database.txt";
$myfile = fopen($db_name, "r") or die("Unable to open file!");
echo $file_data = fread($myfile,filesize($db_name));
?>