<?php 
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: PUT');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

    include_once "../../config/Database.php";
    include_once "../../models/Post.php";


    // Create instance of Database
    $database = new Database();
    $db = $database->connect();

    // Instantiate Post object

    $post = new Post($db);

    // Get Raw data
    $data = json_decode(file_get_contents("php://input"));

    $post->title = $data->title;
    $post->body = $data->body;
    $post->author = $data->author;
    $post->id = $data->id;

    if($post->update())
    {
        echo json_encode(array(
            'message'=>'Post Updated'
        ));
    }
    else
    {
        echo json_encode(array(
            'message'=>'Error in Updating the Post'
        ));
    }