<?php
use App\Lib\Controller;
use App\models\EtapeModel;
use App\models\LikeModel;
use App\models\ResultatEtapesModel;
use App\models\CommentModel;

class Etapes extends Controller
{
    public function index()
    {
        $ObjEtape = EtapeModel::getAllEtapes();
        $this->view("etapes", $ObjEtape);
    }

    public function details($id)
    {
        $isAdded = LikeModel::EtapUserLiked($_SESSION['user']['id'], $id);
        $ObjEtape = EtapeModel::getEtapeById($id);
        $objComments = CommentModel::GetEtapComments($id);
        $this->view("etapDetails", [
            'ObjEtape' => $ObjEtape,
            'isAdded' => $isAdded,
            'objComments' => $objComments
        ]);
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