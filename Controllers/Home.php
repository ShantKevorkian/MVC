<?php
    namespace Controllers;
    use System\Controller;

    class Home extends Controller {
        public function index() {
            $this->view->render("welcome");
        }
    }