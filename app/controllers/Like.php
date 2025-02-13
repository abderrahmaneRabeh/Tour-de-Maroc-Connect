<?php
use App\Lib\Controller;
use App\models\LikeModel;

class Like extends Controller
{
    public function add($fan_id, $etap_id)
    {
        // echo $etap_id . "  " . $fan_id;

        $isAdded = LikeModel::EtapUserLiked($fan_id, $etap_id);

        if ($isAdded) {

        }
    }

}