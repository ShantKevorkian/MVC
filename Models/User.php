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
            return $this->db->insert("users", $data);
        }

        public function login($email, $password) {
            return $this->db->select("SELECT id FROM users WHERE email = '$email' AND password = '$password'", false);
        }

        public function getUserName($id) {
            return $this->db->select("SELECT name FROM users WHERE id = $id", false);
        }
    }