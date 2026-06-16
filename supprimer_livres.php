<?php
session_start();
require 'connexion.php';

if (!isset($_SESSION['role'])) {
    die("Accès refusé.");
}

$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM livres WHERE id=?");
$stmt->execute([$id]);

header("Location: livres.php");
exit;