<?php 
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

    include_once "../../config/Database.php";
    include_once "../../models/Post.php";


    // Create instance of Database
    $database = new Database();
    $db = $database->connect();

    // Instantiate Post object

    $post = new Post($db);
    
    print_r($_POST);
    exit;
    // Get Raw data
    $data = json_decode(file_get_contents("php://input"));

    $post->title = $data->title;
    $post->body = $data->body;
    $post->author = $data->author;

    if($post->create())
    {
        echo json_encode(array(
            'message'=>'Post Created'
        ));
    }
    else
    {
        echo json_encode(array(
            'message'=>'Error in Creating the Post'
        ));
    }