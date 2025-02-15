<?php

use App\Lib\Controller;
use App\Classes\Cyclist as CyclistClass ;
class Cyclists extends Controller
{
    private $cyclistModel;

    public function __construct()
    {
        $this->cyclistModel = $this->modal('Cyclist');
    }

    public function dashboard()
    {
        $this->view("cyclist/dashboard");
    }

    public function profile()
    {
        $this->view("cyclist/profile");
    }

    public function stats()
    {
        $this->view("cyclist/stats");
    }

    public function ajaxSearch()
    {
        header('Content-Type: application/json');

        $searchTerm = isset($_GET['term']) ? trim($_GET['term']) : '';

        if (!empty($searchTerm)) {
            $cyclists = $this->cyclistModel->searchCyclists($searchTerm);
        } else {
            $cyclists = [];
        }

        echo json_encode([
            'success' => true,
            'searchTerm' => $searchTerm,
            'cyclists' => $cyclists
        ]);
        exit;
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
}

