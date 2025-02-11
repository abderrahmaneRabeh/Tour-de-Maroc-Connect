<?php

namespace App\Classes;

class Etape
{
    private $id;
    private $nom;
    private $lieu_depart;
    private $lieu_arrivee;
    private $distance_km;
    private $date_depart;
    private $date_arrive;
    private $categorie_id;
    private $difficulte;

    public function __construct($nom, $lieu_depart, $lieu_arrivee, $distance_km, $date_depart, $date_arrive, $categorie_id, $difficulte, $id = null)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->lieu_depart = $lieu_depart;
        $this->lieu_arrivee = $lieu_arrivee;
        $this->distance_km = $distance_km;
        $this->date_depart = $date_depart;
        $this->date_arrive = $date_arrive;
        $this->categorie_id = $categorie_id;
        $this->difficulte = $difficulte;
    }

    public function __get($property)
    {
        return $this->$property;
    }

    public function __set($property, $value)
    {
        $this->$property = $value;
    }
}