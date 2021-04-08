<?php
	spl_autoload_register(function($class_name){
		include (str_replace("\\", DIRECTORY_SEPARATOR, $class_name).".php");
	});
	
	use System\Routes;
	$uri = explode('/', ltrim($_SERVER['REQUEST_URI'], '/'));
	
	new Routes($uri);