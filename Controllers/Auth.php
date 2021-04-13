<?php
    namespace Controllers;
    use System\Controller;

    class Auth extends Controller {
        public function register() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])) {
                    var_dump($_POST);
                }
                else {
                    if(empty($_POST['name'])) {
                        $this->view->nameError = "Name required";
                    }
                    if(empty($_POST['email'])) {
                        $this->view->emailError = "Email required";
                    }
                    if(empty($_POST['password'])) {
                        $this->view->passError = "Password required";
                    }
                }
            }
            $this->view->render("register");
        }

        public function login() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if(!empty($_POST['email']) && !empty($_POST['password'])) {
                    var_dump($_POST);
                }
                else {
                    if(empty($_POST['email'])) {
                        $this->view->emailError = "Email required";
                    }
                    if(empty($_POST['password'])) {
                        $this->view->passError = "Password required";
                    }
                }
            }
            $this->view->render("login");
        }

        public function index() {
            echo "Auth Index";
        }
    }