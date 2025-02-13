<?php namespace App\Classes;


class Categorys {
    private $id_category;
    private $nom_category;

    public function __construct($id_category, $nom_category) {
        $this->id_category = $id_category;
        $this->nom_category = $nom_category;
    }

    public function getCategory() {
        return $this->id_category;
    }

    public function setCategory($id_category) {
        $this->id_category = $id_category;
    }
    
    public function getNomCategory() {
        return $this->nom_category;
    }

    public function setNomCategory($nom_category) {
        $this->nom_category = $nom_category;
    }
}