<?php

namespace App\Models;
use App\Classes\Fan as FanController ;
use App\Lib\Database;
use Error;

class Fan
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function register(FanController $fan){
        $stmt = $this->db->prepare("INSERT INTO fans (nom,email,mot_de_passe,role) VALUES (:nom,:email,:mot_de_passe,:role)");
        $stmt->bindValue(":nom",$fan->getNom());
        $stmt->bindValue(":email",$fan->getEmail());
        $stmt->bindValue(":mot_de_passe",$fan->getMotDePasse());
        $stmt->bindValue(":role",$fan->getRole());
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
