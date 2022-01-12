<?php 
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: GET');

    $db_name = "../../database.txt";
    $myfile = fopen($db_name, "r") or die("Unable to open file!");
    $file_data = fread($myfile,filesize($db_name));

    $post->id = isset($_GET['id']) ? $_GET['id'] : die(json_encode(array(
        'message'=>'ID is not provided'
    )));


    echo json_encode($file_data[$_GET['id']]);


    ?>