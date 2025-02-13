<?php

namespace App\Models;
use App\Lib\Database;
use App\Classes\Cyclist as CyclistController ;
use Error;

class Cyclist
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function getProfile($id)
    {
        return $this->db->query(
            "SELECT * FROM cyclistes WHERE id = ?",
            [$id]
        )->fetch();
    }

    public function getPerformances($id)
    {
        return $this->db->query(
            "SELECT * FROM resultats_etapes WHERE cycliste_id = ? ORDER BY date",
            [$id]
        )->fetchAll();
    }

    public function getPoints($id)
    {
        $result = $this->db->query(
            "SELECT points FROM cyclistes WHERE id = ?",
            [$id]
        )->fetch();
        return $result ? $result['points'] : 0;
    }


    public function searchCyclists($term)
    {
        $sql = "SELECT c.id, c.nom, c.points, e.nom as equipe_nom
                          FROM cyclistes c
                          LEFT JOIN equipes e ON c.equipe_id = e.id
                          WHERE c.nom ILIKE :term
                          OR e.nom ILIKE :term
                          ORDER BY c.points DESC
                          LIMIT 10";

        $stmt = $this->db->prepare($sql);
        $term = "%{$term}%";
        $stmt->bindParam(':term', $term, \PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function searchTeams($term)
    {
        $this->db->query("SELECT id, nom, pays, date_creation
                          FROM equipes
                          WHERE nom ILIKE :term
                          ORDER BY nom
                          LIMIT 10");

        $this->db->bind(':term', "%$term%");
        return $this->db->resultSet();
    }

    public function searchStages($term)
    {
        $this->db->query("SELECT id, nom, lieu_depart, lieu_arrivee, distance_km, 
                                 date_depart, difficulte
                          FROM etapes
                          WHERE nom ILIKE :term
                          OR lieu_depart ILIKE :term
                          OR lieu_arrivee ILIKE :term
                          ORDER BY date_depart
                          LIMIT 10");

        $this->db->bind(':term', "%$term%");
        return $this->db->resultSet();
    }
    public function register(CyclistController $cyclist){
        $stmt = $this->db->prepare("INSERT INTO cyclistes (nom,email,mot_de_passe,role,equipe_id) VALUES (:nom,:email,:mot_de_passe,:role,:equipe_id)");
        $stmt->bindValue(":nom",$cyclist->getNom());
        $stmt->bindValue(":email",$cyclist->getEmail());
        $stmt->bindValue(":mot_de_passe",$cyclist->getMotDePasse());
        $stmt->bindValue(":role",$cyclist->getRole());
        $stmt->bindValue(":equipe_id",$cyclist->getEquipeId());
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
    public function findUserByEmail($email)
    {
        $stmt = $this->db->prepare("SELECT * FROM utilisateurs WHERE email = :email");
        $stmt->bindValue(":email", $email);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
}
