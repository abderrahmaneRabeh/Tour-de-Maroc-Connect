<?php

namespace App\Models;

use App\Lib\Database;
use Error;

class Equipe
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function getAllEquipes(){
        $stmt = $this->db->prepare("SELECT * FROM equipes");
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
}
