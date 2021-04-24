<?php
    namespace Controllers;

    use System\Controller;
    use Models\User;
    use Helpers\Upload;

    class Account extends Controller {

        private $user;

        function __construct() {
            if (!isset($_SESSION["userId"])) {
                header('Location: /auth/login');
            }
            parent::__construct();
            $this->user = new User;

        }


        public function index() {

            if($_SERVER['REQUEST_METHOD'] == "POST") {
                $upload = new Upload;

                $imageFileType = strtolower(pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION));

                $upload->options["change_name"] = true;

                if($upload->options["change_name"]) {
                    $fileName = date("H-i-s"). "." . $imageFileType;
                }
                else {
                    $fileName = $_FILES["avatar"]["name"];
                }
                $target_dir = "./Public/Images/Avatars/".$fileName;
                $result = $upload->execute($_FILES["avatar"], $target_dir);

                if($result) {
                    $this->user->updateUserImage($fileName, $_SESSION['userId']);
                }
                else {
                    $this->view->error_msg = $upload->error;
                }
            }

            $this->view->userInfo = $this->user->getUserInfo($_SESSION['userId']);
            $this->view->render("account");
        }

        public function friends() {
            $this->view->friends = $this->user->getFriends($_SESSION["userId"]);
            $this->view->render("friends");
        }

        public function user($id) {
            $this->view->userInfo = $this->user->getUserInfo($id);
            if($this->view->userInfo['id'] == $_SESSION['userId']) {
                header("Location: /account");
            }
            $this->view->friendsAccount = true;
            $this->view->render("account");
        }

        public function chat($id) {
            $this->view->friends = $this->user->getFriends($_SESSION["userId"]);
            $this->view->userInfo = $this->user->getUserInfo($id);
            $this->view->get_msg = $this->user->getMessages($_SESSION['userId'], $id);
            $this->view->render("chat");
        }

        public function sentMsg($id) {
            if(isset($_POST['chat'])) {
                $this->user->insertMessage($_POST['chat'], $id); 
                $lastMsgDate = $this->user->getLastMsgDate();
                echo json_encode($lastMsgDate);
            }
        }

        public function getMsg($to_id, $lastId) {
            $get_last_msg = $this->user->getMessages($_SESSION['userId'], $to_id, $lastId);
            echo json_encode($get_last_msg);
        }

    }