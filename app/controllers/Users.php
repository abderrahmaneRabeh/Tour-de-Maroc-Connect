<?php

use App\Lib\Controller;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

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
                    $result = $user->login($data);
                    if ($result["success"]) {
                        echo json_encode(["success" => "You are loged successfully", "redirectUrl" => $result['redirect']]);
                    } else {
                        echo json_encode(["error" => $result["error"]]);
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
    public function forbidden()
    {
        $this->view("forbidden");
    }

    public function sendVerificationToken()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents('php://input'), true);
            header('Content-Type: application/json');

            $email = validateInput($data['email']);

            if (empty($email)) {
                http_response_code(400);
                echo json_encode(['error' => 'Email is required']);
                exit();
            }

            $userModel = $this->modal('User');
            $emailExists = $userModel->findUserByEmail($email);

            if (!$emailExists) {
                http_response_code(404);
                echo json_encode(['error' => 'Email not found']);
                exit();
            }

            $mail = new PHPMailer(true);

            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'mlaikitaha29@gmail.com';
                $mail->Password = 'vlbe fudl fzgt cote';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port = 465;

                $newToken = bin2hex(random_bytes(32));

                $mail->setFrom('mlaikitaha29@gmail.com', 'Taha Mlaiki');
                $mail->addAddress($email);

                $mail->isHTML(true);
                $mail->Subject = 'Verification Token';
                $mail->Body = '<h1>Hello Dear!</h1><p>This is the token Copy it</p> <p>' . $newToken . '</p>';
                $mail->AltBody = 'Hello! This is a test email sent using PHPMailer From Taha.';

                if ($mail->send()) {
                    if ($userModel->createResetPass($newToken, $email)) {
                        $_SESSION['emailReset'] = $email;
                        echo json_encode(['redirect' => 'verifiyToken']);
                        exit();
                    } else {
                        http_response_code(500);
                        echo json_encode(['error' => 'Something went wrong creating the token']);
                        exit();
                    }
                }
            } catch (Exception $e) {
                echo json_encode(['error' => 'Email could not be sent', 'message' => $e->getMessage()]);
            }
        } else {
            $this->view('/auth/sendVerificationToken');
        }
    }

    public function verifiyToken()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            header("Content-Type: application/json");
            $data = json_decode(file_get_contents("php://input"), true);

            $token = validateInput($data['token'])  ?? '';
            if (!$token) {
                echo json_encode(['error' => 'Token is not valid']);
                exit();
            }

            $user = $this->modal("User");
            $result = $user->getToken($token);
            if (!$result) {
                echo json_encode(['error' => 'Token is not valid']);
                exit();
            }
            if (strtotime($result["date_expiration"]) < time()) {
                $_SESSION["resetPassword"] = false;
                echo json_encode(['error' => 'Token expired']);
                exit();
            } else {
                $_SESSION["resetPassword"] = true;
                echo json_encode(['redirect' => 'resetPassword']);
            }
        } else {
            $this->view("/auth/verifiyToken");
        }
    }
    public function resetPassword()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            header("Content-Type: application/json");
            $data = json_decode(file_get_contents("php://input"), true);
            $password =  validateInput($data['password']) ?? '';
            if (empty($password)) {
                echo json_encode(['error' =>  'All fields are required.']);
                exit;
            }
            if (!isset($_SESSION["resetPassword"]) || !$_SESSION["resetPassword"] || !isset($_SESSION["emailReset"])) {
                echo json_encode(['error' =>  'You are not allowed to change the password']);
                exit;
            } else {
                $user = $this->modal("User");
                if ($user->changesPassword($_SESSION["emailReset"], $password)) {
                    echo json_encode(['success' => "The password changed successfully"]);
                    exit;
                }
            }
        } else {
            $this->view("/auth/resetPassword");
        }
    }
}
