<?php 
include_once('Config.php');
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json *');

$post_id = isset($_GET['post_id']) ? $_GET['post_id']: die('faile');

$id = $Post->readSinglePost($post_id);

print_r(json_encode($id));