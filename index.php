<?php
	$uri = $_SERVER['REQUEST_URI'];
    $uri = ltrim($uri, '/');
    $uri = explode('/', $uri);
	$control = '';
	if(isset($uri[0]) && $uri[0] !== '') {
		$control = $uri[0];
	
		if (file_exists("Controllers/$control.php")) {
			require "Controllers/".$control.".php";
			if (class_exists($control)) {
				$class_name = $control;
				$control_obj = new $class_name;
				if (isset($uri[1]) && $uri[1] !== '') {
					$method = $uri[1];
					if (method_exists($control_obj, $method)) {
						$params = array_slice($uri, 2);
						call_user_func_array(array($control_obj, $method), $params);
					} 
					else {
						echo "The method '$uri[1]' does not exist in the class $uri[0]";
					}
				} 
				else {
					// If uri[1] is empty call the index method in the class if it exists
					if (method_exists($$control_obj, "index")) {
						$$control_obj->index();
					} 
					else {
						echo "The method index() does not exist in the class '$uri[0]'";
					}
				}
			} 
			else {
				echo "The class '$uri[0]' does not exist";
			}
		}
		else {
			echo "The file 'Controllers/$uri[0].php' does not exist";
		}
	}
	else {
		echo "The uri[0] is empty";
	}
	
