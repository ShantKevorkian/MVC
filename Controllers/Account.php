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
                $upload = true;
                $imageFileType = strtolower(pathinfo($_FILES['avatar']['name'],PATHINFO_EXTENSION));
                $target_dir = "./Public/Images/Avatars/".$_FILES['avatar']['name'];
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                    $this->view->typeError = "Only jpg, png, jpeg, gif are allowed";
                    $upload = false;
                }
                if($_FILES['avatar']['size'] > 1000000) {
                    $this->view->sizeError = "File too large to upload";
                    $upload = false;
                }
                if($upload){
                    move_uploaded_file($_FILES['avatar']['tmp_name'],  $target_dir);
                    $user->updateUserImage($_FILES['avatar']['name'], $_SESSION['userId']);
                    $userInfo = $user->getUserInfo($_SESSION['userId']);
                    $this->view->userAvatar = $userInfo['avatar'];
                }
                
            }
            $this->view->userName = $userInfo['name'];
            $this->view->render("account");
        }
    }