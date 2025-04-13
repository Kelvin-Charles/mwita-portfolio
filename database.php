<?php
$host = 'sql204.byethost16.com';
$dbname = 'b16_38737854_mwita_website';
$username = 'b16_38737854';
$password = 'Mwita@97';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

?>