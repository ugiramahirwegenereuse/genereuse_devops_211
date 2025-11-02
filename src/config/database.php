<?php
$host = 'group2_db';
$dbname = 'group2_shareride_db';
$username = 'root';
$password = 'rootpassword';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection<?php
// =================================================
// Database configuration for Group 1 Project
// =================================================

// Docker settings (if using Docker containers)
$host = 'group1_db';          // MySQL container name in docker-compose
$db   = 'group1_shareride_db';
$user = 'root';
$pass = 'rootpassword';

// XAMPP settings (if using local XAMPP MySQL)
// $host = 'localhost';
// $db   = 'group1_shareride_db';
// $user = 'root';
// $pass = '';  // your XAMPP MySQL password

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Optional: set character set
$conn->set_charset("utf8");

// Example success message (can remove later)
echo "Connected successfully to the database!";
?>
 failed: " . $e->getMessage();
}
?>