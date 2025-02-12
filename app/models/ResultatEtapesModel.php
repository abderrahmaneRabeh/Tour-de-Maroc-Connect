<?php

namespace App\models;


use App\Lib\Database;
use App\Classes\ResultatEtapes;

class ResultatEtapesModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public static function getEtapPodium($id)
    {
        $db = Database::getConnection();
        $query = "SELECT *, c.nom as nom FROM resultats_etapes re
                    join cyclistes c on c.id = re.cycliste_id
                    join equipes e on e.id  = c.equipe_id 
                    WHERE re.etape_id = :id 
                    ORDER BY re.points ASC";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $etapes = $stmt->fetchAll();

        $objResultatEtapes = [];

        foreach ($etapes as $etape) {
            $resultatEtape = new ResultatEtapes(
                $etape['cycliste_id'],
                $etape['etape_id'],
                $etape['temps_total'],
                $etape['distance_km'],
                $etape['vitesse_moy'],
                $etape['points'],
                $etape['classement'],
                $etape['id']
            );
            $resultatEtape->nom = $etape['nom'];
            $resultatEtape->nationalite = $etape['nationalite'];
            $resultatEtape->equipe = $etape['pays'];

            $objResultatEtapes[] = $resultatEtape;
        }

        return $objResultatEtapes;

    }
}