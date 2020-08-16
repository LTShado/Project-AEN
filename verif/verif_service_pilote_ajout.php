<?php
session_start();
require_once('../includes/connexiondb.php');

$bdd= connectionDB();

//verification de l'existance du service dans le post
if(!isset($_POST['service']) || empty($_POST['service'])){
  echo "Veuillez choisir un service";

	exit;
}
$q = "SELECT id FROM client WHERE email=?";
$req_id = $bdd->prepare($q);
$req_id->execute(array($_SESSION['email']));
$answers_id=$req_id->fetch();

$q = "SELECT * FROM avion where id_client = ?";

$req = $bdd -> prepare($q);
$req -> execute(array($answers_id['id']));
$answers=$req->fetch();

if($_POST['service']==1){

  //verification de l'existance de l'emplacement dans le post
  if(!isset($_POST['emplacement']) || empty($_POST['emplacement'])){
    echo "Veuillez choisir un emplacement ";
    echo $_POST['emplacement']."test";
    exit;
  }

  //verification de l'existance du nom dans le post
  if(!isset($_POST['nom_stationnement']) || empty($_POST['nom_stationnement'])){
    echo "Veuillez choisir un nom";

    exit;
  }

  if($answers['statut_site']==0){
    //verification de l'existance de la date dans le post
    if(!isset($_POST['date_stationnement']) || empty($_POST['date_stationnement'])){
      echo "Veuillez choisir une date";

    	exit;
    }
    $aujourdhui = date('Y-m-d');
    //verification que la demande ne soit pas la date d'aujourd'hui ou avant
    if($aujourdhui>$_POST['date_stationnement'] || $aujourdhui==$_POST['date_stationnement']){
      echo "Veuillez choisir une date au dela de celle d'aujourd'hui ";
      exit;
    }

    //verification de l'existance du début dans le post
    if(!isset($_POST['debut_stationnement']) || empty($_POST['debut_stationnement'])){
      echo "Veuillez choisir une heure minimale d'arrivé";

    	exit;
    }
    //verification de l'existance de la fin dans le post
    if(!isset($_POST['fin_stationnement']) || empty($_POST['fin_stationnement'])){
      echo "Veuillez choisir une heure maximale d'arrivé";

    	exit;
    }
    if($_POST['debut_stationnement']>$_POST['fin_stationnement']){
      echo "Veuillez modifier les heures pour que l'heure minimale ne soit pas superieur à celle maximale ";
    }

    $debut_stationnement_with_second = $_POST['debut_stationnement'].":00";
    $fin_stationnement_with_second = $_POST['fin_stationnement'].":00";

    $debut_stationnement = $_POST['date_stationnement']." ".$debut_stationnement_with_second;
    $fin_stationnement = $_POST['date_stationnement']." ".$fin_stationnement_with_second;

    $q = "SELECT * FROM reservation WHERE id_client=:id_client AND debut BETWEEN '$debut_stationnement' AND '$fin_stationnement'";
    $req_date = $bdd->prepare($q);
    $req_date->execute(array(
      'id_client'=>$answers_id['id'],
    ));
    $answers_date = [];
    while($date = $req_date->fetch()){
    	$answers_date[] = $date;
    }
    if(count($answers_date) != 0){ // le tableau n'est pas vide : le créneau  est déjà pris
    	echo "déjà pris";
    	exit;
    }

    $q = "SELECT * FROM reservation WHERE id_client=:id_client AND fin BETWEEN '$debut_stationnement' AND '$fin_stationnement'";
    $req_date2 = $bdd->prepare($q);
    $req_date2->execute(array(
      'id_client'=>$answers_id['id']
    ));
    $answers_date2 = [];
    while($date2 = $req_date2->fetch()){
    	$answers_date2[] = $date2;
    }
    if(count($answers_date2) != 0){ // le tableau n'est pas vide : le créneau est déjà pris
    	echo "déjà pris";
    	exit;
    }

    $q = "SELECT * FROM reservation WHERE id_client=:id_client AND debut<=:debut AND fin>=:debut";
    $req_date3 = $bdd->prepare($q);
    $req_date3->execute(array(
      'id_client'=>$answers_id['id'],
      'debut' =>$debut_stationnement,
      'fin' =>$fin_stationnement
    ));
    $answers_date3 = [];
    while($date3 = $req_date3->fetch()){
    	$answers_date3[] = $date3;
    }
    if(count($answers_date3) != 0){ // le tableau n'est pas vide : le créneau est déjà pris
    	echo "déjà pris";
    	exit;
    }

    $q = "INSERT INTO reservation (nom,description,debut,fin,id_client)  VALUES (:nom,:description,:debut,:fin,:id_client)";

    $req_bdd = $bdd->prepare($q);

    $req_bdd->execute(array(
      'nom' => $_POST['nom_stationnement'],
      'description' => "Stationnement",
      'debut' => $debut_stationnement,
      'fin' => $fin_stationnement,
      'id_client' => $answers_id['id'],
      )
    );

    //echo "ok";
  }
}


if($_POST['service']==2){

  //verification de l'existance du nom dans le post
  if(!isset($_POST['nom_avitaillement']) || empty($_POST['nom_avitaillement'])){
    echo "Veuillez choisir un nom";

    exit;
  }

  if($answers['statut_site']==0){
    //verification de l'existance de la date dans le post
    if(!isset($_POST['date_avitaillement']) || empty($_POST['date_avitaillement'])){
      echo "Veuillez choisir une date";

      exit;
    }
    $aujourdhui = date('Y-m-d');
    //verification que la demande ne soit pas la date d'aujourd'hui ou avant
    if($aujourdhui>$_POST['date_avitaillement'] || $aujourdhui==$_POST['date_avitaillement']){
      echo "Veuillez choisir une date au dela de celle d'aujourd'hui ";
      exit;
    }

    //verification de l'existance du début dans le post
    if(!isset($_POST['debut_avitaillement']) || empty($_POST['debut_avitaillement'])){
      echo "Veuillez choisir une heure minimale d'arrivé";

      exit;
    }
    //verification de l'existance de la fin dans le post
    if(!isset($_POST['fin_avitaillement']) || empty($_POST['fin_avitaillement'])){
      echo "Veuillez choisir une heure maximale d'arrivé";

      exit;
    }
    if($_POST['debut_avitaillement']>$_POST['fin_avitaillement']){
      echo "Veuillez modifier les heures pour que l'heure minimale ne soit pas superieur à celle maximale ";
    }

    $debut_avitaillement_with_second = $_POST['debut_avitaillement'].":00";
    $fin_avitaillement_with_second = $_POST['fin_avitaillement'].":00";

    $debut_avitaillement = $_POST['date_avitaillement']." ".$debut_avitaillement_with_second;
    $fin_avitaillement = $_POST['date_avitaillement']." ".$fin_avitaillement_with_second;

    $q = "SELECT * FROM reservation WHERE id_client=:id_client AND debut BETWEEN '$debut_avitaillement' AND '$fin_avitaillement'";
    $req_date = $bdd->prepare($q);
    $req_date->execute(array(
      'id_client'=>$answers_id['id'],
    ));
    $answers_date = [];
    while($date = $req_date->fetch()){
      $answers_date[] = $date;
    }
    if(count($answers_date) != 0){ // le tableau n'est pas vide : le créneau  est déjà pris
      echo "déjà pris";
      exit;
    }

    $q = "SELECT * FROM reservation WHERE id_client=:id_client AND fin BETWEEN '$debut_avitaillement' AND '$fin_avitaillement'";
    $req_date2 = $bdd->prepare($q);
    $req_date2->execute(array(
      'id_client'=>$answers_id['id']
    ));
    $answers_date2 = [];
    while($date2 = $req_date2->fetch()){
      $answers_date2[] = $date2;
    }
    if(count($answers_date2) != 0){ // le tableau n'est pas vide : le créneau est déjà pris
      echo "déjà pris";
      exit;
    }

    $q = "SELECT * FROM reservation WHERE id_client=:id_client AND debut<=:debut AND fin>=:debut";
    $req_date3 = $bdd->prepare($q);
    $req_date3->execute(array(
      'id_client'=>$answers_id['id'],
      'debut' =>$debut_avitaillement,
      'fin' =>$fin_avitaillement
    ));
    $answers_date3 = [];
    while($date3 = $req_date3->fetch()){
      $answers_date3[] = $date3;
    }
    if(count($answers_date3) != 0){ // le tableau n'est pas vide : le créneau est déjà pris
      echo "déjà pris";
      exit;
    }

    $q = "INSERT INTO reservation (nom,description,debut,fin,id_client)  VALUES (:nom,:description,:debut,:fin,:id_client)";

    $req_bdd = $bdd->prepare($q);

    $req_bdd->execute(array(
      'nom' => $_POST['nom_avitaillement'],
      'description' => "Avitaillement",
      'debut' => $debut_avitaillement,
      'fin' => $fin_avitaillement,
      'id_client' => $answers_id['id'],
      )
    );
}
}


if($_POST['service']==3){

  if($answers['statut_site']==1){

      //verification de l'existance du nom dans le post
      if(!isset($_POST['nom_nettoyage']) || empty($_POST['nom_nettoyage'])){
        echo "Veuillez choisir un nom";

        exit;
      }
    //verification de l'existance de la date dans le post
    if(!isset($_POST['date_nettoyage']) || empty($_POST['date_nettoyage'])){
      echo "Veuillez choisir une date";

      exit;
    }
    $aujourdhui = date('Y-m-d');
    //verification que la demande ne soit pas la date d'aujourd'hui ou avant
    if($aujourdhui>$_POST['date_nettoyage'] || $aujourdhui==$_POST['date_nettoyage']){
      echo "Veuillez choisir une date au dela de celle d'aujourd'hui ";
      exit;
    }

    //verification de l'existance du début dans le post
    if(!isset($_POST['debut_nettoyage']) || empty($_POST['debut_nettoyage'])){
      echo "Veuillez choisir une heure minimale d'arrivé";

      exit;
    }
    //verification de l'existance de la fin dans le post
    if(!isset($_POST['fin_nettoyage']) || empty($_POST['fin_nettoyage'])){
      echo "Veuillez choisir une heure maximale d'arrivé";

      exit;
    }
    if($_POST['debut_nettoyage']>$_POST['fin_nettoyage']){
      echo "Veuillez modifier les heures pour que l'heure minimale ne soit pas superieur à celle maximale ";
    }

    $debut_nettoyage_with_second = $_POST['debut_nettoyage'].":00";
    $fin_nettoyage_with_second = $_POST['fin_nettoyage'].":00";

    $debut_nettoyage = $_POST['date_nettoyage']." ".$debut_nettoyage_with_second;
    $fin_nettoyage = $_POST['date_nettoyage']." ".$fin_nettoyage_with_second;

    $q = "SELECT * FROM reservation WHERE id_client=:id_client AND debut BETWEEN '$debut_nettoyage' AND '$fin_nettoyage'";
    $req_date = $bdd->prepare($q);
    $req_date->execute(array(
      'id_client'=>$answers_id['id'],
    ));
    $answers_date = [];
    while($date = $req_date->fetch()){
      $answers_date[] = $date;
    }
    if(count($answers_date) != 0){ // le tableau n'est pas vide : le créneau  est déjà pris
      echo "déjà pris";
      exit;
    }

    $q = "SELECT * FROM reservation WHERE id_client=:id_client AND fin BETWEEN '$debut_nettoyage' AND '$fin_nettoyage'";
    $req_date2 = $bdd->prepare($q);
    $req_date2->execute(array(
      'id_client'=>$answers_id['id']
    ));
    $answers_date2 = [];
    while($date2 = $req_date2->fetch()){
      $answers_date2[] = $date2;
    }
    if(count($answers_date2) != 0){ // le tableau n'est pas vide : le créneau est déjà pris
      echo "déjà pris";
      exit;
    }

    $q = "SELECT * FROM reservation WHERE id_client=:id_client AND debut<=:debut AND fin>=:debut";
    $req_date3 = $bdd->prepare($q);
    $req_date3->execute(array(
      'id_client'=>$answers_id['id'],
      'debut' =>$debut_nettoyage,
      'fin' =>$fin_nettoyage
    ));
    $answers_date3 = [];
    while($date3 = $req_date3->fetch()){
      $answers_date3[] = $date3;
    }
    if(count($answers_date3) != 0){ // le tableau n'est pas vide : le créneau est déjà pris
      echo "déjà pris";
      exit;
    }

    $q = "INSERT INTO reservation (nom,description,debut,fin,id_client)  VALUES (:nom,:description,:debut,:fin,:id_client)";

    $req_bdd = $bdd->prepare($q);

    $req_bdd->execute(array(
      'nom' => $_POST['nom_nettoyage'],
      'description' => "Nettoyage",
      'debut' => $debut_nettoyage,
      'fin' => $fin_nettoyage,
      'id_client' => $answers_id['id'],
      )
    );
}
}

?>
