<?php 
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');


    // Get Raw data
    $input = json_decode(file_get_contents("php://input"));


    $data = [];
    $db_name = "database.txt";
    $myfile = fopen($db_name, "r") or die("Unable to open file!");
    $file_data = fread($myfile, filesize($db_name));


    $index = $input->id;
    unset($data[$index]);
    $myfile = fopen($db_name, "w+") or die("Unable to open!");
    if (fwrite($myfile, json_encode($data))) {
        echo json_encode(array(
            'message'=>'Post Deleted'
        ));
        return;
    }

    echo json_encode(array(
        'message'=>'Error in Deleting the Post'
    ));

    ?>