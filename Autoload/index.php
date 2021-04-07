<?php
    use dir_B\B;

            spl_autoload_register(function($class_name){
                include str_replace('\\', '/', $class_name) . '.php';
            });
    new B;