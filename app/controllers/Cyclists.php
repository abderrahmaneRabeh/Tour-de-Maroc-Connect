<?php
use App\Lib\Controller;

class Cyclists extends Controller {
    public function dashboard() {
        $this->view("cyclist/dashboard");
    }
}