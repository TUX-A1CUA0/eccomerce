<?php
require_once __DIR__ . '/Config/Database.php';
require_once __DIR__ . '/controllers/AuthController.php';

// Enable CORS
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type');
    header('Access-Control-Allow-Credentials: true');
    exit(0);
}

// Database connection
$database = new Database();
$db = $database->getConnection();

// Initialize controller
$auth = new AuthController($db);

// Route handling
$request_method = $_SERVER['REQUEST_METHOD'];
$request_uri = $_SERVER['REQUEST_URI'];
$uri_parts = explode('/', trim($request_uri, '/'));
$endpoint = $uri_parts[count($uri_parts) - 1];

switch($request_method) {
    case 'POST':
        switch($endpoint) {
            case 'register':
                $auth->register();
                break;
            case 'login':
                $auth->login();
                break;
            case 'logout':
                $auth->logout();
                break;
            default:
                Response::json(["message" => "Not found"], 404);
        }
        break;
    case 'GET':
        if($endpoint === 'check-auth') {
            $auth->checkAuth();
        } else {
            Response::json(["message" => "Not found"], 404);
        }
        break;
    default:
        Response::json(["message" => "Method not allowed"], 405);
}
?>