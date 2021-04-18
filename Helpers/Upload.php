<?php
    namespace Helpers;
    use Models\User;

    class Upload {

        private $options = [
            "allowed_types" => ["jpg", "png", "jpeg", "gif"],
            "allowed_size" => 3
        ];
        
        public $up;

        public function execute($file_name, $location) {
            $upload = true;
            $imageFileType = strtolower(pathinfo($file_name["avatar"]["name"], PATHINFO_EXTENSION));
            $newFileName = date("H-i-s"). "." . $imageFileType;
            $target_dir = "./Public/Images/Avatars/".$newFileName;
            $checkImage = getimagesize($file_name["avatar"]["tmp_name"]);
            
            if(!$checkImage){
                $this->up = "File is not an image";
                $upload = false;
            }
            if($imageFileType != $this->options["allowed_types"][0] && $imageFileType != $this->options["allowed_types"][1] && $imageFileType != $this->options["allowed_types"][2] && $imageFileType != $this->options["allowed_types"][3]) {
                $this->up = "Only jpg, png, jpeg, gif are allowed";
                $upload = false;
            }
            if($file_name["avatar"]["size"] > $this->options["allowed_size"] * 1000000) {
                $this->up = "File too large to upload";
                $upload = false;
            }
            if($upload){
                if(move_uploaded_file($file_name["avatar"]["tmp_name"],  $target_dir)){
                    $user = new User;
                    $user->updateUserImage($newFileName, $_SESSION['userId']);
                }
            }
        return $upload;
        }
    }