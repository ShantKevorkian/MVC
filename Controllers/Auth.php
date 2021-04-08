<?php
    namespace Controllers;

    class Auth {
        public function test($first, $second) {
            echo $first . " " . $second;
        }
        public function testing() {
            echo "Testing function without parameters";
        }
        public function index() {
            echo "Auth Index";
        }
    }