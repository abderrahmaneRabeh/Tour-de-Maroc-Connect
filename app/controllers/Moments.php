<?php
use App\Lib\Controller;


class Moments extends Controller
{
    public function index()
    {
        $this->view("moments");
    }
}