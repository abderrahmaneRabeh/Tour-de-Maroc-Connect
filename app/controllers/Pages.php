<?php
use App\Lib\Controller;

class Pages extends Controller
{
    public function index()
    {
        $this->view("index");
    }
}