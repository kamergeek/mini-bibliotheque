<?php

session_start();
require 'connexion.php';


if($_SERVER['REQUEST_METHOD']==='POST'){

	$login =$_POST['login'];
	$mdp =$_POST['mot_de_passe'];
	

$stmt =$pdo->prepare("SELECT * FROM users WHERE login=?");
$stmt->execute([$login]);
$user =$stmt->fetch();


	if($user && password_verify($mdp, $user['mot_de_passe'])){
		$_SESSION['user_id']=$user['id'];
		$_SESSION['login']=$user['login'];
		$_SESSION['role']=$user['role'];

		echo "connexion réussi !bienvenue ".$user['login']."(".$user['role'].")";
	}else{
		echo "login ou mot de passe incorrect.";
	}


}



?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>LOGIN</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	
	<h1>LOGIN</h1>


	<form action="" method="POST">
		
		<input type="text" name="login" placeholder="Login" required><br>
		<input type="password" placeholder="mot de passe" name="mot_de_passe" required><br>
		<button type="submit">Se connecter</button>



	</form>
</body>
</html>