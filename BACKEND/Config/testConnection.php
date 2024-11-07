<?php
// Include the Database class
include 'Database.php'; // Ensure the path to Database.php is correct

// Create an instance of the Database class
$database = new Database();
$connection = $database->getConnection();

// Check if the connection was successful
if ($connection) {
    echo "Connection established and PDO instance created.";
} else {
    echo "Failed to connect to the database.";
}


?>