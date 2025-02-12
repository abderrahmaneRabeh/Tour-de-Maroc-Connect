<?php
use App\Lib\Controller;


class Admin extends Controller
{
    public function statistiques()
    {
        $this->view("admin/statistiques");
    }
}