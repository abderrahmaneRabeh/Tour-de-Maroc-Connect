<?php
use App\Lib\Controller;
use App\models\LikeModel;

class Like extends Controller
{
    public function add($fan_id, $etap_id)
    {
        $isAdded = LikeModel::AjouterLike($fan_id, $etap_id);

        if ($isAdded) {
            header("Location: " . URLROOT . "/Etapes/details/$etap_id");
        } else {
            echo "Failed to add a like.";
        }
    }

    public function remove($fan_id, $etap_id)
    {
        $isRemoved = LikeModel::SupprimerLike($fan_id, $etap_id);

        if ($isRemoved) {
            header("Location: " . URLROOT . "/Etapes/details/$etap_id");
        } else {
            echo "Failed to remove a like.";
        }
    }

}