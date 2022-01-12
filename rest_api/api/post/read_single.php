<?php 
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once "../../config/Database.php";
    include_once "../../models/Post.php";


    // Create instance of Database
    $database = new Database();
    $db = $database->connect();

    // Instantiate Post object

    $post = new Post($db);
    $post->id = isset($_GET['id']) ? $_GET['id'] : die();
    $result = $post->read_single();

    $post_array = array(
        'id' => $post->id,
        'title' => $post->title,
        'body' => $post->body,
        'author' => $post->author,
    );

    echo json_encode($post_array);


    ?>