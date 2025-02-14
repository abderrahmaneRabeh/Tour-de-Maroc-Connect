<?php

namespace App\models;


use App\Lib\Database;
use App\Classes\Signalement;
class SignalementModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public static function AjouterSignal($etape_id, $fan_id, $description)
    {
        $db = Database::getConnection();
        $query = $db->prepare("INSERT INTO signalements (fan_id,etape_id,description) VALUES (:fan_id,:etape_id,:description)");
        $query->bindValue(':description', $description);
        $query->bindValue(':etape_id', $etape_id);
        $query->bindValue(':fan_id', $fan_id);
        $query->execute();
        return $query->rowCount();
    }
}