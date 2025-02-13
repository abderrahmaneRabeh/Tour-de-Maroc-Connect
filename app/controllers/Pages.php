<?php
use App\Lib\Controller;
use App\models\EtapeModel;

class Pages extends Controller
{

    public function index() {
        $ObjEtape = EtapeModel::getAllEtapes();
        $data = [
            'title' => 'Home',
            'cyclists' => [],
            'searchTerm' => '',
            "ObjEtape"=> $ObjEtape
        ];
    
        $cyclistModel = $this->modal('Cyclist');
        
        if (isset($_GET['term'])) {
            $searchTerm = trim($_GET['term']);
            $data['searchTerm'] = $searchTerm;
            
            if (!empty($searchTerm)) {
                $data['cyclists'] = $cyclistModel->searchCyclists($searchTerm);
            } else {
                // Show all cyclists when search term is empty
                $data['cyclists'] = $cyclistModel->getAllCyclists();
            }
        } else {
            // Show all cyclists on initial page load
            $data['cyclists'] = $cyclistModel->getAllCyclists();
        }
        
        $this->view('index', $data);
    }
}