<?php

use App\Lib\Controller;

use App\Classes\Fan as FanClass;

class Fans extends Controller
{
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

            if (empty($username) || empty($email) || empty($password) || empty($role) ) {
                echo json_encode(['error' =>  'All fields are required.']);
                exit;
            }
            try {
                $user = $this->modal("Fan");
                if ($user->findUserByEmail($email)) {
                    echo json_encode(["error" => "Username or email already exist!"]);
                    exit();
                } else {
                    $hashedPass = password_hash($password,PASSWORD_DEFAULT);
                    $userClass = new FanClass(0,$username,$email,$hashedPass,$role,'','',0,0);
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
