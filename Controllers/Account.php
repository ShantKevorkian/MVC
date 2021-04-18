<?php
    namespace Controllers;

    use System\Controller;
    use Models\User;
    use Helpers\Upload;

    class Account extends Controller {

        function __construct() {
            if (!isset($_SESSION["userId"])) {
                header('Location: /auth/login');
            }
            parent::__construct();
        }


        public function index() {
            $user = new User;

            if($_SERVER['REQUEST_METHOD'] == "POST") {
                $upload = new Upload;
                $target_dir = "./Public/Images/Avatars/".$_FILES['avatar']['name'];
                $result = $upload->execute($_FILES, $target_dir);
                if(!$result) {
                    $this->view->error_msg = $upload->error;
                }
            }

            $this->view->userInfo = $user->getUserInfo($_SESSION['userId']);
            $this->view->render("account");
        }

        public function friends() {
            $user = new User;
            $this->view->friends = $user->getFriends($_SESSION["userId"]);
            $this->view->render("friends");
        }

        public function user($id) {
            $user = new User;
            $this->view->userInfo = $user->getUserInfo($id);
            $this->view->friendsAccount = true;
            $this->view->render("account");
        }
    }