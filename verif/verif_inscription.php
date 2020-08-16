<?php
require_once('../includes/connexiondb.php');

$bdd= connectionDB();

//verification de l'existance de l'etat civile dans le post
if(!isset($_POST['gender']) || empty($_POST['gender'])){
  echo "Veuillez choisir un état civile";
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

if(strlen($_POST['tel']) <10){
	echo "Votre numéro de téléphone est trop court";
	exit;
}

if($_POST['statut_check']==1){

  $q = "INSERT INTO client (civ,nom,prenom,email,mdp,postal,birth,tel,statut_pilote) VALUES (:civ,:nom,:prenom,:email,:mdp1,:postal,:birth,:tel,:statut_pilote)";

  $req = $bdd->prepare($q);

  $req->execute(array(
    'civ' => $_POST['gender'],
    'nom' => $_POST['nom'],
    'prenom' => $_POST['prenom'],
  	'email' => $_POST['email'],
  	'mdp1' => hash('sha256', $_POST['mdp1']),
  	'birth' => $_POST['birth'],
  	'postal' => $_POST['postal'],
    'tel' => $_POST['tel'],
    'statut_pilote' => 1
  	)
  );

  //verification de l'existance du nom de l'avion dans le post
  if(!isset($_POST['nom_avion']) || empty($_POST['nom_avion'])){
    echo "nom avion invalide" ;
  	exit;
  }

  //verification de l'existance de la marque de l'avion dans le post
  if(!isset($_POST['marque_avion']) || empty($_POST['marque_avion'])){
    echo "marque invalide" ;
  	exit;
  }

  //verification de l'existance du type de l'avion dans le post
  if(!isset($_POST['type_avion']) || empty($_POST['type_avion'])){
    echo "type invalide" ;
  	exit;
  }

  //verification de l'existance de la masse de l'avion dans le post
  if(!isset($_POST['masse']) || empty($_POST['masse'])){
    echo "masse invalide" ;
  	exit;
  }

  //verification de l'existance de la longueur de l'avion dans le post
  if(!isset($_POST['longueur']) || empty($_POST['longueur'])){
    echo "longueur invalide" ;
  	exit;
  }

  //verification de l'existance de l'envergure de l'avion dans le post
  if(!isset($_POST['envergure']) || empty($_POST['envergure'])){
    echo "envergure invalide" ;
  	exit;
  }

  //verification de l'existance du grp_acoustique de l'avion dans le post
  if(!isset($_POST['grp_acoustique']) || empty($_POST['grp_acoustique'])){
    echo "groupe acoustique invalide" ;
  	exit;
  }

  $surface = $_POST['longueur']*$_POST['envergure'];

  if($surface<60 && $_POST['masse']<500){
    $categorie=2;
  }
  if($surface>=60 && $surface<100 && $_POST['masse']<500){
    $categorie=2;
  }
  if($surface>=100 && $_POST['masse']<500){
    $categorie=3;
  }

  if($surface<60 && $_POST['masse']>=500 && $_POST['masse']<1000){
    $categorie=2;
  }
  if($surface>=60 && $surface<100 && $_POST['masse']>=500 && $_POST['masse']<1000){
    $categorie=3;
  }
  if($surface>=100 && $_POST['masse']>=500 && $_POST['masse']<1000){
    $categorie=3;
  }

  if($surface<60 && $_POST['masse']>=1000){
    $categorie=3;
  }
  if($surface>=60 && $surface<100 && $_POST['masse']>=1000){
    $categorie=3;
  }
  if($surface>=100 && $_POST['masse']>=1000){
    $categorie=1;
  }

  $q = "SELECT id FROM client WHERE email=:email";
  $req_id = $bdd->prepare($q);
  $req_id->execute(array(
    'email'=>$_POST['email'],
  ));
  $answers_id=$req_id->fetch();

  $q = "SELECT id FROM grp_acoustique WHERE grp_acoustique=:grp_acoustique";
  $req_grp = $bdd->prepare($q);
  $req_grp->execute(array(
    'grp_acoustique'=>$_POST['grp_acoustique'],
  ));
  $answers_grp=$req_grp->fetch();

  $q = "INSERT INTO avion (nom,marque,type,masse,grp_acoustique,categorie,id_client) VALUES (:nom,:marque,:type,:masse,:grp_acoustique,:categorie,:id_client)";
  $req_avion = $bdd->prepare($q);
  $req_avion->execute(array(
    'nom' => $_POST['nom_avion'],
    'marque' => $_POST['marque_avion'],
    'type' => $_POST['type_avion'],
  	'masse' => $_POST['masse'],
  	'grp_acoustique' => $answers_grp['id'],
  	'categorie' => 2,
  	'id_client' => $answers_id['id'],
  	)
  );

}

else{
  $q = "INSERT INTO client (civ,nom,prenom,email,mdp,postal,birth,tel) VALUES (:civ,:nom,:prenom,:email,:mdp1,:postal,:birth,:tel)";

  $req = $bdd->prepare($q);

  $req->execute(array(
    'civ' => $_POST['gender'],
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

}
?>
