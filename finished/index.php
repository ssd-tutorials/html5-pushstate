<?php
	
	defined("DS")
		|| define("DS", DIRECTORY_SEPARATOR);
	
	defined("ROOT_PATH")
		|| define("ROOT_PATH", realpath(dirname(__FILE__)));
		
	require_once(ROOT_PATH.DS.'classes'.DS.'Helper.php');
	
	$page = 'ygwyg';
	
	$uri = $_SERVER['REQUEST_URI'];
	
	if (!empty($uri)) {
		$first = substr($uri, 0, 1);
		if ($first == '/') {
			$uri = substr($uri, 1);
		}
		if (!empty($uri)) {
			$uri = explode('?', $uri);
			$uri = explode('/', $uri[0]);
			$page = array_shift($uri);
		}
	}
	
	$content = array(
		'right' => Helper::getContent($page),
		'left' => Helper::getColumn($page)
	);
	
	
	if (!empty($_GET['ajax'])) {
		echo json_encode($content);
	} else {
		require_once('template/template.php');
	}
	
	
	
	
	
	
	