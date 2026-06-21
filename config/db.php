<?php
// $host = 'localhost';
// $dbname = 'furniture_db';
// $username = 'root';
// $password = ''; 

$host = 'localhost';
$dbname = 'u798623491_furnishdb';
$username = 'u798623491_furnish';
$password = 'Furnishdb@2026$%'; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
