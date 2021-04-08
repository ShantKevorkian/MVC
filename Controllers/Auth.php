<?php
    namespace Controllers;

    class Auth {
        public function test($first, $second) {
            echo $first . " " . $second;
        }
        public function index() {
            echo "Auth Index";
        }
    }