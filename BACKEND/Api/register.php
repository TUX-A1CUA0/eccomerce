<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once '../config/Database.php';
require_once '../models/User.php';
require_once '../controllers/AuthController.php';

$data = json_decode(file_get_contents("php://input"), true);

$auth = new AuthController();
echo json_encode($auth->register($data));

?>