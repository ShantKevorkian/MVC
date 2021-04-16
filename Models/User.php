<?php
    namespace Models;
    use System\Model;

    class User extends Model {

        public function getAllUsers() {
            return $this->db->select("SELECT * FROM users");
        }

        public function userExist($email) {
            return $this->db->select("SELECT email FROM users WHERE email = '$email'", false);
        }

        public function create($data) {
            $data['password'] = md5($data['password']);
            return $this->db->insert("users", $data);
        }

        public function login($email, $password) {
            $password = md5($password);
            return $this->db->select("SELECT id FROM users WHERE email = '$email' AND password = '$password'", false);
        }

        public function getUserInfo($id) {
            return $this->db->select("SELECT name, avatar FROM users WHERE id = $id", false);
        }

        public function updateUserImage($filename, $id) {
            $newAvatar = [
                "avatar" => "$filename"
            ];
            return $this->db->where('id', $id)->update("users", $newAvatar);
        }

        public function getFriends($id) {
            return $this->db->select("SELECT * FROM users WHERE NOT id = $id");
        }
    }