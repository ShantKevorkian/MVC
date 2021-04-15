<?php
    namespace Controllers;

    use System\Controller;
    use Models\User;

    class Account extends Controller {

        function __construct() {
            if (!isset($_SESSION["userId"])) {
                header('Location: /auth/login');
                exit;
            }
            parent::__construct();
        }


        public function index() {
            $user = new User;
            $userInfo = $user->getUserName($_SESSION["userId"]);
            $this->view->userName = $userInfo['name'];
            $this->view->render("account");
        }
    }