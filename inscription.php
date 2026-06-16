

<?php 

error_reporting(E_ALL);
ini_set('display_errors',1);

session_start();

require 'connexion.php';


if(!isset($_SESSION['role']) || $_SESSION['role']!=='administrateur'){
	die("acces refusé seul un administrateur peut cree des comptes");
}


if($_SERVER['REQUEST_METHOD']==='POST'){
	$login =$_POST['login'];
	$mdp = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);
	$role =$_POST['role'];

$stmt =$pdo->prepare("INSERT INTO users(login,mot_de_passe,role)VALUES (?,?,?)");
$stmt->execute([$login,$mdp,$role ]);

    echo "compte créé avec succes !";
}



?>


<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>INSCRIPTION</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	
	<h1>INCRIPTION</h1>


	<form action="" method="POST">
		<input type="text" name="login" placeholder="login" required> <br>
		<input type="password" name="mot_de_passe" placeholder="Mot de passe" required><br>

		<select name="role" id="">
			<option value="bibliotheque">Bibliothecaire</option>
			<option value="administrateur">Administrateur</option>

		</select> <br>

		<button type="submit">Crée le compte</button>



	</form>
</body>
</html>