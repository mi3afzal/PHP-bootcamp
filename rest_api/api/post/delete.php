<?php 
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
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


    $post->id = $data->id;
// Delete Post
    if($post->delete())
    {
        echo json_encode(array(
            'message'=>'Post Deleted'
        ));
    }
    else
    {
        echo json_encode(array(
            'message'=>'Error in Deleting the Post'
        ));
    }