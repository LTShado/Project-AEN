<?php
session_start();
require_once('../includes/connexiondb.php');

$bdd= connectionDB();

//verification de l'existance du grp_acoustique dans le post
if(!isset($_POST['grp_acoustique']) || empty($_POST['grp_acoustique'])){
  echo "grp_acoustique invalide" ;
	exit;
}

//verification de l'existance du coeff_jour dans le post
if(!isset($_POST['coeff_jour']) || empty($_POST['coeff_jour'])){
  echo "coeff_jour invalide" ;
	exit;
}

//verification de l'existance du coeff_nuit dans le post
if(!isset($_POST['coeff_nuit']) || empty($_POST['coeff_nuit'])){
  echo "coeff_nuit invalide" ;
	exit;
}

$q = "UPDATE grp_acoustique SET grp_acoustique=:grp_acoustique, coeff_jour=:coeff_jour, coeff_nuit=:coeff_nuit WHERE id=:id";

$req = $bdd->prepare($q);

$req->execute(array(
  'grp_acoustique' => $_POST['grp_acoustique'],
  'coeff_jour' => $_POST['coeff_jour'],
  'coeff_nuit' => $_POST['coeff_nuit'],
  'id' => $_POST['id'],
	)
);

echo "ok";

?>
