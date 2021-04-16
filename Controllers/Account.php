<?php
    namespace Controllers;

    use System\Controller;
    use Models\User;

    class Account extends Controller {

        function __construct() {
            if (!isset($_SESSION["userId"])) {
                header('Location: /auth/login');
            }
            parent::__construct();
        }


        public function index() {
            $user = new User;
            $userInfo = $user->getUserInfo($_SESSION['userId']);
            if($userInfo["avatar"] == NULL) {
                $this->view->userAvatar = "avatar.png";
            }
            else {
                $this->view->userAvatar = $userInfo['avatar'];
            }

            if($_SERVER['REQUEST_METHOD'] == "POST") {
                $target_dir = "./Public/Images/Avatars/".$_FILES['avatar']['name'];
                
                move_uploaded_file($_FILES['avatar']['tmp_name'],  $target_dir);
                $user->updateUserImage($_FILES['avatar']['name'], $_SESSION['userId']);
                $userInfo = $user->getUserInfo($_SESSION['userId']);
                $this->view->userAvatar = $userInfo['avatar'];
                
            }
            $this->view->userName = $userInfo['name'];
            $this->view->render("account");
        }
    }