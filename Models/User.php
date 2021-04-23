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
            return $this->db->select("SELECT id, name, avatar FROM users WHERE id = $id", false);
        }

        public function updateUserImage($filename, $id) {
            $newAvatar = [
                "avatar" => "$filename"
            ];
            return $this->db->where('id', $id)->update("users", $newAvatar);
        }

        public function getFriends($id) {
            return $this->db->select("SELECT id, name, avatar FROM users WHERE id != $id");
        }

        public function insertMessage($body, $to) {
            $data = [
                "body" => $body,
                "from_id" => $_SESSION['userId'],
                "to_id" => $to
            ];

            return $this->db->insert("messages", $data);
        }

        public function getLastMsgDate() {
            return $this->db->select("SELECT date from messages ORDER BY id DESC LIMIT 1", false);
        }

        public function getMessages($from, $to, $lastId = 0) {
            return $this->db->select("SELECT from_id, to_id, body, m.id, u.name, date 
                                        FROM messages as m 
                                        LEFT JOIN users as u ON m.from_id = u.id 
                                        WHERE ((from_id = $from AND to_id = $to) OR (from_id = $to AND to_id = $from))
                                        AND m.id > $lastId ORDER BY m.id");
        }

    }