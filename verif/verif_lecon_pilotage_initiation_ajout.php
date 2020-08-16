<?php
session_start();
require_once('../includes/connexiondb.php');

$bdd= connectionDB();

//verification de l'existance du nom dans le post
if(!isset($_POST['nom']) || empty($_POST['nom'])){
  echo "Veuillez choisir un nom";
	exit;
}

//verification de l'existance de la date dans le post
if(!isset($_POST['date']) || empty($_POST['date'])){
  echo "Veuillez choisir une date";
	exit;
}

//verification de l'existance de la date dans le post
if(!isset($_POST['creneau']) || empty($_POST['creneau'])){
  echo "Veuillez choisir un créneau";
  echo $_POST['creneau'];
	exit;
}


$aujourdhui = date('Y-m-d');

if($aujourdhui>$_POST['date'] || $aujourdhui==$_POST['date']){
  echo "Veuillez choisir une date au dela de celle d'aujourd'hui ";
  exit;
}


if($_POST['creneau']=="8-12"){
    $debut = "8:00:00";
    $fin = "12:00:00";
  }

if($_POST['creneau']=="14-18"){
    $debut = "14:00:00";
    $fin = "18:00:00";
  }



$q = "SELECT id FROM client WHERE email=:email";
$req_id = $bdd->prepare($q);
$req_id->execute(array(
  'email'=>$_SESSION['email'],
));
$answers=$req_id->fetch();

$date_debut = $_POST['date']." ".$debut;
$date_fin = $_POST['date']." ".$fin;

$q = "SELECT * FROM reservation WHERE id_client=:id_client AND debut BETWEEN '$debut' AND '$fin'";
$req_date = $bdd->prepare($q);
$req_date->execute(array(
  'id_client'=>$answers['id'],
));
$answers_date = [];
while($date = $req_date->fetch()){
	$answers_date[] = $date;
}
if(count($answers_date) != 0){ // le tableau n'est pas vide : l'email est déjà pris
	echo "déjà pris";
	exit;
}

$q = "SELECT * FROM reservation WHERE id_client=:id_client AND fin BETWEEN '$debut' AND '$fin'";
$req_date2 = $bdd->prepare($q);
$req_date2->execute(array(
  'id_client'=>$answers['id']
));
$answers_date2 = [];
while($date2 = $req_date2->fetch()){
	$answers_date2[] = $date2;
}
if(count($answers_date2) != 0){ // le tableau n'est pas vide : l'email est déjà pris
	echo "déjà pris";
	exit;
}

$q = "SELECT * FROM reservation WHERE id_client=:id_client AND debut<=:debut AND fin>=:debut";
$req_date3 = $bdd->prepare($q);
$req_date3->execute(array(
  'id_client'=>$answers['id'],
  'debut' =>$debut,
  'fin' =>$fin
));
$answers_date3 = [];
while($date3 = $req_date3->fetch()){
	$answers_date3[] = $date3;
}
if(count($answers_date3) != 0){ // le tableau n'est pas vide : l'email est déjà pris
	echo "déjà pris";
	exit;
}

$q = "INSERT INTO reservation (nom,description,debut,fin,id_client)  VALUES (:nom,:description,:debut,:fin,:id_client)";

$req = $bdd->prepare($q);

$req->execute(array(
  'nom' => $_POST['nom'],
  'description' => "Leçon de pilotage initiation",
  'debut' => $date_debut,
  'fin' => $date_fin,
  'id_client' => $answers['id'],
  )
);

echo "ok";
 ?>
