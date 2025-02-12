<?php

namespace App\Classes;

class ResultatEtapes
{
    private $id;
    private $cycliste_id;
    private $etape_id;
    private $temps_total;
    private $distance_km;
    private $vitesse_moy;
    private $points;
    private $classement;

    public function __construct($cycliste_id, $etape_id, $temps_total, $distance_km, $vitesse_moy, $points, $classement, $id = null)
    {
        $this->id = $id;
        $this->cycliste_id = $cycliste_id;
        $this->etape_id = $etape_id;
        $this->temps_total = $temps_total;
        $this->distance_km = $distance_km;
        $this->vitesse_moy = $vitesse_moy;
        $this->points = $points;
        $this->classement = $classement;
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