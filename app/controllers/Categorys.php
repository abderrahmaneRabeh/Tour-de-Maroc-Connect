<?php

require_once '../app/config/config.php';
use App\Lib\Controller;
use App\Models\CategorysModel;

class Categorys extends Controller
{
    public function index()
    {
        $categoryModel = new CategorysModel();
        $categories = $categoryModel->getAllCategories();

        $this->view("admin/categorys", $categories);
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $categoryModel = new CategorysModel();
            $nom = $_POST['nom'];

            $isAdded = $categoryModel->addCategory($nom);
            if ($isAdded) {

                header("Location: " . URLROOT . "/Categorys/index");
            } else {
                echo "Failed to add a category.";
            }
        }
    }

    public function updateCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $categoryId = $_POST['id_category'];
            $newCategoryName = $_POST['nom_category'];

            $categoryModel = new CategorysModel();
            $updateSuccessful = $categoryModel->updateCategory($categoryId, $newCategoryName);

            if ($updateSuccessful) {
                header("Location: " . URLROOT . "/Categorys/index");
            } else {
                echo "No changes made, or the category wasn't found.";
            }
        }
    }
}