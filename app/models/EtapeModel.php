<?php

namespace App\models;


use App\Lib\Database;
use App\Classes\Etape;

use PDO;
class EtapeModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }


    public function addEtape($nom, $lieu_depart, $lieu_arrivee, $distance_km, $date_depart, $date_arrive, $categorie_id, $difficulte, $region): bool
    {

        $query = "INSERT INTO etapes (nom, lieu_depart, lieu_arrivee, distance_km, date_depart, date_arrive, categorie_id, difficulte, region) 
                  VALUES (:nom, :lieu_depart, :lieu_arrivee, :distance_km, :date_depart, :date_arrive, :categorie_id, :difficulte, :region)";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindParam(':lieu_depart', $lieu_depart, PDO::PARAM_STR);
        $stmt->bindParam(':lieu_arrivee', $lieu_arrivee, PDO::PARAM_STR);
        $stmt->bindParam(':distance_km', $distance_km, PDO::PARAM_INT);
        $stmt->bindParam(':date_depart', $date_depart, PDO::PARAM_STR);
        $stmt->bindParam(':date_arrive', $date_arrive, PDO::PARAM_STR);
        $stmt->bindParam(':categorie_id', $categorie_id, PDO::PARAM_INT);
        $stmt->bindParam(':difficulte', $difficulte, PDO::PARAM_STR);
        $stmt->bindParam(':region', $region, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    public function updateEtape($id, $nom, $lieu_depart, $lieu_arrivee, $distance_km, $date_depart, $date_arrive, $categorie_id, $difficulte, $region): bool
    {
        // Validate required fields
        if (empty($nom) || empty($lieu_depart) || empty($lieu_arrivee) || empty($distance_km) || empty($date_depart) || empty($date_arrive) || empty($difficulte) || empty($region)) {
            return false;
        }

        $query = "UPDATE etapes SET 
                  nom = :nom,
                  lieu_depart = :lieu_depart,
                  lieu_arrivee = :lieu_arrivee,
                  distance_km = :distance_km,
                  date_depart = :date_depart,
                  date_arrive = :date_arrive,
                  difficulte = :difficulte,
                  region = :region,
                  categorie_id = :categorie_id
                  WHERE id = :id";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindParam(':lieu_depart', $lieu_depart, PDO::PARAM_STR);
        $stmt->bindParam(':lieu_arrivee', $lieu_arrivee, PDO::PARAM_STR);
        $stmt->bindParam(':distance_km', $distance_km, PDO::PARAM_INT);
        $stmt->bindParam(':date_depart', $date_depart, PDO::PARAM_STR);
        $stmt->bindParam(':date_arrive', $date_arrive, PDO::PARAM_STR);
        $stmt->bindParam(':difficulte', $difficulte, PDO::PARAM_STR);
        $stmt->bindParam(':region', $region, PDO::PARAM_STR);
        $stmt->bindParam(':categorie_id', $categorie_id, PDO::PARAM_INT); // Bind categorie_id
        $stmt->bindParam(':id', $id, PDO::PARAM_INT); // Bind the id for the WHERE clause

        $stmt->execute();

        return $stmt->rowCount() > 0;
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
    public static function getAllEtapesadmin()
    {
        $db = Database::getConnection();
        $query = "SELECT * FROM etapes";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
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

    public static function deleteEtape($id)
    {
        $db = Database::getConnection();
        $query = "DELETE FROM etapes WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}