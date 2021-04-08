<?php
    namespace System;

    class Routes {
        function __construct($uri) {
            if(!empty($uri[0])) {
                $control = ucfirst($uri[0]);
            }
            else {
                $control = "Home";
                
            }
            if (file_exists("Controllers" . DIRECTORY_SEPARATOR . $control.".php")) {
                $control = "Controllers" . DIRECTORY_SEPARATOR . $control;
                if (class_exists($control)) {
                    $class_name = $control;
                    $control_obj = new $class_name;
                    
                    if (!empty($uri[1])) {
                        $method = $uri[1];
                        if (method_exists($control_obj, $method)) {
                            var_dump($control_obj);
                            var_dump($method);
                            exit;
                            $params = array_slice($uri, 2);
                            call_user_func_array(array($control_obj, $method), $params);
                        } 
                        else {
                            echo "The method '$uri[1]' does not exist in the class $uri[0]";
                        }
                    } 
                    else {
                        // If uri[1] is empty call the index method in the class if it exists
                        if (method_exists($control_obj, "index")) {
                            $control_obj->index();
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
    }