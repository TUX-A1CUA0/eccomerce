<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../models/user.php';

session_start();

$database = new Database();
$db = $database->getConnection();
$user = new User($db);

$data = json_decode(file_get_contents("php://input"));

if(!empty($data->username) && !empty($data->password)) {
    $user->username = $data->username;
    $user->password = $data->password;
    
    $result = $user->login();
    if($result) {
        $_SESSION['user_id'] = $result['id'];
        $_SESSION['username'] = $result['username'];
        
        http_response_code(200);
        echo json_encode(array(
            "message" => "Login successful.",
            "user_id" => $result['id'],
            "username" => $result['username']
        ));
    } else {
        http_response_code(401);
        echo json_encode(array("message" => "Login failed."));
    }
} else {
    http_response_code(400);
    echo json_encode(array("message" => "Unable to login. Data is incomplete."));
}