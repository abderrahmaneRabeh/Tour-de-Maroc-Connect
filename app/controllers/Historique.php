<?php
use App\Lib\Controller;


class Historique extends Controller
{
    public function index()
    {
        $this->view("historique");
    }
}