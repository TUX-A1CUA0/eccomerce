<?php
require_once __DIR__ . '/../Models/user.php';
require_once __DIR__ . '/../utils/response.php';

class AuthController {
    private $user;

    public function __construct($db) {
        $this->user = new User($db);
    }

    public function register() {
        $data = json_decode(file_get_contents("php://input"));

        if(!empty($data->username) && !empty($data->email) && !empty($data->password)) {
            $this->user->username = $data->username;
            $this->user->email = $data->email;
            $this->user->password = $data->password;

            if($this->user->create()) {
                Response::json(["message" => "User registered successfully"], 201);
                return;
            }
            Response::json(["message" => "Unable to register user"], 500);
            return;
        }
        Response::json(["message" => "Incomplete data"], 400);
    }

    public function login() {
        $data = json_decode(file_get_contents("php://input"));

        if(!empty($data->username) && !empty($data->password)) {
            $this->user->username = $data->username;
            $this->user->password = $data->password;

            $user = $this->user->login();
            if($user) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                Response::json([
                    "message" => "Login successful",
                    "user" => [
                        "id" => $user['id'],
                        "username" => $user['username']
                    ]
                ]);
                return;
            }
            Response::json(["message" => "Invalid credentials"], 401);
            return;
        }
        Response::json(["message" => "Incomplete data"], 400);
    }

    public function logout() {
        session_start();
        session_destroy();
        Response::json(["message" => "Logout successful"]);
    }

    public function checkAuth() {
        session_start();
        if(isset($_SESSION['user_id'])) {
            Response::json([
                "authenticated" => true,
                "user" => [
                    "id" => $_SESSION['user_id'],
                    "username" => $_SESSION['username']
                ]
            ]);
            return;
        }
        Response::json(["authenticated" => false], 401);
    }
}

?>