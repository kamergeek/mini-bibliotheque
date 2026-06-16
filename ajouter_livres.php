<?php
    
session_start();
require 'navbar.php';
require 'connexion.php';

if (!isset($_SESSION['role'])) {
    die("Accès refusé.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = $_POST['titre'];
    $auteur = $_POST['auteur'];
    $genre = $_POST['genre'];
    $quantite = $_POST['quantite'];

    $stmt = $pdo->prepare("INSERT INTO livres (titre, auteur, genre, quantite) VALUES (?, ?, ?, ?)");
    $stmt->execute([$titre, $auteur, $genre, $quantite]);

    header("Location: livres.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Livres</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Ajouter livres</h1>

    <form method="POST">
    <input type="text" name="titre" placeholder="Titre" required><br>
    <input type="text" name="auteur" placeholder="Auteur"><br>
    <input type="text" name="genre" placeholder="Genre"><br>
    <input type="number" name="quantite" placeholder="Quantité" required><br>
    <button type="submit">Ajouter le livre</button>
</form>
</body>
</html>
