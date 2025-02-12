<?php
use App\Lib\Controller;

class Cyclists extends Controller {
    private $cyclistModel;
    
    public function __construct() {
        $this->cyclistModel = $this->modal('Cyclist');
    }
    
    public function dashboard() {
        $this->view("cyclist/dashboard");
    }

    public function profile() {
        $this->view("cyclist/profile");
    }

    public function stats() {
        $this->view("cyclist/stats");
    }

    public function ajaxSearch() {
        header('Content-Type: application/json');
        
        $searchTerm = isset($_GET['term']) ? trim($_GET['term']) : '';
        
        if (!empty($searchTerm)) {
            $cyclists = $this->cyclistModel->searchCyclists($searchTerm);
        } else {
            $cyclists = [];
        }
        
        echo json_encode([
            'success' => true,
            'searchTerm' => $searchTerm,
            'cyclists' => $cyclists
        ]);
        exit;
    }
    
}