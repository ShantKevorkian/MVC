<?php
    namespace dir_B;
    use dir_A\A;
    class B extends A {
        function __construct() {
            parent::__construct();
            echo "Class B ";
        }
    }