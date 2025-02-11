<?php

// namespace App\Controllers;

use App\Lib\Controller;


class Cyclistes extends Controller
{
    public function statistiques()
    {
        $this->view("admin/statistiques");
    }
}