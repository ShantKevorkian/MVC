<?php
    namespace System;

    class View {
        protected function redirect($file_name) {
            if(file_exists("Views" . DIRECTORY_SEPARATOR . $file_name . ".php")){
                include "Views" . DIRECTORY_SEPARATOR . $file_name . ".php";
            }
            else {
                echo "Page '$file_name' does not exist";
            }
        }
    }