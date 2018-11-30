<?php

header('Access-Control-Allow-Origin: *');
header('Content-Typen: application/josn');
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");


include_once('../../config/Database.php');
include_once('../../models/Post.php');

$database = new Database();

$db = $database->connect();

$post = new Post($db);

$post->id = isset($_GET['id']) ? $_GET['id'] : die();

//get post
$post->read_single();

//create array
$post_arr = array(
  'id' => $post->id,
  'title' => $post->title,
  'body' => html_entity_decode($post->body),
  'author' => $post->author,
  'category_id' => $post->category_id,
  'category_name' => $post->category_name,
);

//maka json

print_r(json_encode($post_arr));
