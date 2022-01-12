<?php 
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');
    

    $input_data = json_decode(file_get_contents("php://input"), true);

    echo json_encode([$input_data, $_FILES, $_POST, $_GET, $_ENV]);
    die;

    $image_name = '';
    if( !empty($_FILES['image']) ){
        $image_name = time().$_FILES['image']['name'];
        move_uploaded_file($_FILES["image"]["tmp_name"], "images/".$image_name);
    }

    $data[] = array("title" => $input_data['title'], "image" => $image_name);

    $myfile = fopen($db_name, "w+") or die("Unable to open!");
    if (fwrite($myfile, json_encode($data))) {
        echo json_encode(array(
            'message'=>'Post Created'
        ));
        return true;
    }

    echo json_encode(array(
        'message'=>'Error in Creating the Post'
    ));
