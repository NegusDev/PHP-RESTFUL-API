<?php 

include_once('Config.php');
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


$data = json_decode(file_get_contents("php://input"));

$post_id = $data->post_id;

$result = $Post->deletePost($post_id);

if ($result) {
	echo json_encode([
		'message' => 'Post deleted'
	]);
}else {
	echo json_encode([
		'message' => 'Post Not deleted'
	]);
}