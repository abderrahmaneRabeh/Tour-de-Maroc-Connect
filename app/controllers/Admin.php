<?php
use App\Lib\Controller;
use App\Models\CommentModel;

class Admin extends Controller
{
    public function statistiques()
    {
        $this->view("admin/statistiques");
    }

    public function Commentaires()
    {
        $commentObj = CommentModel::getInvalidComments();
        $this->view("admin/Commentaire", $commentObj);
    }

    public function validerCommentaire($id)
    {
        CommentModel::validerCommentaire($id);
        header("Location: " . URLROOT . "/Admin/Commentaires");
    }
}