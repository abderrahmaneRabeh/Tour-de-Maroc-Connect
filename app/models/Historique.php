<?php

namespace App\Models;
use App\Classes\historiques;
use App\Lib\Database;
use Error;

class Historique
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function getHistoriqueByCyclisteId($cycliste_id)
    {
        $db = Database::getConnection();
        $query = "SELECT * FROM historique WHERE cycliste_id = :cycliste_id ORDER BY dateEvenement DESC";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':cycliste_id', $cycliste_id);
        $stmt->execute();
        
        $historiques = [];
        while ($row = $stmt->fetch()) {
            $historiques[] = new historiques(
                $row['historique_id'],
                $row['evenement'],
                $row['description'],
                $row['dateevenement'],
                $row['cycliste_id'],
                $row['classement']
            );
        }
        
        return $historiques;
    }
}