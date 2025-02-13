<?php

use App\Lib\Controller;

class Users extends Controller
{
    public function __construct() {}

    public function register(): void
    {
        // if (isset($_SESSION['user'])) {
        //     redirect("");
        //     exit();
        // }

            $this->view("/auth/signup");
    }
    public function login()
    {
        // if (isset($_SESSION['user'])) {
        //     redirect("");
        //     exit();
        // }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            header("Content-Type: application/json");

            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $data = json_decode(file_get_contents("php://input"), true);

                $email = validateInput($data['email'])  ?? '';
                $password =  validateInput($data['password']) ?? '';

                if (empty($email) || empty($password)) {
                    echo json_encode(['error' =>  'All fields are required.']);
                    exit;
                }
                try {
                    $data = [
                        "email" => $email,
                        "password" => $password,
                    ];
                    $user = $this->modal("User");
                    if ($user->login($data)) {
                        echo json_encode(['success' => 'Login successful.']);
                        exit();
                    } else {
                        echo json_encode(['error' => 'Invalid email or password.']);
                        exit();
                    }
                } catch (\Throwable $th) {
                    echo json_encode(["error" => $th->getMessage()]);
                }
            }
        } else {
            $this->view('/auth/login');
        }
    }
    public function signout()
    {
        session_destroy();
        redirect("");
    }
    public function forbidden(){
        $this->view("forbidden");
    }
}
