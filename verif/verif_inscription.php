<?php
require_once('../includes/connexiondb.php');

$bdd= connectionDB();

//verification de l'existance du nom dans le post
if(!isset($_POST['nom']) || empty($_POST['nom'])){
  echo "nom invalide";
	exit;
}

//verification de l'existance du prenom dans le post
if(!isset($_POST['prenom']) || empty($_POST['prenom'])){
  echo "prenom invalide" ;
	exit;
}

//verification de l'existance de l'email dans le post
if(!isset($_POST['email']) || empty($_POST['email'])){
  echo "email invalide" ;
	exit;
}

//verification du format de l'email
if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
  echo "email pas du bon format" ;
	exit;
}

// Vérification que l'email n'est pas déjà utilisé
$req = $bdd->prepare('SELECT email FROM client WHERE email= ?');
$req->execute(array($_POST['email']));
// Parcourir la réponse de la bdd
$answers = [];
while($user = $req->fetch()){
	$answers[] = $user;
}
if(count($answers) != 0){ // le tableau n'est pas vide : l'email est déjà pris
	echo "ce mail est déjà pris";
	exit;
}

//verification de l'existance du mdp1 dans le post
if(!isset($_POST['mdp1']) || empty($_POST['mdp1'])){
  echo "mot de passe invalide" ;
	exit;
}

if(strlen($_POST['mdp1']) <8){
	echo "Votre mot de passe est trop court, veillez mettre plus de 8 caractère";
	exit;
}

//verification de l'existance du mdp2 dans le post
if(!isset($_POST['mdp2']) || empty($_POST['mdp2'])){
  echo "mot de passe invalide" ;
	exit;
}

if(strlen($_POST['mdp2']) <8){
	echo "Votre mot de passe est trop court, veillez mettre plus de 8 caractère";
	exit;
}

//Vérification de la confirmation du password
if($_POST['mdp1'] !== $_POST['mdp2']){
	echo "les mots de passe ne correspondent pas";
	exit;
}

// BIRTHDAY
if(!isset($_POST['birth']) || empty($_POST['birth'])){
	echo "Veillez entrer une date";
	exit;
}

//verification de l'existance du code postal dans le post
if(!isset($_POST['postal']) || empty($_POST['postal'])){
  echo "code postal invalide" ;
	exit;
}

//verification de l'existance du numéro de portable dans le post
if(!isset($_POST['tel']) || empty($_POST['tel'])){
  echo "téléphone invalide" ;
	exit;
}

if(strlen($_POST['tel']) <=10){
	echo "Votre numéro de téléphone est trop court";
	exit;
}

$q = "INSERT INTO client (nom,prenom,email,mdp,postal,birth,tel) VALUES (:nom,:prenom,:email,:mdp1,:postal,:birth,:tel)";

$req = $bdd->prepare($q);

$req->execute(array(
  'nom' => $_POST['nom'],
  'prenom' => $_POST['prenom'],
	'email' => $_POST['email'],
	'mdp1' => hash('sha256', $_POST['mdp1']),
	'birth' => $_POST['birth'],
	'postal' => $_POST['postal'],
  'tel' => $_POST['tel'],
	)
);

echo "ok";
?>
