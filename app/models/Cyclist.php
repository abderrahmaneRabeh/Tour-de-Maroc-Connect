<?php
namespace App\Models;
use App\Lib\Database;

class Cyclist {
    private $db;
    
    public function __construct() {
        $this->db = Database::getConnection();    }
    
    public function getProfile($id) {
        return $this->db->query(
            "SELECT * FROM cyclistes WHERE id = ?",
            [$id]
        )->fetch();
    }
    
    public function getPerformances($id) {
        return $this->db->query(
            "SELECT * FROM resultats_etapes WHERE cycliste_id = ? ORDER BY date",
            [$id]
        )->fetchAll();
    }
    
    public function getPoints($id) {
        $result = $this->db->query(
            "SELECT points FROM cyclistes WHERE id = ?",
            [$id]
        )->fetch();
        return $result ? $result['points'] : 0;
    }
}