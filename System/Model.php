<?php
    namespace System;

    class Model {
        public $db;

        function __construct() {
            $this->db = new Db;
        }
    }