<?php 

include_once('Config.php');
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"));

$post_id = $data->post_id;
$author_id = $data->journalist_id;
$category = $data->category;
$title = $data->title;
$body= $data->body;

$result = $Post->update($post_id,$author_id,$category,$title,$body);

if ($result) {
	echo json_encode([
		'message' => 'Post updated'
	]);
}else {
	echo json_encode([
		'message' => 'Post Not updated'
	]);
}