<?php

namespace App\Models;
use App\Lib\Database;
use App\Classes\Cyclist as CyclistController;
use Error;

class Cyclist
{
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function getProfile($id) {
        $stmt = $this->db->prepare("SELECT * FROM cyclistes WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function getPerformances($id) {
        $stmt = $this->db->prepare("SELECT * FROM resultats_etapes WHERE cycliste_id = ? ORDER BY date");
        $stmt->execute([$id]);
        return $stmt->fetchAll();
    }

    public function getPoints($id) {
        $stmt = $this->db->prepare("SELECT points FROM cyclistes WHERE id = ?");
        $stmt->execute([$id]);
        $result = $stmt->fetch();
        return $result ? $result['points'] : 0;
    }

    public function getAllCyclists() {
        $query = "SELECT c.id, c.nom as name, e.nom as team, c.nationalite as country, c.img as image 
                  FROM cyclistes c 
                  LEFT JOIN equipes e ON c.equipe_id = e.id
                  ORDER BY c.nom";
        
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function searchCyclists($searchTerm) {
        $query = "SELECT c.id, c.nom as name, e.nom as team, c.nationalite as country, c.img as image 
                  FROM cyclistes c 
                  LEFT JOIN equipes e ON c.equipe_id = e.id
                  WHERE c.nom LIKE :term 
                  OR e.nom LIKE :term 
                  OR c.nationalite LIKE :term
                  ORDER BY c.points DESC
                  LIMIT 10";
        
        $stmt = $this->db->prepare($query);
        $term = "%{$searchTerm}%";
        $stmt->bindParam(':term', $term, \PDO::PARAM_STR);
        $stmt->execute();
        
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function searchTeams($term) {
        $stmt = $this->db->prepare("SELECT id, nom, pays, date_creation
                                    FROM equipes
                                    WHERE nom ILIKE :term
                                    ORDER BY nom
                                    LIMIT 10");
        $stmt->bindValue(':term', "%{$term}%", \PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function searchStages($term) {
        $stmt = $this->db->prepare("SELECT id, nom, lieu_depart, lieu_arrivee, distance_km, 
                                           date_depart, difficulte
                                    FROM etapes
                                    WHERE nom ILIKE :term
                                    OR lieu_depart ILIKE :term
                                    OR lieu_arrivee ILIKE :term
                                    ORDER BY date_depart
                                    LIMIT 10");
        $stmt->bindValue(':term', "%{$term}%", \PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getTotalPoints($cycliste_id) {
        $stmt = $this->db->prepare("
            SELECT c.points + COALESCE(SUM(r.points), 0) AS total_points
            FROM cyclistes c
            LEFT JOIN resultats_etapes r ON c.id = r.cycliste_id
            WHERE c.id = ?
            GROUP BY c.points
        ");
        $stmt->execute([$cycliste_id]);
        $result = $stmt->fetch();
        return $result ? $result['total_points'] : 0;
    }

    public function register(CyclistController $cyclist) {
        $stmt = $this->db->prepare("INSERT INTO cyclistes (nom, email, mot_de_passe, role, equipe_id) 
                                    VALUES (:nom, :email, :mot_de_passe, :role, :equipe_id)");
        $stmt->bindValue(":nom", $cyclist->getNom());
        $stmt->bindValue(":email", $cyclist->getEmail());
        $stmt->bindValue(":mot_de_passe", $cyclist->getMotDePasse());
        $stmt->bindValue(":role", $cyclist->getRole());
        $stmt->bindValue(":equipe_id", $cyclist->getEquipeId());
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    public function findUserByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM utilisateurs WHERE email = :email");
        $stmt->bindValue(":email", $email);
        $stmt->execute();
        return $stmt->fetch();
    }
}
