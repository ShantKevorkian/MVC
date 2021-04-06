<?php
	$uri = $_SERVER['REQUEST_URI'];
    $uri = ltrim($uri, '/');
    $uri = explode('/', $uri);
	$ctrl = '';
	if(isset($uri[0]) && $uri[0] !== '') {
		$ctrl = $uri[0];
	
		if (file_exists("Controllers/$ctrl.php")) {
			require "Controllers/".$ctrl.".php";
			if (class_exists($ctrl)) {
				$class_name = $ctrl;
				$ctrl_obj = new $class_name;
				if (isset($uri[1]) && $uri[1] !== '') {
					$method = $uri[1];
					if (method_exists($ctrl_obj, $method)) {
						$params = array_slice($uri, 2);
						call_user_func_array(array($ctrl_obj, $method), $params);
					} 
					else {
						echo "The method '$uri[1]' does not exist in the class $uri[0]";
					}
				} 
				else {
					// If uri[1] is empty call the index method in the class if it exists
					if (method_exists($ctrl_obj, "index")) {
						$ctrl_obj->index();
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
	
