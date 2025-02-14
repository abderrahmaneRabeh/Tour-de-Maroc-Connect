<?php

namespace App\models;


use App\Lib\Database;
use App\Classes\Comment;
class CommentModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public static function GetEtapComments($etap_id)
    {
        $db = Database::getConnection();
        $query = "SELECT *,c.id as id from commentaires c join fans f on c.fan_id = f.id WHERE etape_id = :etape_id ORDER BY c.date_creation DESC";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':etape_id', $etap_id);
        $stmt->execute();
        $comments = $stmt->fetchAll();

        $commentsObjects = [];
        foreach ($comments as $comment) {
            $commentObject = new Comment(
                $comment['id'],
                $comment['contenu'],
                $comment['fan_id'],
                $comment['etape_id'],
                $comment['date_creation'],
                $comment['is_valid']
            );
            $commentObject->nom = $comment['nom'];
            $commentsObjects[] = $commentObject;
        }
        return $commentsObjects;
    }

    public static function AjouterComment($fan_id, $etap_id, $content)
    {
        $db = Database::getConnection();
        $query = $db->prepare("INSERT INTO commentaires (fan_id ,etape_id, contenu) VALUES (:fan_id,:etap_id,:content)");
        $query->bindValue(':fan_id', $fan_id);
        $query->bindValue(':etap_id', $etap_id);
        $query->bindValue(':content', $content);
        $query->execute();
        return $query->rowCount();

    }

    public static function SupprimerComment($id)
    {
        $db = Database::getConnection();
        $query = $db->prepare("DELETE FROM commentaires WHERE id = :id");
        $query->bindValue(':id', $id);
        $query->execute();
        return $query->rowCount();
    }
}