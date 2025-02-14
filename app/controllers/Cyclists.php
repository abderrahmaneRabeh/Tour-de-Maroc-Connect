<?php

use App\Lib\Controller;
use App\Helpers\FileUpload;
use App\Classes\Cyclist as CyclistClass ;
use App\Classes\historique;
class Cyclists extends Controller
{
    private $cyclistModel;
    private $historiqueModel;

    public function __construct()
    {
        $this->cyclistModel = $this->modal('Cyclist');
        $this->historiqueModel = $this->modal('Historique');
    }

    public function dashboard()
    {
        $this->view("cyclist/dashboard");
    }

    public function profiles()
    {
        $this->view("cyclist/profile");
    }

    public function stats()
    {
        $this->view("cyclist/stats");
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            header('Content-Type: application/json');
            // Get the JSON input
            $data = json_decode(file_get_contents('php://input'), true);

            $username = validateInput($data['username']) ?? '';
            $email =  validateInput($data['email']) ?? '';
            $password =  validateInput($data['password'])  ?? '';
            $role = validateInput($data['role'])  ?? '';
            $equipe_id = validateInput($data['country'])  ?? '';;
            
            if (empty($username) || empty($email) || empty($password) || empty($role) || empty($equipe_id)) {
                echo json_encode(['error' =>  'All fields are required.']);
                exit;
            }
            try {
                $user = $this->modal("Cyclist");
                if ($user->findUserByEmail($email)) {
                    echo json_encode(["error" => "Username or email already exist!"]);
                    exit();
                } else {
                    $hashedPass = password_hash($password,PASSWORD_DEFAULT);
                    $userClass = new CyclistClass(0,$username,$email,$hashedPass,$role,0,0,0,0,$equipe_id,0,0);
                    if ($user->register($userClass)) {
                        echo json_encode(["success" => "You are successfully registered"]);
                    }
                }
            } catch (\Throwable $th) {
                echo json_encode(["error" => $th->getMessage()]);
            }
        }
    }

    public function profile() {
        // Check if user is logged in and is a cyclist
        $this->valideRoleUser('cycliste');
        
        $cyclistId = $_SESSION['user']['id'];
        $cyclist = $this->cyclistModel->getCyclistById($cyclistId);
        $performances = $this->cyclistModel->getPerformances($cyclistId);
        $teams = $this->cyclistModel->getTeams();
        
        // Get historique for this specific cyclist
        $historiques = $this->historiqueModel->getHistoriqueByCyclisteId($cyclistId);
        
        $data = [
            'cyclist' => $cyclist,
            'performances' => $performances,
            'teams' => $teams,
            'historiques' => $historiques
        ];
        
        $this->view('cyclist/profile', $data);
    }
    
    public function updateProfile() {
        // Check if user is logged in and is a cyclist
        $this->valideRoleUser('cycliste');
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           
            
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            
            $data = [
                'id' => $_SESSION['user']['id'],
                'nom' => trim($_POST['nom']),
                'email' => trim($_POST['email']),
                'nationalite' => trim($_POST['nationalite']),
                'bio' => trim($_POST['bio']),
                'equipe_id' => !empty($_POST['equipe_id']) ? (int)$_POST['equipe_id'] : null
            ];
            
            // Validate email
            if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $_SESSION['error'] = "Email invalid";
                redirect('cyclists/profile');
                exit();
            }
            
            // Update profile information
            if ($this->cyclistModel->updatePersonalInfo($data)) {
                $_SESSION['success'] = "Profil mis à jour avec succès";
            } else {
                $_SESSION['error'] = "Erreur lors de la mise à jour du profil";
            }
            
            redirect('cyclists/profile');
        } else {
            redirect('cyclists/profile');
        }
    }
    public function updateProfileImage() {
        $this->valideRoleUser('cycliste');
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (empty($_FILES['profile_image']['name'])) {
                $_SESSION['error'] = "Aucun fichier n'a été sélectionné";
                redirect('cyclists/profile');
                return;
            }
            
            $fileUpload = new FileUpload();
            $uploadResult = $fileUpload->uploadImage($_FILES['profile_image'], 'profile_images');
            
            if ($uploadResult['success']) {
                $imgPath = $uploadResult['file_path'];
                
                if ($this->cyclistModel->updateProfileImage($_SESSION['user']['id'], $imgPath)) {
                    $_SESSION['success'] = "Photo de profil mise à jour avec succès";
                } else {
                    $_SESSION['error'] = "Erreur lors de la mise à jour de la photo de profil dans la base de données";
                }
            } else {
                $_SESSION['error'] = "Erreur lors de l'upload: " . $uploadResult['error'];
            }
            
            redirect('cyclists/profile');
        } else {
            redirect('cyclists/profile');
        }
    }
    public function performances() {
        // Check if user is logged in and is a cyclist
        $this->valideRoleUser('cycliste');
        
        $cyclistId = $_SESSION['user']['id'];
        $performances = $this->cyclistModel->getPerformances($cyclistId);
        
        $data = [
            'performances' => $performances
        ];
        
        $this->view('cyclist/performances', $data);
    }
}


