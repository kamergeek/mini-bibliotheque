<?php
date_default_timezone_set('Africa/Douala');
$host = "sql301.infinityfree.com";
$dbname = "if0_42199739_minibibliotheque";
$username = "if0_42199739";
$password = "12SOHJ1ZwT3Jho";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>