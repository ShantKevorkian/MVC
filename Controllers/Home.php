<?php
    namespace Controllers;
    use System\View;

    class Home extends View {
        public function index() {
            $this->redirect("Register");
        }
    }