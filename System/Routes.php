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
                $control = "Controllers\\".$control;
                if (class_exists($control)) {
                    $class_name = $control;
                    $control_obj = new $class_name;
                    
                    if (!empty($uri[1])) {
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