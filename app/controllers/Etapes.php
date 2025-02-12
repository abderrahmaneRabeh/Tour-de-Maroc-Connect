<?php
use App\Lib\Controller;
use App\models\EtapeModel;
use App\models\ResultatEtapesModel;

class Etapes extends Controller
{
    public function index()
    {
        $ObjEtape = EtapeModel::getAllEtapes();
        $this->view("etapes", $ObjEtape);
    }

    public function details($id)
    {
        $ObjEtape = EtapeModel::getEtapeById($id);
        $this->view("etapDetails", $ObjEtape);
    }

    public function podium($id)
    {
        $ObjEtape = ResultatEtapesModel::getEtapPodium($id);
        $this->view("podium", $ObjEtape);
    }

    public function filter()
    {
        if (isset($_GET['region']) && isset($_GET['difficulte'])) {
            $filteredData = EtapeModel::filterData($_GET['region'], $_GET['difficulte']);
        } else {
            $filteredData = EtapeModel::getAllEtapes();
        }
        echo json_encode($filteredData);
    }
}