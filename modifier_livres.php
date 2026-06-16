<?php
session_start();
require 'connexion.php';

if (!isset($_SESSION['role'])) {
    die("Accès refusé.");
}

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = $_POST['titre'];
    $auteur = $_POST['auteur'];
    $genre = $_POST['genre'];
    $quantite = $_POST['quantite'];

    $stmt = $pdo->prepare("UPDATE livres SET titre=?, auteur=?, genre=?, quantite=? WHERE id=?");
    $stmt->execute([$titre, $auteur, $genre, $quantite, $id]);

    header("Location: livres.php");
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM livres WHERE id=?");
$stmt->execute([$id]);
$livre = $stmt->fetch();
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
	 <h1>Modifier livres</h1>
<form method="POST">
    <input type="text" name="titre" value="<?php echo $livre['titre']; ?>" required><br>
    <input type="text" name="auteur" value="<?php echo $livre['auteur']; ?>"><br>
    <input type="text" name="genre" value="<?php echo $livre['genre']; ?>"><br>
    <input type="number" name="quantite" value="<?php echo $livre['quantite']; ?>" required><br>
    <button type="submit">Modifier</button>
</form>
</body>
</html>
