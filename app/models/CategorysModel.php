<?php

namespace App\Models;

use App\Lib\Database;
use App\Classes\Categorys;

class CategorysModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function addCategory($nom_category): bool
    {
        

            $query = "INSERT INTO categories (nom) VALUES (:nom)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':nom', $nom_category, \PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->rowCount();
        

    }

    public function getAllCategories(): array
    {
        $query = "SELECT * FROM categories";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}