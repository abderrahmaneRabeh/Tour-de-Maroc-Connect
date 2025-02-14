<?php

namespace App\Models;

use App\Classes\User as UserController;
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
        $stmt = $this->db->prepare('SELECT * FROM utilisateurs WHERE email = :email');
        $stmt->execute(['email' => $data['email']]);
        $user = $stmt->fetch();

        if ($user && password_verify($data['password'], $user['mot_de_passe'])) {
            $this->setSession([
                'id' => $user['id'],
                'nom' => $user['nom'],
                'email' => $user['email'],
                'role' => $user['role'],
            ]);

            $redirectUrl = ($user['role'] === 'cycliste') ? 'cyclists/dashboard' : (($user['role'] === 'admin') ? 'admin/statistiques' : '');

            return ["success" => true, "redirect" => $redirectUrl];
        } else {
            return ["error" => "Email or password is invalid."];
        }
    }

    public function setSession($data)
    {
        $_SESSION["user"]["id"] = $data["id"];
        $_SESSION["user"]["nom"] = $data["nom"];
        $_SESSION["user"]["email"] = $data["email"];
        $_SESSION["user"]["role"] = $data["role"];
    }

    public function getToken($token){
        $stmt = $this->db->prepare("SELECT * FROM reset_password WHERE token = :token ");
        $stmt->bindValue(":token",$token);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result ;
    }

    public function createResetPass($token,$email){
        $stmt = $this->db->prepare("INSERT INTO reset_password (email,token,date_expiration) VALUES (:email,:token, NOW() + INTERVAL '2 minutes')");
        $stmt->bindValue(":email",$email);
        $stmt->bindValue(":token",$token);
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
    public function changesPassword($email,$password)
    {
        $newPass = password_hash($password,PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("UPDATE utilisateurs SET mot_de_passe = :password WHERE email = :email");
        $stmt->bindValue(":email", $email);
        $stmt->bindValue(":password", $newPass);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }


    public function getUserRole($userId)
{
    $sql = "
        SELECT id, role as role_name, 1 as isactive 
        FROM (
            SELECT id, role FROM utilisateurs 
            WHERE id = :id
            UNION ALL
            SELECT id, role FROM cyclistes 
            WHERE id = :id
        ) as combined_users
        LIMIT 1
    "; 
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':id', $userId, \PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(\PDO::FETCH_ASSOC);
}

}
