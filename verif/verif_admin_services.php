<?php
session_start();
require_once('../includes/connexiondb.php');

$bdd= connectionDB();

//verification de l'existance du nom du service dans le post
if(!isset($_POST['nom']) || empty($_POST['nom'])){
  echo "nom invalide" ;
	exit;
}

//verification de l'existance du prix dans le post
if(!isset($_POST['prix']) || empty($_POST['prix'])){
  echo "prix invalide";
	exit;
}

//verification de l'existance de la courte description dans le post
if(!isset($_POST['c_description']) || empty($_POST['c_description'])){
  echo "c_description invalide" ;
	exit;
}

//verification de l'existance de la longue description dans le post
if(!isset($_POST['l_description']) || empty($_POST['l_description'])){
  echo "l_description invalide";
	exit;
}

//verification de l'existance de img_emplacement dans le post
if(!isset($_POST['img_emplacement']) || empty($_POST['img_emplacement'])){
  echo "img_emplacement invalide" ;
	exit;
}

//verification de l'existance du statut_loisir dans le post
if(!isset($_POST['statut_loisir']) || empty($_POST['statut_loisir'])){
  echo "statut_loisir invalide" ;
	exit;
}

$q = "UPDATE services SET nom=:nom, prix=:prix, c_description=:c_description, l_description=:l_description, img_emplacement=:img_emplacement, durée=:duree, loisir=:statut_loisir WHERE id=:id";

$req = $bdd->prepare($q);

$req->execute(array(
  'nom' => $_POST['nom'],
  'prix' => $_POST['prix'],
  'c_description' => $_POST['c_description'],
	'l_description' => $_POST['l_description'],
  'img_emplacement' => $_POST['img_emplacement'],
  'duree' => $_POST['duree'],
  'statut_loisir' => $_POST['statut_loisir'],
  'id' => $_POST['id'],
	)
);
echo "ok";

?>
