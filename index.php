<?php 
include_once('Config.php');
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json *');

$po = $Post->readPosts();

echo json_encode($po, JSON_PRETTY_PRINT);

