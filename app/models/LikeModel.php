<?php

namespace App\models;


use App\Lib\Database;
use App\Classes\Like;
class LikeModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public static function AjouterLike($fan_id, $etap_id)
    {
        $db = Database::getConnection();
        $query = $db->prepare("INSERT INTO likes (fan_id ,etape_id) VALUES (:fan_id,:etap_id)");
        $query->bindValue(':fan_id', $fan_id);
        $query->bindValue(':etap_id', $etap_id);
        $query->execute();
        return $query->rowCount();
    }

    public static function EtapUserLiked($fan_id, $etap_id)
    {
        $db = Database::getConnection();
        $query = $db->prepare("SELECT count(*) as nbr FROM likes where fan_id = :fan_id AND etape_id = :etape_id");
        $query->bindValue(':fan_id', $fan_id);
        $query->bindValue(':etape_id', $etap_id);
        $query->execute();
        return $query->fetch()['nbr'];
    }
}