<?php

namespace App\models;


use App\Lib\Database;
use App\Classes\Etape;
class EtapeModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public static function getAllEtapes()
    {
        $db = Database::getConnection();
        $query = "SELECT * FROM etapes";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $etapes = $stmt->fetchAll();

        $EtapObjects = [];

        foreach ($etapes as $etape) {
            $EtapObjects[] = new Etape(
                $etape['nom'],
                $etape['lieu_depart'],
                $etape['lieu_arrivee'],
                $etape['distance_km'],
                $etape['date_depart'],
                $etape['date_arrive'],
                $etape['categorie_id'],
                $etape['difficulte'],
                $etape['id']
            );
        }

        return $EtapObjects;
    }
}