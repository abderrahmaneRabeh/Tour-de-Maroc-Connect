<?php
    use App\Lib\Controller;
    use App\models\EtapeModel;
    class Pages extends Controller {
        public function index(){

            $ObjEtape = EtapeModel::getAllEtapes();

        $this->view("index", $ObjEtape);
   
        }
    }
