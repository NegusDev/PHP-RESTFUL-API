<?php 

include_once('Config.php');
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


$data = json_decode(file_get_contents("php://input"));

$author_id = $data->journalist_id;
$category = $data->category;
$title = $data->title;
$body= $data->body;

$result = $Post->insertPost($author_id,$category,$title,$body);

if ($result) {
	echo json_encode([
		'message' => 'Post created'
	]);
}else {
	echo json_encode([
		'message' => 'Post Not Created'
	]);
}

