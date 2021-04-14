<?php
    namespace System;

    class Db extends \mysqli {

        private $where_condition = '';

        function __construct() {
            parent::__construct($db_host = "localhost", $db_user = "root", $db_pass = "", $db_name = "internship");
            if ($this->connect_errno) {
                die('Connect Error: ' . $this->connect_error);
            }
        }

        public function select($sql, $all = true){

            $query_select = $this->query($sql);

            if(!$all) {
                $row = $query_select->fetch_assoc();
                return $row;
            }
            $data = [];
            while($row = $query_select->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } 

        public function insert($table_name, $data){
            $data["password"] = md5($data['password']);
            $value_data = '';
            foreach($data as $key => $value) {  
                $value_data .="'".$this->real_escape_string(htmlspecialchars($value))."', ";  
            }
            $value_data = substr($value_data, 0, -2);
            $query_insert = "INSERT INTO $table_name (".implode(",", array_keys($data)).") 
                                VALUES ($value_data)";
            return $this->query($query_insert);
        }

        public function update($table_name, $updated_data){
            $data = '';

            foreach($updated_data as $key => $value) {  
                $data .= $key . "='".$this->real_escape_string(htmlspecialchars($value))."', ";  
            }
            $data = substr($data, 0, -2);
            
            $where = $this->where_condition;
            $this->where_condition = '';

            $query_update = "UPDATE $table_name SET " . $data . $where;
            return $this->query($query_update);
        }

        public function delete($table_name){
            $where = $this->where_condition;
            $this->where_condition = '';

            $query_delete = "DELETE FROM $table_name" . $where;
            return $this->query($query_delete);
        }

        public function where($column, $column_value, $oper = '=') {
            $column_value = $this->real_escape_string(htmlspecialchars($column_value));
            if($this->where_condition != '') {
                $this->where_condition .= " AND $column $oper '$column_value' ";
            }
            else {
                $this->where_condition .= " WHERE $column $oper '$column_value' ";
            }
            return $this;
        }

        public function orWhere($column, $column_value, $oper = '=') {
            $column_value = $this->real_escape_string(htmlspecialchars($column_value));
            if($this->where_condition != '') {
                $this->where_condition .= " OR $column $oper '$column_value' ";
            }
            else {
                $this->where_condition .= " WHERE $column $oper '$column_value' ";
            }
            return $this;
        }   
    }