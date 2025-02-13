<?php

use App\Lib\Controller;

class Equipes extends Controller
{
    public function allEquipes()
    {
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $equipesModal = $this->modal("Equipe");
            $equipes = $equipesModal->getAllEquipes();
            echo json_encode(["equipes" => $equipes]);
        }
    }
}
