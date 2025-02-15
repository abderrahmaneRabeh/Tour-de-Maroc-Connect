<?php

namespace App\Models;
use App\Lib\Database;
use App\Classes\Cyclist as CyclistController;
use Error;
use LDAP\Result;
use PDO;
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

    public function getPoints($id) {
        $stmt = $this->db->prepare("SELECT points FROM cyclistes WHERE id = ?");
        $stmt->execute([$id]);
        $result = $stmt->fetch();
        return $result ? $result['points'] : 0;
    }

    public function getCurrentRanking($cyclisteId) {
        $query = "SELECT position 
            FROM (
                SELECT id, points, 
                       RANK() OVER (ORDER BY points DESC) as position 
                FROM cyclistes
            ) ranked 
            WHERE id = :id
        ";
    
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $cyclisteId, PDO::PARAM_INT);
        $stmt->execute(); 
    
        $result = $stmt->fetchObject(); 
    
        return $result ? $result->position : 0; 
    }
    

    public function getAverageSpeed($cyclisteId) {
        $query = "SELECT AVG(vitesse_moy) as avg_speed
            FROM resultats_etapes
            WHERE cycliste_id = :id
        ";
    
        $stmt = $this->db->prepare($query); 
        $stmt->bindParam(':id', $cyclisteId, PDO::PARAM_INT); 
        $stmt->execute(); 
    
        $result = $stmt->fetchObject(); 
    
        return $result && $result->avg_speed ? round($result->avg_speed, 1) : 0; 
    }
    
    
    public function getStats($cyclisteId) {
        return [
            'points' => $this->getTotalPoints($cyclisteId),
            'ranking' => $this->getCurrentRanking($cyclisteId),
            'averageSpeed' => $this->getAverageSpeed($cyclisteId)
        ];
    }

    public function getAllCyclists() {
        $query = "SELECT c.id, c.nom as name, e.nom as team, c.nationalite as country, c.img as image 
                  FROM cyclistes c 
                  LEFT JOIN equipes e ON c.equipe_id = e.id
                  ORDER BY c.nom";
        
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
        $stmt->bindParam(':term', $term, PDO::PARAM_STR);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchTeams($term) {
        $stmt = $this->db->prepare("SELECT id, nom, pays, date_creation
                                    FROM equipes
                                    WHERE nom ILIKE :term
                                    ORDER BY nom
                                    LIMIT 10");
        $stmt->bindValue(':term', "%{$term}%", PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
        $stmt->bindValue(':term', "%{$term}%", PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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

    
    public function getCyclistById($id) {
        $stmt = $this->db->prepare('SELECT * FROM cyclistes WHERE id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $cyclist = $stmt->fetch(PDO::FETCH_OBJ);
        return $cyclist;
    }
    
        public function updatePersonalInfo($data) {
            $stmt = $this->db->prepare('UPDATE cyclistes SET 
                            nom = :nom, 
                            email = :email,
                            nationalite = :nationalite,
                            bio = :bio,
                            equipe_id = :equipe_id 
                            WHERE id = :id');
            
            $stmt->bindParam(':nom', $data['nom'], PDO::PARAM_STR);
            $stmt->bindParam(':email', $data['email'], PDO::PARAM_STR);
            $stmt->bindParam(':nationalite', $data['nationalite'], PDO::PARAM_STR);
            $stmt->bindParam(':bio', $data['bio'], PDO::PARAM_STR);
            $stmt->bindParam(':equipe_id', $data['equipe_id'], PDO::PARAM_INT);
            $stmt->bindParam(':id', $data['id'], PDO::PARAM_INT);
            if (!$stmt) {
                error_log("Erreur SQL: " . $this->db->error());
            }
            return $stmt->execute();
        }
    
        public function updateProfileImage($id, $imgPath) {
            $stmt = $this->db->prepare('UPDATE cyclistes SET img = :img WHERE id = :id');
            $stmt->bindParam(':img', $imgPath, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $result = $stmt->execute();
            return $result;
        }
        public function getPerformances($cyclisteId) {
            $stmt = $this->db->prepare('SELECT re.*, e.nom AS etape_nom, e.date_depart 
                             FROM resultats_etapes re 
                             JOIN etapes e ON re.etape_id = e.id 
                             WHERE re.cycliste_id = :cycliste_id 
                             ORDER BY e.date_depart DESC');
            $stmt->bindParam(':cycliste_id', $cyclisteId, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_OBJ); 
        }
    
        public function getTeams() {
            $stmt = $this->db->prepare('SELECT id, nom FROM equipes ORDER BY nom');
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_OBJ); 
        }

        public function getTeamById($id) {
            $stmt = $this->db->prepare('SELECT * FROM equipes WHERE id = :id');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }
        


        public function getUserRole($userId)
{
    $sql = "SELECT role FROM utilisateurs WHERE id = :id"; 
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchColumn(); // Return only the role
}

public function getCyclistComparison($cyclistId) {
    $query = "SELECT c.id, c.nom, e.nom as equipe,
            AVG(r.vitesse_moy) as vitesse_moy,c.points,
            RANK() OVER (ORDER BY c.points DESC) as position
        FROM 
            cyclistes c
        LEFT JOIN 
            equipes e ON c.equipe_id = e.id
        LEFT JOIN 
            resultats_etapes r ON c.id = r.cycliste_id
        GROUP BY 
            c.id, c.nom, e.nom, c.points
        ORDER BY 
            position ASC
        LIMIT 10"; 
    
    $stmt = $this->db->prepare($query);
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}




public function getStageResults($cyclistId) {
    $query = "SELECT e.nom AS nom, 
               e.date_depart AS date_depart, 
               r.distance_km, 
               r.vitesse_moy, 
               r.classement , 
               r.points
        FROM resultats_etapes r
        JOIN etapes e ON r.etape_id = e.id
        WHERE r.cycliste_id = :cyclistId  
        ORDER BY e.date_depart ASC
    ";

    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':cyclistId', $cyclistId, PDO::PARAM_INT);
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

public function getCyclistOverview($cyclistId) {
    $query = "SELECT 
                AVG(r.vitesse_moy) as vitesse_moy,
                SUM(r.points) as points_total,
                (SELECT COUNT(*) + 1 FROM 
                    (SELECT SUM(points) as total_points 
                     FROM resultats_etapes 
                     GROUP BY cycliste_id 
                     HAVING SUM(points) > 
                        (SELECT SUM(points) 
                         FROM resultats_etapes 
                         WHERE cycliste_id = :cyclistId)
                    ) as better_cyclists
                ) as position_generale,
                SUM(r.distance_km) as distance_totale,
                (SELECT SUM(distance_km) FROM etapes) as distance_totale_course
            FROM resultats_etapes r
            WHERE r.cycliste_id = :cyclistId";
    
    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':cyclistId', $cyclistId, PDO::PARAM_INT);
    $stmt->execute();
    
    return $stmt->fetch(PDO::FETCH_OBJ);
}

public function getCyclistSpeed($cyclistId) {
    $query = "
        SELECT AVG(vitesse_moy) as avg_speed
        FROM resultats_etapes
        WHERE cycliste_id = :cyclistId
    ";
    
    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':cyclistId', $cyclistId, PDO::PARAM_INT);
    $stmt->execute();
    
    $result = $stmt->fetch(PDO::FETCH_OBJ);
    return $result ? $result->avg_speed : 0;
}

    }
    

