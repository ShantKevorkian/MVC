<?php
    namespace Helpers;

    class Upload {

        public $options = [
            "allowed_types" => ["jpg", "png", "jpeg", "gif"],
            "allowed_size" => 3,
            "change_name" => false
        ];
        
        public $error;

        public function execute($file_name, $target_dir) {
            $upload = true;
            $imageFileType = strtolower(pathinfo($file_name["name"], PATHINFO_EXTENSION));
            $checkImage = getimagesize($file_name["tmp_name"]);
            
            if(!$checkImage){
                $this->error = "File is not an image";
                $upload = false;
            }
            if($imageFileType != $this->options["allowed_types"][0] && $imageFileType != $this->options["allowed_types"][1] && $imageFileType != $this->options["allowed_types"][2] && $imageFileType != $this->options["allowed_types"][3]) {
                $this->error = "Only jpg, png, jpeg, gif are allowed";
                $upload = false;
            }
            if($file_name["size"] > $this->options["allowed_size"] * 1000000) {
                $this->error = "File too large to upload";
                $upload = false;
            }
            if($upload) {
                if(move_uploaded_file($file_name["tmp_name"],  $target_dir)) {
                    return $upload;
                }
                else {
                    $upload = false;
                    $this->error = "Something went wrong";
                }
            }
            
        return $upload;
        }
    }