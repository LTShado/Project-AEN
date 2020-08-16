<?php
session_start();
require_once('../includes/connexiondb.php');

$bdd= connectionDB();

//verification de l'existance de l'horaires dans le post
if(!isset($_POST['horaires']) || empty($_POST['horaires'])){
  echo "horaires invalide" ;
	exit;
}

//verification de l'existance de l'HT dans le post
if(!isset($_POST['HT']) || empty($_POST['HT'])){
  echo "HT invalide" ;
	exit;
}

//verification de l'existance de la TVA dans le post
if(!isset($_POST['TVA']) || empty($_POST['TVA'])){
  echo "TVA invalide" ;
	exit;
}

//verification de l'existance de la TTC dans le post
if(!isset($_POST['TTC']) || empty($_POST['TTC'])){
  echo "TTC invalide" ;
	exit;
}

$q = "UPDATE redevance_atterissage SET horaires=:horaires, Hors_Taxes=:HT, TVA=:TVA, TTC=:TTC WHERE id=:id";

$req = $bdd->prepare($q);

$req->execute(array(
  'horaires' => $_POST['horaires'],
  'HT' => $_POST['HT'],
  'TVA' => $_POST['TVA'],
	'TTC' => $_POST['TTC'],
  'id' => $_POST['id'],
	)
);

echo "ok";

?>
