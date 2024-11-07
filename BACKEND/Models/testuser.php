<?php

require 'BACKEND/Models/user.php'; // Adjust the path if necessary

// Mock database connection (replace with actual PDO connection)
$dsn = 'mysql:host=localhost;dbname=testdb'; // Replace with your database details
$username = 'root'; // Replace with your database username
$password = ''; // Replace with your database password

try {
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create a new User instance
    $user = new User($db);

    // Test creating a new user
    $user->username = 'testuser';
    $user->email = 'testuser@example.com';
    $user->password = 'password123';

    if ($user->create()) {
        echo "User created successfully.\n";
    } else {
        echo "Failed to create user.\n";
    }

    // Test finding a user by username
    $foundUser = $user->findByUsername('testuser');
    if ($foundUser) {
        echo "User found: " . print_r($foundUser, true) . "\n";
    } else {
        echo "User not found.\n";
    }

} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage() . "\n";
}

?>