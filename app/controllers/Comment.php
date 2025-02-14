<?php
use App\Lib\Controller;
use App\Models\CommentModel;
class Comment extends Controller
{

    public function add()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $fan_id = $_SESSION['user']['id'];
            $etap_id = $_POST['etap_id'];
            $content = $_POST['content'];

            $isAdded = CommentModel::AjouterComment($fan_id, $etap_id, $content);

            if ($isAdded) {
                header("Location: " . URLROOT . "/Etapes/details/$etap_id");
            } else {
                echo "Failed to add a comment.";
            }
        } else {
            echo "Error : Invalid request method.";
        }
    }

    public function delete($id, $etap_id)
    {
        $isDeleted = CommentModel::SupprimerComment($id);
        if ($isDeleted) {
            header("Location: " . URLROOT . "/Etapes/details/$etap_id");
        } else {
            echo "Failed to delete a comment.";
        }
    }

}