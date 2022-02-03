<?php

define('BASE_DIR', __DIR__);

spl_autoload_register(function($className){
	include(BASE_DIR. '/Models/'.$className.'.php');
	// echo $className;
});

$Dbs = new Db();
$Post = new Posts();