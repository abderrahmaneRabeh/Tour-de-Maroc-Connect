<?php

use App\Lib\Controller;
use App\Models\SignalementModel;

class Signalement extends Controller
{
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $idEtape = $_POST['etap_id'];
            $description = $_POST['type'];
            $fan_id = $_SESSION['user']['id'];

            echo $idEtape . " " . $fan_id . " " . $description;


            // $isAdded = SignalementModel::AjouterSignal($idEtape, $fan_id, $description);
        }


    }
}