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


if($_POST['creneau']=="8-10"){
    $debut = "8:00:00";
    $fin = "10:00:00";
  }

  if($_POST['creneau']=="10h30-12h30"){
      $debut = "10:30:00";
      $fin = "12:30:00";
    }

if($_POST['creneau']=="14-16"){
    $debut = "14:00:00";
    $fin = "16:00:00";
  }

  if($_POST['creneau']=="16h30-18h30"){
      $debut = "16:30:00";
      $fin = "18:30:00";
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
$q = "SELECT * FROM reservation WHERE debut BETWEEN '$debut' AND '$fin'";
$req_test = $bdd->prepare($q);
$req_test->execute(array());
$employe_pris="(";
while($answers_test=$req_test->fetch()) {
    $employe_pris=$employe_pris."'".$answers_test['id_employe']."',";
}
$q = "SELECT * FROM reservation WHERE fin BETWEEN '$debut' AND '$fin'";
$req_test2 = $bdd->prepare($q);
$req_test2->execute(array());
while($answers_test2=$req_test2->fetch()) {
    $employe_pris=$employe_pris."'".$answers_test2['id_employe']."',";
}
$q = "SELECT * FROM reservation WHERE debut<=:debut AND fin>=:debut";
$req_test3 = $bdd->prepare($q);
$req_test3->execute(array(
  'debut' =>$debut,
  'fin' =>$fin
));
while($answers_test3=$req_test3->fetch()) {
    $employe_pris=$employe_pris."'".$answers_test3['id_employe']."',";
}
$employe_pris=$employe_pris."'0')";

$q = "SELECT * FROM employe WHERE NOT id IN $employe_pris";
$req_employe = $bdd->prepare($q);
$req_employe->execute(array());
$answers_employe=$req_employe->fetch();

if($answers_employe['id']==NULL){
  echo "Personne de disponible, veuillez réessayer un autre jour.";
}

$q = "INSERT INTO reservation (nom,description,debut,fin,id_employe,id_client)  VALUES (:nom,:description,:debut,:fin,:id_employe,:id_client)";

$req = $bdd->prepare($q);

$req->execute(array(
  'nom' => $_POST['nom'],
  'description' => "Bapteme de l'air",
  'debut' => $date_debut,
  'fin' => $date_fin,
  'id_employe' => $answers_employe['id'],
  'id_client' => $answers['id'],
  )
);

echo "ok";
 ?>
