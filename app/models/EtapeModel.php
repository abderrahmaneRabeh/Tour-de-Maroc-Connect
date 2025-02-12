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
                $etape['region'],
                $etape['id']
            );
        }

        return $EtapObjects;
    }

    public static function getEtapeById($id)
    {
        $db = Database::getConnection();
        $query = "SELECT * FROM etapes WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $etape = $stmt->fetch();

        return new Etape(
            $etape['nom'],
            $etape['lieu_depart'],
            $etape['lieu_arrivee'],
            $etape['distance_km'],
            $etape['date_depart'],
            $etape['date_arrive'],
            $etape['categorie_id'],
            $etape['difficulte'],
            $etape['region'],
            $etape['id']
        );
    }
    public static function filterData($region, $difficulte)
    {
        $region = "%$region%";
        $db = Database::getConnection();

        if (empty($difficulte)) {
            $query = "SELECT * FROM etapes e WHERE e.region ILIKE :region";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':region', $region);
        } else {
            $query = "SELECT * FROM etapes e WHERE e.region = :region OR e.difficulte = :difficulte";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':difficulte', $difficulte);
            $stmt->bindParam(':region', $region);
        }

        $stmt->execute();
        return $stmt->fetchAll();

    }
}