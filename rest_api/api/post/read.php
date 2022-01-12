<?php 
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    
    include_once "../../models/Post.php";
    include_once "../../config/Database.php";
    


    // Create instance of Database
    $database = new Database();
    $db = $database->connect();

    // Instantiate Post object

    $post = new Post($db);
    // Blog Post Query
    $result = $post->read();

    if($result->rowCount()>0)
    {
        // print_r($result);
        $posts_array = array();
        // $posts_array['data'] =array();

        while($row = $result->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);

            $post_item = array(
                'id' => $id,
                'title' => $title,
                'body' => html_entity_decode($body),
                'author' => $author,
            );

            // $posts_array['data'] = $post_item;
            // array_push($posts_array['data'],$post_item);
            array_push($posts_array,$post_item);

        }
        
        echo json_encode($posts_array);
         
    }
    else
    {
        echo json_encode(
            array("message" => "No Post Found.")
            );
    }
?>