<?php
    use App\Lib\Controller;
    class Home extends Controller {
        public function index(){
            $this->view("home");
        }
    }