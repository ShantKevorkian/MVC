<?php
    namespace Controllers;

    use System\Controller;
    use Models\User;

    class Auth extends Controller {

        public function register() {
            unset($_SESSION['userId']);
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                if(empty($_POST['name'])) {
                    $this->view->nameError = "Name required";
                }
                if(empty($_POST['password'])) {
                    $this->view->passError = "Password required";
                }
                if(empty($_POST['email'])) {
                    $this->view->emailError = "Email required";
                }
                else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    $this->view->validateEmail = "Invalid email format";
                }

                else if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])) {
                    $user = new User;
                    $user_exist = $user->userExist($_POST['email']);

                    if($user_exist) {
                        $this->view->userError = "User already exists";
                    }
                    else {
                        $create_user = $user->create($_POST);
                        if($create_user) {
                            header("Location: login");
                        }
                        else {
                            $this->view->createError = "Something went wrong";
                        }
                    }
                }
            }
            $this->view->render("register");
        }


        public function login() {
            unset($_SESSION['userId']);
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                if(empty($_POST['password'])) {
                    $this->view->passError = "Password required";
                }
                if(empty($_POST['email'])) {
                    $this->view->emailError = "Email required";
                }
                else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    $this->view->validateEmail = "Invalid email format";
                }

                else if(!empty($_POST['email']) && !empty($_POST['password'])) {
                    $pass = md5($_POST['password']);
                    $user = new User;
                    $login_user = $user->login($_POST['email'], $pass);

                    if($login_user) {
                        $_SESSION['userId'] =  $login_user['id'];
                        header("Location: /account");
                    }
                    else {
                        $this->view->loginError = "Email or password incorrect";
                    }
                }
            }
            $this->view->render("login");
        }


        public function logout() {
            unset($_SESSION['userId']);
            header("Location: login");
        }

        
        public function index() {
            unset($_SESSION['userId']);
            echo "Auth Index";
        }
    }