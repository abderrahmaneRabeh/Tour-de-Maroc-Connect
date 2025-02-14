<?php
use App\Lib\Controller;
use App\Models\CategorysModel;
use App\models\EtapeModel;
use App\models\LikeModel;
use App\models\ResultatEtapesModel;
use App\models\CommentModel;
use App\models\SignalementModel;

class Etapes extends Controller
{
    public function index()
    {
        $ObjEtape = EtapeModel::getAllEtapes();
        $this->view("etapes", $ObjEtape);
    }
    public function adminEtapes()
    {
        $ObjEtape = EtapeModel::getAllEtapes();
     

        $categoryModel = new CategorysModel();
        $categories = $categoryModel->getAllCategories();
        $this->view("admin/etapes", data: ['ObjEtape' => $ObjEtape,'category'=>$categories]);

    }



    public function details($id)
    {
        $isAdded = LikeModel::EtapUserLiked($_SESSION['user']['id'], $id);
        $ObjEtape = EtapeModel::getEtapeById($id);
        $objComments = CommentModel::GetEtapComments($id);
        $isAlreadySignal = SignalementModel::IsFanAlreadySignaled($id, $_SESSION['user']['id']);

        $this->view("etapDetails", [
            'ObjEtape' => $ObjEtape,
            'isAdded' => $isAdded,
            'objComments' => $objComments,
            'isAlreadySignal' => $isAlreadySignal
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

    public function testMail()
    {
        mail("rabehlife144@gmail.com", "Test", "Ceci est un test", "Etape 1 : Casablanca à safi");
    }
}