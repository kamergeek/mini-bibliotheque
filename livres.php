<?php
session_start();

require 'connexion.php';


if (!isset($_SESSION['role'])) {
    die("acces refuse !veuillez vous connecter.");
}

if (isset($_GET['genre']) && $_GET['genre'] !== '') {
    $genre = $_GET['genre'];
    $stmt = $pdo->prepare("SELECT * FROM livres WHERE genre = ?");
    $stmt->execute([$genre]);
} else {
    $stmt = $pdo->query("SELECT * FROM livres");
}

$livres = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livres</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>LISTE DES LIVRES</h1>

    <a href="ajouter_livres.php"><button>+ Ajouter un livre</button></a> <br> <br>


<form method="GET">
    <input type="text" name="genre" placeholder="Filtrer par genre">
    <button type="submit">Filtrer</button>
</form> <br> <br>
    


    <table border="1">

        <tr>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Genre</th>
            <th>Quantite</th>
            <th>Actions</th>
            <th>Ajouter le</th>
            <th>Modifier le</th>
        </tr>

        <?php foreach ($livres as $livre) { ?>
            <tr>
                <td><?= $livre['titre'] ?></td>
                <td><?= $livre['auteur'] ?></td>
                <td><?= $livre['genre'] ?></td>
                <td>
                    <?php if ($livre['quantite'] <= 2) { ?>
                        <span style="color: red; font-weight: bold;">
                            ⚠️ <?php echo $livre['quantite']; ?>
                        </span>
                    <?php } else { ?>
                        <?php echo $livre['quantite']; ?>
                    <?php } ?>
                </td>
                <td>
                    <a href="modifier_livres.php?id=<?php echo $livre['id']; ?>">Modifier</a>
                    <a href="supprimer_livres.php?id=<?php echo $livre['id']; ?>">Supprimer</a>
                </td>

                <td><?php echo $livre['created_at']; ?></td>
                <td><?php echo $livre['updated_at']; ?></td>
            </tr>
        <?php } ?>

    </table>








</body>

</html>