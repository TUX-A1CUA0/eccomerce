<?php
class Response {
    public static function json($data, $status = 200) {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: http://localhost:4200');
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type');
        http_response_code($status);
        echo json_encode($data);
    }
}

?>