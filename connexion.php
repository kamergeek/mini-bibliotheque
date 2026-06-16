<?php

$host ="localhost";
$dbname="mini_bibliotheque";
$username ="root";
$password ="";





try {
	$pdo = new PDO(
	"mysql:host=$host;dbname=$dbname;charset=utf8",
		$username,
		$password,
		
	);
}catch(PDOException $e){
	die("Erreur de connexion:".$e->getMessage());
}








?>