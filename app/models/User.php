<?php

namespace App\Models;
use App\Classes\User as UserController ;
use App\Lib\Database;
use Error;

class User
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }
    public function login($data)
    {
        $sql = "SELECT * FROM utilisateurs WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':email', $data["email"]);
        $stmt->execute();
        $result = $stmt->fetch();
        if ($result) {
            if (password_verify($data["password"], $result['mot_de_passe'])) {
                $this->setSession($result);
                return true;
            }
        }
        return false;
    }
    public function setSession($data)
    {
        $_SESSION["user"]["id"] = $data["id"];
        $_SESSION["user"]["nom"] = $data["nom"];
        $_SESSION["user"]["email"] = $data["email"];
        $_SESSION["user"]["role"] = $data["role"];
    }
}
