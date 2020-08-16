<?php
session_start();
require_once('../includes/connexiondb.php');

$bdd= connectionDB();

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

//verification de l'existance de l'etat civile dans le post
if(!isset($_POST['gender']) || empty($_POST['gender'])){
  echo "Veuillez choisir un état civile";
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

if(strlen($_POST['tel']) !=10){
	echo "Votre numéro de téléphone est trop court";
	exit;
}

//verification de l'existance de la date de naissance dans le post
if(!isset($_POST['birth']) || empty($_POST['birth'])){
  echo "date invalide" ;
	exit;
}

$q = "UPDATE client SET civ=:civ, nom=:nom, prenom=:prenom, email=:email, postal=:postal, tel=:tel, birth=:birth, statut_pilote=:statut_pilote WHERE id=:id";

$req = $bdd->prepare($q);

$req->execute(array(
  'civ' => $_POST['gender'],
  'nom' => $_POST['nom'],
  'prenom' => $_POST['prenom'],
	'email' => $_POST['email'],
	'postal' => $_POST['postal'],
  'tel' => $_POST['tel'],
  'birth' => $_POST['birth'],
  'statut_pilote' => $_POST['statut_pilote'],
  'id' => $_POST['id'],
	)
);

echo "ok";

?>
