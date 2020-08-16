<?php
session_start();
require_once('../includes/connexiondb.php');

$bdd= connectionDB();

//verification de l'existance du produit dans le post
if(!isset($_POST['produit']) || empty($_POST['produit'])){
  echo "produit invalide" ;
	exit;
}


//verification de l'existance du HT dans le post
if(!isset($_POST['HT']) || empty($_POST['HT'])){
  echo "HT invalide" ;
	exit;
}

//verification de l'existance du TVA dans le post
if(!isset($_POST['TVA']) || empty($_POST['TVA'])){
  echo "TVA invalide" ;
	exit;
}

//verification de l'existance du TTC dans le post
if(!isset($_POST['TTC']) || empty($_POST['TTC'])){
  echo "TTC invalide" ;
	exit;
}

$q = "UPDATE petrole SET produit=:produit, HT=:HT, TVA_20p=:TVA, TTC=:TTC WHERE id=:id";

$req = $bdd->prepare($q);

$req->execute(array(
  'produit' => $_POST['produit'],
  'HT' => $_POST['HT'],
  'TVA' => $_POST['TVA'],
  'TTC' => $_POST['TTC'],
  'id' => $_POST['id'],
	)
);

echo "ok";

?>
