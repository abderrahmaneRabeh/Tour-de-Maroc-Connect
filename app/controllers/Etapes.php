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
        $ObjEtapeAdmin = EtapeModel::getAllEtapesadmin();


        $categoryModel = new CategorysModel();
        $categories = $categoryModel->getAllCategories();
        $this->view("admin/etapes", data: [
            'ObjEtape' => $ObjEtape,
            'category' => $categories,
            'ObjEtapeAdmin' => $ObjEtapeAdmin
        ]);

    }

    public function addEtapes()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $etapeModel = new EtapeModel();



            $nom = $_POST['nom'];
            $lieu_depart = $_POST['lieu_depart'];
            $lieu_arrivee = $_POST['lieu_arrivee'];
            $distance_km = $_POST['distance_km'];
            $date_depart = $_POST['date_depart'];
            $date_arrive = $_POST['date_arrive'];
            $categorie_id = $_POST['category_id'];
            $difficulte = $_POST['difficulte'];
            $region = $_POST['region'];

            $isAdded = $etapeModel->addEtape($nom, $lieu_depart, $lieu_arrivee, $distance_km, $date_depart, $date_arrive, $categorie_id, $difficulte, $region);

            // Redirect on success or show error on failure
            if ($isAdded) {
                header("Location: " . URLROOT . "/Etapes/adminEtapes");
            } else {
                echo "Failed to add the Etape.";
            }
        }
    }



    public function updateEtapes()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $etapeId = $_POST['id'];
            $nom = $_POST['nom'];
            $lieu_depart = $_POST['lieu_depart'];
            $lieu_arrivee = $_POST['lieu_arrivee'];
            $distance_km = $_POST['distance_km'];
            $date_depart = $_POST['date_depart'];
            $date_arrive = $_POST['date_arrive'];
            $categorie_id = $_POST['category_id'];
            $difficulte = $_POST['difficulte'];
            $region = $_POST['region'];

            $etapeModel = new EtapeModel();

            $updateSuccessful = $etapeModel->updateEtape(
                $etapeId,
                $nom,
                $lieu_depart,
                $lieu_arrivee,
                $distance_km,
                $date_depart,
                $date_arrive,
                $categorie_id,
                $difficulte,
                $region
            );

            if ($updateSuccessful) {
                header("Location: " . URLROOT . "/Etapes/adminEtapes");
            } else {
                echo "No changes were made, or the category/etape wasn't found.";
            }
        }
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

    public function testMail($nomEtape, $idEtape)
    {
        $to = 'rabehlife144@gmail.com';
        $subject = 'Test mail';
        $message = "Bonjour, vous  tes actuellement en train de regarder l'étape : $nomEtape du Tour de Maroc";
        $headers = array('Content-Type: text/html; charset=UTF-8');
        mail($to, $subject, $message, implode("\r\n", $headers));

        header("Location: " . URLROOT . "/Etapes/details/$idEtape");
    }

    public function delete($id)
    {
        $isDeleted = EtapeModel::deleteEtape($id);
        if ($isDeleted) {
            header("Location: " . URLROOT . "/Etapes/adminEtapes");
        }
    }
}