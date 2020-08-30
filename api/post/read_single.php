<?php 
	// Header
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');

	include_once '../../config/database.php';
	include_once '../../models/posts.php';

	// Instantiate DB & connect
	$database = new Database();
    $db = $database->connect();
    
	// Instantiate blog post object
    $post = new Post($db);
    
    // Get ID
    $post->id = isset($_GET['id']) ? $_GET['id'] : die(); //url?id=3

    // Get post
    $post->single_read();

    // Create Array
    $post_arr = array(
        'id' => $post->id,
        'title' => $post->title,
        'body' => $post->body,
        'author' => $post->author,
        'category_id' => $post->category_id,
        'category_name' => $post->category_name
    );

    // Make JSON
    print_r(json_encode($post_arr));
?>