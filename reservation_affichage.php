<?php session_start(); ?>
<!Doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title> Leçon pilotage reservation </title>
    <link rel="stylesheet" href="CSS/CSS.css">
    <link rel="stylesheet" href="CSS/bootstrap.css">
</head>

<body>
  <?php
      include("header.php");
  ?>
  <script src="AJAX/supp.js"></script>
  <main>
    <div>
      <?php
      ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      error_reporting(E_ALL);

        require 'calendar/reservation_calendrier.php';
        $reservs = new Calendar\Reservation_calendrier();
        if(!isset($_GET['id'])){
          echo "fail";
        }
        try {
          $reserv = $reservs->chercher($_GET['id']);
        } catch (\Exception $e) {
          echo "$e";
        }

        ?>

        <h1><?= $reserv['nom']; ?></h1>
        <input type="text" class="hide" value="<?=$reserv['id']?>" id="id">
        <ul>
          <li>Date: <?= (new DateTime($reserv['debut']))->format('d/m/Y'); ?></li>
          <li>Heure de début: <?= (new DateTime($reserv['debut']))->format('H:i'); ?></li>
          <li>Heure de fin: <?= (new DateTime($reserv['fin']))->format('H:i'); ?></li>
          <li>Description: <?= $reserv['description']; ?></li>
          <?php
          require_once('includes/connexiondb.php');
          $bdd= connectionDB();
          $q = "SELECT nom,prenom FROM employe WHERE id=:id";
          $req = $bdd->prepare($q);
          $req->execute(array(
            'id'=>$reserv['id_employe'],
          ));
          $answers = $req->fetch();
          ?>
          <li>Instructeur: <?= $answers['prenom']." ".$answers['nom']?></li>
        </ul>

        <button type="button" onclick="supprimer()" name="supprimer" id="btn_supp">Annulé</button>
      </div>
  </main>
<?php
    include("footer.php");
?>
</body>
