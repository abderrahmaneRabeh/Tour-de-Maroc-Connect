<?php
use App\Lib\Controller;
use App\models\EtapeModel;

class Etapes extends Controller
{
    public function index()
    {
        $ObjEtape = EtapeModel::getAllEtapes();

        // var_dump($ObjEtape);

        $this->view("etapes", $ObjEtape);
    }
}