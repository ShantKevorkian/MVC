<?php
    namespace Controllers;
    use System\Controller;

    class Auth extends Controller {
        public function register() {
            $this->view->render("register");
        }

        public function login() {
            $this->view->render("login");
        }

        public function test() {
            var_dump($_POST);
        }

        public function index() {
            echo "Auth Index";
        }
    }