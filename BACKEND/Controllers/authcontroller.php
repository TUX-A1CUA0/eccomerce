<?php

// controllers/AuthController.php
class AuthController {
    private $db;
    private $user;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
        $this->user = new User($this->db);
    }

    public function register($data) {
        $this->user->username = $data['username'];
        $this->user->email = $data['email'];
        $this->user->password = $data['password'];

        if($this->user->create()) {
            return ["success" => true, "message" => "User registered successfully"];
        }
        return ["success" => false, "message" => "Registration failed"];
    }

    public function login($username, $password) {
        $user = $this->user->findByUsername($username);
        
        if($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            
            return [
                "success" => true,
                "user" => [
                    "id" => $user['id'],
                    "username" => $user['username'],
                    "email" => $user['email']
                ]
            ];
        }
        return ["success" => false, "message" => "Invalid credentials"];
    }

    public function logout() {
        session_start();
        session_destroy();
        return ["success" => true, "message" => "Logged out successfully"];
    }
}









?>